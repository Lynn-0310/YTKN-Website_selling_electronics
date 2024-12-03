<!doctype html>
<html class="no-js" lang="vi">
    
<!-- checkout31:27-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Thanh Toán</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
    </head>
    <body>
        <div class="body-wrapper">
            @include('layouts.header')
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li>Trang chủ</li>
                            <li class="active">Thanh Toán</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="checkout-area pt-60 pb-30">
            <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="checkbox-form">
                            <h3>CHI TIẾT THANH TOÁN</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="country-select clearfix">
                                        <label>Quốc Gia <span class="required">*</span></label>
                                        <select class="nice-select wide" name="country" required>
                                            <option data-display="Việt Nam" value="Vietnam">Việt Nam</option>
                                            <option value="South Korea">Hàn Quốc</option>
                                            <option value="Laos">Lào</option>
                                            <option value="USA">Mỹ</option>
                                            <option value="Germany">Đức</option>
                                            <option value="Australia">Úc</option>
                                            <option value="UK">Anh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Họ<span class="required">*</span></label>
                                        <input name="first_name" placeholder="Họ" type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Tên<span class="required">*</span></label>
                                        <input name="last_name" placeholder="Tên" type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Địa chỉ <span class="required">*</span></label>
                                        <input name="address" placeholder="Địa chỉ" type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Thành phố <span class="required">*</span></label>
                                        <input name="city" placeholder="Thành phố" type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Quận<span class="required">*</span></label>
                                        <input name="district" id="district" placeholder="Quận/Huyện" type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email <span class="required">*</span></label>
                                        <input name="email" placeholder="Địa chỉ email" type="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Số điện thoại <span class="required">*</span></label>
                                        <input name="phone" placeholder="Số điện thoại" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="different-address">
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>Ghi chú đơn hàng</label>
                                        <textarea name="order_notes" id="checkout-mess" cols="30" rows="10" placeholder="Ghi chú về đơn hàng của bạn, ví dụ: ghi chú đặc biệt cho giao hàng."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>Đơn Hàng Của Bạn</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Đơn giá</th>
                                        <th class="cart-product-total">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cartItems as $cartItem)
                    <tr class="cart_item">
                        <td class="cart-product-name">{{ $cartItem->product->name }}</td>
                        <td><strong class="product-quantity">× {{ $cartItem->quantity }}</strong></td>
                        <td><span class="amount">{{ number_format($cartItem->price, 0, ',', '.') }} VNĐ</span></td>
                        <td class="cart-product-total"><span class="amount">{{ number_format($cartItem->quantity * $cartItem->price, 0, ',', '.') }} VNĐ</span></td>
                        <input type="hidden" name="cart_items[{{$loop->index}}][product_name]" value="{{$cartItem->product->name}}">
        
                        <input type="hidden" name="cart_items[{{ $loop->index }}][quantity]" value="{{ $cartItem->quantity }}">
                        <input type="hidden" name="cart_items[{{ $loop->index }}][price]" value="{{ $cartItem->price }}">
                        <input type="hidden" name="cart_items[{{ $loop->index }}][total]" value="{{ $cartItem->quantity * $cartItem->price }}">
        
        
                        
                    </tr>
                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Tạm tính</th>
                                        <td></td>
                                        <td></td>
                                        <td><span class="amount">{{ number_format($totalAmount, 0, ',', '.') }} VNĐ</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="order-total d-flex">
                                <div style="font-size: 20px; margin-left:15px; font-weight:bold">Tổng cộng</div>
                                <div style="font-size: 20px; text-align: right; flex-grow: 1;">
                                    <strong><span class="amount">{{ number_format($totalAmount, 0, ',', '.') }} VNĐ</span></strong>
                                    <input type="hidden" name="totalAmount" value="{{ $totalAmount }}">
                                </div>
                            </div>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <h5 class="panel-title">
                                    <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Thanh toán khi nhận hàng
                                    </a>
                                </h5>
                                <div class="card-body">
                                    <p>Đơn hàng của bạn sẽ được giao và khi nhận được hàng bạn mới cần thanh toán</p>
                                </div>
                            </div>
                            <div class="order-button-payment">
                                <input value="Đặt hàng" type="submit">
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        
        
                    </div>

            @include('layouts.footer')
        </div>
    </body>
</html>
