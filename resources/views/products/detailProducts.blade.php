<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- single-product-tab-style-left31:50-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ROBOCON</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
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
                        <li class="active">Sản phẩm</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content-wraper">
            <div class="container">
                <div class="row single-product-area">
                    <div class="col-lg-5 col-md-6">
                        <div class="product-details-left sp-tab-style-left-page">
                            <div class="product-details-images slider-navigation-1">
                                <div class="lg-image">
                                    <a class="popup-img venobox vbox-item" href="{{asset('images/product/'.$product->image)}}" data-gall="myGallery">
                                        <img src="{{asset('images/product/'.$product->image)}}" alt="Hình ảnh sản phẩm">
                                    </a>
                                </div>
                            </div>
                            <div class="tab-style-left">
                                <div class="sm-image">
                                    <img src="{{asset('images/product/'.$product->image)}}" alt="Hình ảnh sản phẩm thu nhỏ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2>{{$product->name}}</h2>                             
                                <div class="rating-box pt-20">
                                    <ul class="rating rating-with-review-item">
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        <li class="review-item"><a href="">Đọc đánh giá</a></li>
                                        <li class="review-item"><a href="">Viết đánh giá</a></li>
                                    </ul>
                                </div>
                                <div class="price-box pt-20">
                                    <span class="new-price new-price-2">{{$product->sale_price}} VNĐ</span>
                                </div>
                                <div class="product-desc">
                                    <p>
                                        <span>Mô tả sản phẩm, ...............</span>
                                    </p>
                                </div>
                                <div class="single-add-to-cart">
                                    <form action="{{ route('cart.add', $product->id) }}" class="cart-quantity" method="POST">
                                        @csrf
                                        <div class="quantity">
                                            <label>Số lượng</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" type="submit">Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                                <div class="product-additional-info pt-25">
                                    <div class="product-social-sharing pt-25">
                                        <ul>
                                            <li class="facebook"><a href=""><i class="fa fa-facebook"></i>Facebook</a></li>
                                            <li class="twitter"><a href=""><i class="fa fa-twitter"></i>Twitter</a></li>
                                            <li class="google-plus"><a href=""><i class="fa fa-google-plus"></i>Google +</a></li>
                                            <li class="instagram"><a href=""><i class="fa fa-instagram"></i>Instagram</a></li>
                                        </ul>
                                    </div>
                                </div>                          
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="product-area pt-35">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="li-product-tab">
                            <ul class="nav li-product-menu">
                                <li><a class="active" data-toggle="tab" href="#description"><span>Mô tả</span></a></li>
                                <li><a data-toggle="tab" href="#product-details"><span>Chi tiết sản phẩm</span></a></li>
                                <li><a data-toggle="tab" href="#reviews"><span>Đánh giá</span></a></li>
                            </ul>               
                        </div>
                    </div>
                </div>
                
                <div class="tab-content">
                    <div id="description" class="tab-pane active show" role="tabpanel">
                        <div class="product-description">
                            <p>Mô tả chi tiết ......</p>
                        </div>
                    </div>
                    <div id="product-details" class="tab-pane" role="tabpanel">
                        <div class="product-description">
                            <p>Thông tin chi tiết về sản phẩm sẽ được thêm tại đây.</p>
                        </div>
                    </div>
                    <div id="reviews" class="tab-pane" role="tabpanel">
                        <div class="product-reviews">
                            <p>Các đánh giá sản phẩm từ khách hàng.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="li-product-tab">
                            <ul class="nav li-product-menu">
                                <li><a class="active" data-toggle="tab" href="{{ route('products') }}"><span>Bộ siêu tập sản phẩm</span></a></li>
                            </ul>               
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-3 col-sm-6 mb-4"> 
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="{{route('product.show', $product->id)}}">
                                                <img src="{{ asset ('images/product/'.$product->image)}}" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">Mới</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="{{route('product.show', $product->id)}}">{{$product->name}}</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">{{$product->sale_price}} VNĐ</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="list-unstyled d-flex">
                                                    <li class="mr-1">
                                                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                                                        </form>
                                                    </li>
                                                    <li class="mr-1">
                                                        <a class="btn btn-outline-danger" href="">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-outline-info" href="{{route('product.show', $product->id)}}" >
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="btn-see-more-container">
                            <a href="{{ route('products') }}">Xem Thêm...</a>
                        </div>
                        <style>
                            .btn-see-more-container {
                                display: flex; 
                                justify-content: center;
                                align-items: center;
                                height: 100px; 
                            }

                            .btn-see-more-container a {
                                display: inline-block;
                                background-color: #007bff;
                                color: #fff;
                                padding: 10px 20px;
                                text-align: center;
                                border-radius: 5px;
                                text-decoration: none;
                                font-size: 16px;
                                cursor: pointer;
                                transition: background-color 0.3s ease;
                            }

                            .btn-see-more-container a:hover {
                                background-color: #0056b3;
                            }
                        </style>                      
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
</body>
</html>
