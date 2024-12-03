<!doctype html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Robocon</title>
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
                            <li>Trang Chủ</li>
                            <li >Sản Phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content-wraper pt-60 pb-60 pt-sm-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-1 order-lg-2">
                            <div class="single-banner shop-page-banner">
                                <a href="">
                                    <img src="{{ asset ('images/bg-banner/2.jpg')}}" alt="Li's Static Banner">
                                </a>
                            </div>
                            <div class="shop-top-bar mt-30">                    
                                <div class="product-short">
                                    <p>Sắp xếp theo:</p>
                                    <select class="nice-select">
                                        <option value="trending">Liên quan</option>
                                        <option value="sales">Tên (A - Z)</option>
                                        <option value="sales">Tên (Z - A)</option>
                                        <option value="rating">Giá (Thấp > Cao)</option>
                                        <option value="date">Đánh giá (Thấp nhất)</option>
                                        <option value="price-asc">Mẫu (A - Z)</option>
                                        <option value="price-asc">Mẫu (Z - A)</option>
                                    </select>
                                </div>                   
                            </div>
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">
                                                @foreach ($products as $product)
                                                <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="{{ route('product.show', $product->id) }}}">
                                                                <img src="{{ asset ('images/product/'.$product->image)}}" alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">New</span>
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
                                                                <h4><a class="product_name" href="{{ route('product.show', $product->id) }}">{{$product->name}}</a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">{{ number_format($product->sale_price, 0, ',', '.') }}  VNĐ</span>
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
                                                                        <a class="btn btn-outline-info" href="" data-toggle="modal" data-target="#exampleModalCenter">
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
                                            <div style="margin: 100px 0px; float: right;">{{ $products->links('pagination::bootstrap-4') }}</div>

                                            
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 order-2 order-lg-1">
                            <div class="sidebar-categores-box">
                                <div class="sidebar-title">
                                    <h2>Lọc theo</h2>
                                </div>
                                <button class="btn-clear-all mb-sm-30 mb-xs-30">Xóa tất cả</button>
                                <div class="filter-sub-area">
                                    <h5 class="filter-sub-titel">Thành phần sản phẩm</h5>
                                    <div class="categori-checkbox">
                                        <form action="#">
                                            <ul>
                                                <li><input type="checkbox" name="product-categori"><a href="">Cơ khí</a></li>
                                                <li><input type="checkbox" name="product-categori"><a href="">Điện tử</a></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                                <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                    <h5 class="filter-sub-titel">Danh mục</h5>
                                    <div class="categori-checkbox">
                                        <form action="#">
                                            <ul>
                                                <li><input type="checkbox" name="product-categori"><a href="">Sản phẩm</a></li>
                                                <li><input type="checkbox" name="product-categori"><a href="">Vật tư</a></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-categores-box mb-sm-0 mb-xs-0">
                                <div class="sidebar-title">
                                    <h2>Linh kiện điện tử</h2>
                                </div>
                                <div class="category-tags">
                                    <ul>
                                        <li><a href="">Bản lề</a></li>
                                        <li><a href="">Trục quay</a></li>
                                        <li><a href="">Kẹp trục động cơ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </body>
</html>
