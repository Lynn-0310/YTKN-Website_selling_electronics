<!doctype html>
<html class="no-js" lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ROBOCON</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
</head>
<body>
    @include('layouts.header')
    <div class="body-wrapper">
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li>Trang Chủ</li>
                        <li class="active">Giỏ Hàng</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="Shopping-cart-area pt-60 pb-60">
            <div class="container">
                <div class="row">
                <div class="col-12">
    <form action="{{ route('shopping.update') }}" method="POST">
        @csrf
        <div class="table-content table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="li-product-remove">Xóa</th>
                        <th class="li-product-thumbnail">Hình ảnh</th>
                        <th class="cart-product-name">Sản phẩm</th>
                        <th class="li-product-price">Đơn giá</th>
                        <th class="li-product-quantity">Số lượng</th>
                        <th class="li-product-subtotal">Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $cartItem)
                    <tr>
                        <td class="li-product-remove">
                            <a href="{{ route('cart.remove', $cartItem->id) }}"><i class="fa fa-times"></i></a>
                        </td>
                        <td class="li-product-thumbnail">
                            <a href="{{route('product.show', $cartItem->product->id)}}"><img src="{{asset('images/product/'.$cartItem->product->image)}}" alt="Hình ảnh sản phẩm Li" style="width:150px"></a>
                        </td>
                        <td class="li-product-name"><a href="{{route('product.show', $cartItem->product->id)}}">{{$cartItem->product->name}}</a></td>
                        <td class="li-product-price">
                            <span class="amount">{{ number_format($cartItem->price, 0, ',', '.') }} VNĐ</span>
                        </td>
                        <td class="quantity">
                            <label>Số lượng</label>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" name="quantities[{{ $cartItem->id }}]" value="{{ $cartItem->quantity }}" type="number" min="1">
                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                            </div>
                        </td>
                        <td class="product-subtotal">
                            <span class="amount">{{ number_format($cartItem->quantity * $cartItem->price, 0, ',', '.') }} VNĐ</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="coupon-all">
                    <div class="coupon">
                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Mã giảm giá" type="text">
                        <input class="button" name="apply_coupon" value="Áp dụng mã" type="submit">
                    </div>
                    <div class="coupon2">
                        <input class="button" name="update_cart" value="Cập nhật giỏ hàng" type="submit">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 ml-auto">
                <div class="cart-page-total">
                    <h2>Tổng giỏ hàng</h2>
                    <ul>
                        <li>Tạm tính <span>{{ number_format($totalAmount, 0, ',', '.') }} VNĐ</span></li>
                        <li>Tổng cộng <span>{{ number_format($totalAmount, 0, ',', '.') }} VNĐ</span></li>
                    </ul>
                    <a href="{{route('shopping.checkout')}}">Thanh toán</a>
                </div>
            </div>
        </div>
    </form>
</div>

                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
</body>
</html>
