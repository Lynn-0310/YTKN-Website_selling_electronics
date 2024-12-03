<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
use Spatie\PdfToImage\Pdf;

class AdminController extends Controller
{
    public function index()
    {
        $name = Auth::user()->name;

        return view('administrator.admin' ,compact('name'));

    }
    public function infor(){
        return view('administrator.infor');
    }
    public function loadProducts()
    {
        $products = Products::paginate(10);
        return view('administrator.products.products', compact('products')); 
    }
    public function loadArticles()
    {
        $articles = Articles::paginate(10);
        return view('administrator.articles.articles', compact('articles')); 
    }

    public function destroyarticle($id)
    {
        $article = Articles::findOrFail($id);
        if (!empty($article->image)) {
            $imagePath = public_path('images/articles/' . $article->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); 
            }
        }
        
        $article->delete();

        return redirect()->back()->with('success', 'Bài viết đã được xóa thành công!');
    }
    public function createproduct()
    {
        return view('administrator.products.addProducts');
    }
    public function storeproduct(Request $request)
    {
     $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'purchase_price' => 'required|numeric',
        'sale_price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'image' => 'image|mimes:jpg,png,jpeg,gif', 
    ]);
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension(); 
        $request->image->move(public_path('images/product'), $imageName);  
    } else {
        $imageName = null; 
    }
    Products::create([
        'name' => $validatedData['name'],
        'purchase_price' => $validatedData['purchase_price'],
        'sale_price' => $validatedData['sale_price'],
        'quantity' => $validatedData['quantity'],
        'image' => $imageName, 
    ]);
    return redirect()->back()->with('success', 'Sản phẩm đã được thêm thành công!');
    }

    public function editproduct($id){
        $product = Products::findOrFail($id);
        return view('administrator.products.editProducts', compact('product'));

    }
    public function destroyproduct($id)
    {
        $product = Products::findOrFail($id); 
        if (!empty($product->image)) {
            $imagePath = public_path('images/product/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); 
            }
        }
        $product->delete();

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa thành công!');
    }
    
    public function updateproduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'quantity' => 'required',
            'image' => 'nullable|image',
        ]);
    
        $product = Products::findOrFail($id);
        $product->name = $request->name;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;
    
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images/product'), $imageName);
            $product->image = $imageName;
        }
    
        $product->save();
        
        return redirect()->back()->with('success', 'Sản phẩm đã được cập nhật!');
    }

    public function createarticle()
    {
        return view('administrator.articles.addArticles');
    }
    public function storearticle(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif', 
        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension(); 
            $request->image->move(public_path('images/articles'), $imageName);  
        } else {
            $imageName = null; 
        }
        Articles::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'image' => $imageName, 
        ]);
        return redirect()->back()->with('success', 'Bài viết đã được thêm thành công!');

    }
    public function editarticle($id){
        $article = Articles::findOrFail($id);
        return view('administrator.articles.editArticles', compact('article'));

    }
    public function updatearticle(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'nullable|image',
    ]);

    $article = Articles::findOrFail($id);
    $article->update($request->only(['title', 'content'])); 

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/articles'), $imageName);
        $article->image = $imageName; 
    }

    $article->save(); 

    return redirect()->back()->with('success', 'Bài viết đã được cập nhật!');
}


    public function loadOrder(){

        $orders= Order::all();
        return view('administrator.orders.orders',compact('orders'));
    }
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');
    }

    public function loadUser(){
        $users = User::all();
        return view('administrator.users.users', compact('users'));
    }


    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->input('role');
        $user->save();
    
        return redirect()->back()->with('success', 'Vai trò đã được cập nhật thành công.');
    }
    
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6',
        ]);
    
        $user = User::findOrFail($id);
        $user->password = bcrypt($request->input('password'));
        $user->save();
    
        return redirect()->back()->with('success', 'Mật khẩu đã được cập nhật thành công.');
    }

    public function uploadFile(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:pdf,docx',
        ]);
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName =$file->getClientOriginalName();
            

            $filePath = public_path('uploads');  
            $file->move($filePath, $fileName); 

            if ($file->getClientOriginalExtension() === 'pdf') {
            }
    

            return back()->with('success', 'Tải File thành công');
        }
    }
    
    public function loadDocuments()
    {
        $files = scandir(public_path('uploads'));  
        return view('administrator.documents.document', compact('files'));
    }


    public function deleteFile($file)
    {
        $filePath = public_path('uploads/' . $file);
        
        if (File::exists($filePath)) {
            File::delete($filePath);  
            return back()->with('success', 'File đã được xóa thành công.');
        }

        return back()->with('error', 'File không tồn tại.');
    }


    public function createDocuments(){
        return view('administrator.documents.addDocument');
    }

    
    



    
}
