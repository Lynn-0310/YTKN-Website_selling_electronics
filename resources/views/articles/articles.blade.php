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
            <div class="li-main-blog-page pt-60 pb-55">
                <div class="container">
                    <div class="row">
                        <div class="col-lg order-1">
                            <div class="row li-main-content">
                                @foreach($articles as $article)
                                <div class="col-lg-6 col-md-6">
                                    <div class="li-blog-single-item pb-25">
                                        <div class="li-blog-banner">
                                            <a href="{{route('article.show', $article->id)}}"><img class="img-full" src="images\articles\{{$article->image}}" alt="Bài viết số {{$article->id}}"></a>
                                        </div>
                                        <div class="li-blog-content" style="word-wrap: break-word;">
                                            <div class="li-blog-details">
                                                <h3 class="li-blog-heading pt-25"><a href="{{route('article.show', $article->id)}}">{{$article->title}}</a></h3>
                                                <div class="li-blog-meta">
                                                    <a class="author" href=""><i class="fa fa-user"></i>Admin</a>
                                                    <a class="comment" href=""><i class="fa fa-comment-o"></i> 3 bình luận</a>
                                                    <a class="post-time" href=""><i class="fa fa-calendar"></i>  {{ $article->created_at->day }}/{{ $article->created_at->month }}/{{ $article->created_at->year }}</a>
                                                </div>
                                                <p>{{ Str::limit($article->content, 120) }}...</p>
                                                <a class="read-more" href="{{route('article.show', $article->id)}}">Đọc tiếp...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                            
                            </div> 
                            <div class="d-flex justify-content-center">
                                {{ $articles->links('pagination::bootstrap-4') }}
                            </div>                                                   
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </body>
</html>
