<!doctype html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ROBOCON</title>
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
                            <li class="active">Bài viết</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 order-lg-2 order-2">
                            <div class="li-blog-sidebar-wrapper">
                                <div class="li-blog-sidebar">
                                    <div class="li-sidebar-search-form">
                                        <form action="#">
                                            <input type="text" class="li-search-field" placeholder="search here">
                                            <button type="submit" class="li-search-btn"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>                                
                                <div class="li-blog-sidebar">
                                    <h4 class="li-blog-sidebar-title">Bài viết mới nhất</h4>
                                    @foreach ($articles as $at)
                                    <div class="li-recent-post pb-30">
                                        <div class="li-recent-post-thumb">
                                            <a href="{{route('article.show', $at->id)}}">
                                                <img class="img-full" src="{{ asset('images/articles/'.$at->image) }}" alt="Li's Product Image">
                                            </a>
                                        </div>
                                        <div class="li-recent-post-des">
                                            <span><a href="{{route('article.show', $at->id)}}">{{ Str::limit($at->title, 40) }}</a></span>
                                            <span class="li-post-date">{{ $at->created_at->day }}/{{ $at->created_at->month }}/{{ $at->created_at->year }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-9 order-lg-1 order-1">
                            <div class="row li-main-content">
                                <div class="col-lg-12">
                                    <div class="li-blog-single-item pb-30">
                                        <div class="li-blog-banner">
                                            <a href="{{route('article.show', $article->id)}}"><img class="img-full" src=" {{ asset('images/articles/'.$article->image) }}" alt=""></a>
                                        </div>
                                        <div class="li-blog-content">
                                            <div class="li-blog-details">
                                                <h3 class="li-blog-heading pt-25"><a href="{{route('article.show', $article->id)}}">{{$article->title}}</a></h3>
                                                <div class="li-blog-meta">
                                                    <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                                    <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>
                                                    <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{ $article->created_at->day }}/{{ $article->created_at->month }}/{{ $article->created_at->year }}</a>
                                                </div>
                                                <p>{{$article->content}}</p>
                                                <div class="li-blog-sharing text-center pt-30">
                                                    <h4>share this post:</h4>
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="li-comment-section">
                                        <h3>03 comment</h3>
                                        <ul>
                                            <li>
                                                <div class="author-avatar pt-15">
                                                    <img src=" {{ asset('images/product-details/user.png') }}" alt="User">
                                                </div>
                                                <div class="comment-body pl-15">
                                                        <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
                                                    <h5 class="comment-author pt-15">admin</h5>
                                                    <div class="comment-post-date">
                                                        20 nov, 2018 at 9:30pm
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                                </div>
                                            </li>
                                            <li class="comment-children">
                                                <div class="author-avatar pt-15">
                                                    <img src="{{ asset('images/product-details/admin.png ') }}" alt="Admin">
                                                </div>
                                                <div class="comment-body pl-15">
                                                        <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
                                                    <h5 class="comment-author pt-15">admin</h5>
                                                    <div class="comment-post-date">
                                                        20 nov, 2018 at 9:30pm
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="author-avatar pt-15">
                                                    <img src=" {{ asset('images/product-details/admin.png') }}" alt="Admin">
                                                </div>
                                                <div class="comment-body pl-15">
                                                    <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
                                                    <h5 class="comment-author pt-15">admin</h5>
                                                    <div class="comment-post-date">
                                                        20 nov, 2018 at 9:30pm
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="li-blog-comment-wrapper">
                                        <h3>leave a reply</h3>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <form action="#">
                                            <div class="comment-post-box">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label>comment</label>
                                                        <textarea name="commnet" placeholder="Write a comment"></textarea>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20 mb-xs-20">
                                                        <label>Name</label>
                                                        <input type="text" class="coment-field" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20 mb-xs-20">
                                                        <label>Email</label>
                                                        <input type="text" class="coment-field" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20">
                                                        <label>Website</label>
                                                        <input type="text" class="coment-field" placeholder="Website">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="coment-btn pt-30 pb-xs-30 pb-sm-30 f-left">
                                                            <input class="li-btn-2" type="submit" name="submit" value="post comment">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
