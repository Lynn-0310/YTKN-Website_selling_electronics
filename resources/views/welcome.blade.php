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
@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
<body>
        <div class="body-wrapper">
            @include('layouts.header')
            <div class="slider-with-banner">
                <div class="container">
                    <div class="row">
                        <div style="width: 100%;">
                            <div class="slider-area pt-sm-30 pt-xs-30">
                                <div class="slider-active owl-carousel">
                                <div class="single-slide align-center-left animation-style-01 bg-1">
                                    <div class="slider-progress"></div>
                                    <div class="slider-content">
                                        <h5>Ưu Đãi Giảm Giá <span>-20% Off</span> Trong Tuần Này</h5>
                                        <h2>Linh kiện điện tử</h2>
                                        <h3>Bắt đầu từ <span>19.000 VNĐ</span></h3>
                                        <div class="default-btn slide-btn">
                                            <a class="links" href="{{route ('products')}}">Mua Sắm Ngay</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide align-center-left animation-style-02 bg-2">
                                    <div class="slider-progress"></div>
                                    <div class="slider-content">
                                        <h5>Ưu Đãi Giảm Giá <span>Black Friday</span> Trong Tuần Này</h5>
                                        <h2>Linh kiện điện tử</h2>
                                        <h3>Bắt đầu từ <span>19.000 VNĐ</span></h3>
                                        <div class="default-btn slide-btn">
                                            <a class="links" href="{{route ('products')}}">Mua Sắm Ngay</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide align-center-left animation-style-01 bg-3">
                                    <div class="slider-progress"></div>
                                    <div class="slider-content">
                                        <h5>Ưu Đãi Giảm Giá <span>-10% Off</span> Trong Tuần Này</h5>
                                        <h2>Linh kiện điện tử</h2>
                                        <h3>Bắt đầu từ <span>$19.000 VNĐ</span></h3>
                                        <div class="default-btn slide-btn">
                                            <a class="links" href="{{route ('products')}}">Mua Sắm Ngay</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          
            <div class="product-area pt-55 pb-25 pt-xs-50">
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
                                                    <span class="new-price">{{ number_format($product->sale_price, 0, ',', '.') }} VNĐ</span>
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
                                                        <a class="btn btn-outline-danger" href="{{route('welcome')}}">
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
            <div class="li-static-banner li-static-banner-4 text-center pt-20">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-banner pb-sm-30 pb-xs-30">
                                <a href="{{route ('products')}}">
                                    <img src=" {{ asset ('images/banner/banner_1.jpg')}}" alt="Li's Static Banner">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-banner">
                                <a href="{{route ('products')}}">
                                    <img src=" {{ asset ('images/banner/banner_2.jpg')}}" alt="Li's Static Banner">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <a href="{{route('articles')}}">
                                    <h2><span>Bài viết mới nhất</span></h2>
                                </a>
                            </div>
                            <div id="latestPostsCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            @foreach($articles as $article)
                                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                                <div class="post-card">
                                                    <div class="post-image">
                                                        <img src="{{ asset('images/articles/'.$article->image)}}" alt="Bài viết số {{$article->id}}" class="img-fluid" style="width: 100%; height: auto; margin-bottom: 20px;">
                                                    </div>
                                                    <div class="post-content" style="word-wrap: break-word;">
                                                        <h5>$article->title</h5> 
                                                        <p>{{ Str::limit($article->content, 100) }}</p> 
                                                        <div class="d-flex justify-content-between align-items-center">
                                                        <span class="post-meta">
                                                            <i class="bi bi-calendar"></i> 
                                                            {{ $article->created_at->day }}/{{ $article->created_at->month }}/{{ $article->created_at->year }}
                                                        </span>
                                                            <a href="{{route('article.show', $article->id)}}" class="read-more">Xem thêm ></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-see-more-container">
                            <a href="{{route('articles')}}">Xem Thêm...</a>
                        </div>                   
                        </div>
                    </div>
                </div>
            </section>
            @include('layouts.footer')
        </div>

    </body>
</html>
