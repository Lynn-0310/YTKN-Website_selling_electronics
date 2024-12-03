<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Products;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Order_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $products = Products::paginate(4);
        $articles = Articles::paginate(3);
        $role = optional(Auth::user())->role;
        
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if (!$cart) {
                $cart = Cart::create(['user_id' => Auth::id()]);
            }
            $cartItems = $cart->cartItems ?? collect(); 
            $totalAmount = $cartItems->sum(function ($cartItem) {
                return $cartItem->quantity * $cartItem->price;
            });
        
        } else {
            $cartItems = collect();  
            $totalAmount = 0;  
        }
        $totalQuantity = $cartItems->sum('quantity');

        return view('welcome', compact('products', 'articles', 'role','cartItems', 'totalAmount','totalQuantity'));
        
    }
    public function introduction()
    {
        $role = optional(Auth::user())->role;
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if (!$cart) {
                $cart = Cart::create(['user_id' => Auth::id()]);
            }
            $cartItems = $cart->cartItems ?? collect(); 
            $totalAmount = $cartItems->sum(function ($cartItem) {
                return $cartItem->quantity * $cartItem->price;
            });
        
        } else {
            $cartItems = collect();  
            $totalAmount = 0;  
        }
        $totalQuantity = $cartItems->sum('quantity');
        return view('introduction.introduction', compact('totalAmount','totalQuantity','role'));
    }
    public function products()
    {
        $role = optional(Auth::user())->role;
        $products = Products::paginate(9);
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if (!$cart) {
                $cart = Cart::create(['user_id' => Auth::id()]);
            }
            $cartItems = $cart->cartItems ?? collect(); 
            $totalAmount = $cartItems->sum(function ($cartItem) {
                return $cartItem->quantity * $cartItem->price;
            });
        
        } else {
            $cartItems = collect();  
            $totalAmount = 0;  
        }
        $totalQuantity = $cartItems->sum('quantity');
        return view('products.products', compact('role','products','cartItems', 'totalAmount','totalQuantity'));
        
    }

    public function add(Products $product)
    {
        if (Auth::check()) {
            $userId = Auth::id(); 
            $cart = Cart::firstOrCreate(['user_id' => $userId]);
            $cartItem = CartItem::where('cart_id', $cart->id)
                                ->where('product_id', $product->id)
                                ->first();
            if ($cartItem) {
                $cartItem->quantity += 1; 
                $cartItem->save();
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => 1, 
                    'price' => $product->sale_price, 
                ]);
            }
        } else {
            $cartItems = session('cart', []);
            $cartItems[] = [
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ];
            session(['cart' => $cartItems]);
        }
        return redirect()->back();
    }
    
    public function removeFromCart($id)
    {
    $cartItem = CartItem::find($id);
    if ($cartItem) {
        $cartItem->delete(); 
    }
    return redirect()->back();
    }


    public function productshow($id)
    {
        $products = Products::paginate(8);
        $product = Products::findOrFail($id);
        $role = optional(Auth::user())->role;
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if (!$cart) {
                $cart = Cart::create(['user_id' => Auth::id()]);
            }
            $cartItems = $cart->cartItems ?? collect(); 
            $totalAmount = $cartItems->sum(function ($cartItem) {
                return $cartItem->quantity * $cartItem->price;
            });
        
        } else {
            $cartItems = collect();  
            $totalAmount = 0;  
        }
        $totalQuantity = $cartItems->sum('quantity');
        return view('products.detailProducts', compact('role','products','product','cartItems', 'totalAmount','totalQuantity'));      
    }


    public function articles(){
        $role = optional(Auth::user())->role;
        $articles = Articles::paginate(4);
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if (!$cart) {
                $cart = Cart::create(['user_id' => Auth::id()]);
            }
            $cartItems = $cart->cartItems ?? collect(); 
            $totalAmount = $cartItems->sum(function ($cartItem) {
                return $cartItem->quantity * $cartItem->price;
            });
        
        } else {
            $cartItems = collect();  
            $totalAmount = 0;  
        }
        $totalQuantity = $cartItems->sum('quantity');
        return view('articles.articles', compact('role','articles','cartItems', 'totalAmount','totalQuantity'));
    }

    public function articleshow($id){
        $articles = Articles::paginate(4);
        $article = Articles::findOrFail($id);
        $role = optional(Auth::user())->role;
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if (!$cart) {
                $cart = Cart::create(['user_id' => Auth::id()]);
            }
            $cartItems = $cart->cartItems ?? collect(); 
            $totalAmount = $cartItems->sum(function ($cartItem) {
                return $cartItem->quantity * $cartItem->price;
            });
        
        } else {
            $cartItems = collect();  
            $totalAmount = 0;  
        }
        $totalQuantity = $cartItems->sum('quantity');
        return view('articles.detailArticles',compact('role','article','articles','cartItems', 'totalAmount','totalQuantity'));
    }

    public function shoppingCart()
    {
        $role = optional(Auth::user())->role;
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if (!$cart) {
                $cart = Cart::create(['user_id' => Auth::id()]);
            }
            $cartItems = $cart->cartItems ?? collect();
            $cartItems = $cartItems->map(function ($cartItem) {
                $cartItem->total_price = $cartItem->quantity * $cartItem->price; 
                return $cartItem;
            });

            $totalAmount = $cartItems->sum('total_price'); 
        } else {
            $cartItems = collect();
            $totalAmount = 0;
        }
        $totalQuantity = $cartItems->sum('quantity');

        return view('products.shoppingCart', compact('role','cartItems', 'totalAmount', 'totalQuantity'));
    }
    public function updateCart(Request $request)
    {
        $quantities = $request->input('quantities');
        foreach ($quantities as $cartItemId => $quantity) {
            $cartItem = CartItem::find($cartItemId);
            if ($cartItem && $quantity > 0) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
        }
    

        return redirect()->back();
    }
    public function viewCheckout(){
        $role = optional(Auth::user())->role;
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if (!$cart) {
                $cart = Cart::create(['user_id' => Auth::id()]);
            }
            $cartItems = $cart->cartItems ?? collect();
            $cartItems = $cartItems->map(function ($cartItem) {
                $cartItem->total_price = $cartItem->quantity * $cartItem->price; 
                return $cartItem;
            });

            $totalAmount = $cartItems->sum('total_price'); 
        } else {
            $cartItems = collect();
            $totalAmount = 0;
        }
        $totalQuantity = $cartItems->sum('quantity');

        return view('products.checkout', compact('role', 'cartItems', 'totalAmount', 'totalQuantity'));
    }


    public function checkoutStore(Request $request){
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'cart_items' => 'required|array',
            'totalAmount' =>'required',
        ]); 

        $order = Order::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'district' => $request->district,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'order_notes' => $request->order_notes,
            'total_amount' => $request->totalAmount, 
        ]);

        foreach ($request->cart_items as $item) {
            Order_items::create([
                'order_id' => $order->id,
                'product_name' => $item['product_name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total'=>$item['total'],
            ]);
        }
        $carts = Cart::where('user_id', Auth::id())->get();
        if ($carts->isNotEmpty()) {
            foreach ($carts as $cart) {
                CartItem::where('cart_id', $cart->id)->delete();
            }        
        }
        return redirect()->route('welcome')->with('success', 'Đặt hàng thành công');
    }
    
    public function loadDocuments()
    {
        $role = optional(Auth::user())->role;
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if (!$cart) {
                $cart = Cart::create(['user_id' => Auth::id()]);
            }
            $cartItems = $cart->cartItems ?? collect();
            $cartItems = $cartItems->map(function ($cartItem) {
                $cartItem->total_price = $cartItem->quantity * $cartItem->price; 
                return $cartItem;
            });

            $totalAmount = $cartItems->sum('total_price'); 
        } else {
            $cartItems = collect();
            $totalAmount = 0;
        }
        $totalQuantity = $cartItems->sum('quantity');

        $files = scandir(public_path('uploads'));  
        return view('documents.documents', compact('files','role', 'cartItems', 'totalAmount', 'totalQuantity'));
    }

    
}
