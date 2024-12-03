<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản Trị Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">

    <style>
       body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .d-flex {
            display: flex;
            height: 100vh;
        }

        .main-left {
            background-color: #343a40;
            color: white;
            padding: 20px;
            width: 20%;
            height: 100%;
        }

        .main-left h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .main-left div {
            margin: 10px 0;
            font-size: 18px;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .main-left div:hover {
            background-color: #495057;
        }

        #main-right-content {
            display: flex;
            flex-direction: column;
            width: 80%;
            height: 100%;
            overflow-y: auto;
        }

        #dynamic-content {
            flex-grow: 1;
        }
        #admin {
            cursor: pointer;
            background-color: transparent;
            font-size: 23px;
        }

        #admin-dropdown {
            list-style: none;
        
        }
        #admin-dropdown div{
            margin: 9px;
        
        }

        #admin-dropdown li {
            background-color: #495057;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            padding: 0px
        }
        ul{
           padding: 0px;
        }

        #admin-dropdown li:hover {
            background-color: #6c757d;
        } 
        table.table td {
            word-wrap: break-word;
            max-width: 385px; 
            white-space: normal; 
        }


    </style>
</head>

<body>
    <div class="d-flex">
        <div class="main-left">
            <h2 class="title">Quản trị Website</h2>
            
            <div class="main-left-1" id="infor">
                <i class="bi bi-house-gear-fill"></i> Trang chủ quản trị
            </div>
            
            <div class="main-left-2" id="load-products">
                <i class="bi bi-box"></i> Sản Phẩm
            </div>
            <div class="main-left-3" id="load-articles">
                <i class="bi bi-file-earmark-post"></i> Bài Viết
            </div>
            <div class="main-left-3" id="load-orders">
                <i class="bi bi-truck"></i> Đơn Hàng
            </div>
            <div class="main-left-3" id="load-documents">
                <i class="bi bi-folder2"></i> Tài Liệu
            </div>
            <div class="main-left-3" id="load-users">
                <i class="bi bi-person-vcard-fill"></i> Người Dùng
            </div>
            <div id="infor">
                <i class="bi bi-gear"></i> Cài Đặt
            </div>

            <div id="admin">
                <i class="bi bi-person-circle"></i> {{$name}}
                <ul id="admin-dropdown" style="display: none;">
                    <li>

                        <div>
                            <form method="POST" action="{{ route('welcome') }}" >
                                @csrf
                                @method('GET')
                                <button type="submit" class="dropdown-item" style="background: none; border: none; color: white;">
                                    <i class="bi bi-arrow-left-square"></i> Trang Ngoài
                                </button>
                            </form>
                        </div>
                    </li>
                    <li>
                        <div>
                            <form method="POST" action="{{ route('logout') }}" >
                                @csrf
                                <button type="submit" id="logout-button" class="dropdown-item" style="background: none; border: none; color: white;">
                                    <i class="bi bi-box-arrow-left"></i> Đăng Xuất
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <div class="d-flex m-3" id="main-right-content">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-size: 10px;"></button>
            </div>
            <script>
                setTimeout(function() {
                    $('.alert').alert('close');
                }, 5000);
            </script>
            @endif

            <div >
                <div id="dynamic-content">
                </div>
            </div>
        </div>
    </div>
    <script>
       $(document).ready(function() {
    let currentUrl = sessionStorage.getItem('currentUrl') || '/infor'; 
    sessionStorage.setItem('currentUrl', currentUrl); 
    loadContent(currentUrl, 'Đang tải sản phẩm...'); 

    $("#load-products, #load-articles, #load-orders, #load-users, #infor,#load-documents").click(function() {
        let targetUrl = $(this).attr("id").replace("load-", "/load-"); 
        currentUrl = targetUrl; 
        sessionStorage.setItem('currentUrl', currentUrl); 
        loadContent(currentUrl, `Đang tải ${$(this).text()}...`);
    });

    async function loadContent(url, loadingMessage) {
        $("#dynamic-content").html(`<p>${loadingMessage}</p>`);
        try {
            let response = await $.ajax({
                url: url,
                method: 'GET'
            });
            $("#dynamic-content").html(response);
            setupPagination(url);      
            setupDeleteHandler(url);    
        } catch (error) {
            $("#dynamic-content").html(`<p>Đã xảy ra lỗi, vui lòng thử lại!</p>`);
            console.error("Error loading content:", error);
        }
    }

    function setupPagination(url) {
        $("#dynamic-content").on("click", ".pagination a", function(e) {
            e.preventDefault();
            let pageUrl = $(this).attr("href");
            currentUrl = pageUrl;
            sessionStorage.setItem('currentUrl', currentUrl);
            loadContent(pageUrl, 'Đang tải...');
        });
    }

    function setupDeleteHandler(url) {
        $(".delete-button").click(function(e) {
            e.preventDefault();
            let form = $(this).closest(".delete-form");
            let deleteUrl = form.attr("action");
            $.ajax({
                url: deleteUrl,
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        loadContent(url, 'Đang tải lại danh sách...');
                    } else {
                        alert("Đã xảy ra lỗi, vui lòng thử lại!");
                    }
                },
                error: function(xhr) {
                    alert("Đã xảy ra lỗi, vui lòng thử lại!");
                }
            });
        });
    }
    $("#logout-button").click(function () {
    sessionStorage.clear(); 
});
$("#admin").click(function() {
        $("#admin-dropdown").toggle(); 
    });
    $(document).click(function(event) {
        if (!$(event.target).closest('#admin').length && !$(event.target).closest('#admin-dropdown').length) {
            $("#admin-dropdown").hide();
        }
    });

});

    </script>
</body>
</html>
