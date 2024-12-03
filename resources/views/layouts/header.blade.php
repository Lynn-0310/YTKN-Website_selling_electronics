    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/venobox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/helper.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">      
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>

    
<header class="li-header-4" style="background-color:#263b96;">
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container" >
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="{{route('welcome')}}"> <img src="{{ asset('images/logo.png') }}"  style="width: 80px;" alt=""></a>
                               
                                </div>
                            </div>
                            <div class="col-lg-10 pl-0 ml-sm-15 ml-xs-15">
                                <form action="" class="hm-searchbox">
                                    <input type="text" placeholder="Enter your search key ...">
                                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                                <div class="header-middle-right">
                                    <ul class="hm-menu" style="display: flex;">                                       
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger" style="background-color:#263b96;">
                                                <span class="item-icon"></span>
                                                <span class="item-text">Giỏ hàng
                                                <span class="badge" style="font-size: 15px;">{{$totalQuantity}}</span>
                                                </span>
                                            </div>                                         
                                            <div class="minicart">
                                                <ul class="minicart-product-list">
                                                    @foreach($cartItems ?? collect() as $cartItem)
                                                    <li>
                                                        <a href="{{route('product.show', $cartItem->product->id)}}" class="minicart-product-image">
                                                            <img src=" {{ asset ('images/product/'.$cartItem->product->image)}}" alt="cart products">
                                                        </a>
                                                        <div class="minicart-product-details d-flex">
                                                            <div>
                                                                <h6><a href=""></a>{{$cartItem->product->name}}</h6>
                                                                <span>{{ number_format($cartItem->price, 0, ',', '.') }} VNĐ</span>
                                                            </div>
                                                            <span class="quantity" style="margin-left: auto; padding-left: 10px;">x{{$cartItem->quantity}}</span>
                                                        </div>
                                                        <style>
                                                        .minicart-product-details {
                                                            display: flex;
                                                            justify-content: space-between;  
                                                            align-items: center;  
                                                        }

                                                        .quantity {
                                                            margin-left: 15px;  
                                                            padding-left: 10px; 
                                                        }
                                                        </style>
                                                        <button class="close">
                                                            <a href="{{ route('cart.remove', $cartItem->id) }}"><i class="fa fa-close"></i></a>
                                                            
                                                        </button>
                                                    </li> 
                                                    @endforeach                                                   
                                                </ul>
                                                <p class="minicart-total">Tổng tiền: <span>{{ number_format($totalAmount, 0, ',', '.') }}VNĐ</span></p>
                                                <div class="minicart-button">
                                                    <a href="{{ route('shopping.cart') }}" class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                                        <span>Giỏ hàng</span>
                                                    </a>
                                                    <a href="{{route('shopping.checkout')}}" class="li-button li-button-fullwidth li-button-sm">
                                                        <span>Thanh toán</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="hm d-flex" style="align-items: center; ">
                                            @if (Route::has('login'))
                                                @auth 
                                                <span class="bi bi-person-circle" style="color:white; font-size:20px ;"></span>                               
                                                <div class="hm-minicart-trigger" style="background-color:#263b96;">
                                                    <span class="item-text">{{ Str::limit(Auth::user()->name, 8) }}</span>
                                                </div>                                          
                                            <div class="minicart">
                                                <ul class="minicart-product-list">
                                                    @if($role === 'admin')
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('admin') }}" style="color: black;">
                                                                Quản trị trang web
                                                            </a>
                                                        </li>                                                   
                                                    @endif
                                                    <li>
                                                    <a class="dropdown-item" href="{{ route('profile.edit') }}" style="color: black;">
                                                        Hồ sơ
                                                    </a>
                                                    </li>                                                                     
                                                    <li>  
                                                        <form method="POST" action="{{ route('logout') }}" style="margin-top: 0.1rem;">
                                                                @csrf
                                                                <button type="submit" class="dropdown-item" style="background: none; border: none; color: black;">
                                                                    Đăng xuất
                                                                </button>
                                                        </form>                                                 
                                                    </li>
                                                </ul>
                                            </div>
                                                @else
                                                    <div class="d-flex" style="margin-top: 0.4rem;">
                                                        <a href="{{ route('login') }}" class="d-flex justify-content-center align-items-center text-white text-decoration-none" style="height: 100%; margin-right: 1rem; color: #ffffff; font-size: 1rem;">
                                                            {{ __('Đăng Nhập') }}
                                                        </a>

                                                        @if (Route::has('register'))
                                                            <a href="{{ route('register') }}" class="d-flex justify-content-center align-items-center text-white text-decoration-none" style="height: 100%; color: #ffffff; font-size: 1rem;">
                                                                {{ __('Đăng Ký') }}
                                                            </a>
                                                        @endif
                                                    </div>
                                                @endauth
                                            @endif
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky stick d-none d-lg-block d-xl-block" style="background-color:#fdfdfd;" >
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                               <div class="hb-menu d-flex justify-content-center" style="margin:0 auto;">
                                   <nav>
                                       <ul >
                                           <li  class="dropdown-holder"><a href="{{route('welcome')}}" style="color:#263b96;">Trang Chủ</li>                                          
                                           <li class="megamenu-holder"><a href="{{route('products')}}" style="color:#263b96;">Sản phẩm</a>
                                               <ul class="megamenu hb-megamenu">
                                                   <li><a href="">Sản Phẩm</a>
                                                           <ul>                                            
                                                           <li><a href=""></a></li>                                                                                                        
                                                           </ul>
                                                   </li>                                                      
                                               </ul>
                                           </li>
                                           <li class=""><a href="{{route('articles')}}" style="color:#263b96;">BÀI VIẾT</a></li>
                                           <li class=""><a href="{{ route('introduction') }}" style="color:#263b96;">GIỚI THIỆU</a></li>
                                           <li class="megamenu-static-holder"><a href="{{route('documents')}}" style="color:#263b96;">Tư liệu tham khảo</a>
                                               
                                           </li>
                                                
                                       </ul>
                                   </nav>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
<div id="chat-widget" class="chat-widget">
    <button id="chat-btn" class="chat-btn">
        <i class="bi bi-chat-dots"></i> 
    </button>
    <div id="chat-box" class="chat-box">
        <div class="chat-header">
            <span>Hỗ trợ khách hàng</span>
            <button id="close-chat" class="close-chat">X</button>
        </div>
        <div class="chat-messages" id="chat-messages">
        </div>
        <div class="chat-input">
            <input type="text" id="message-input" placeholder="Nhập tin nhắn...">
            <button onclick="sendMessage()">Gửi</button>
        </div>
    </div>
</div>

<style>
.chat-widget {
    position: fixed;
    bottom: 100px;
    right: 20px;
    z-index: 9999;
}

.chat-btn {
    background-color: #007bff;
    border: none;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px; 
    color: white;
    cursor: pointer;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.chat-btn:hover {
    background-color: #0056b3;
    transform: scale(1.1);
}

.chat-box {
    display: none;
    position: fixed;
    bottom: 90px;
    right: 20px;
    background-color: white;
    width: 320px;
    height: 450px;
    border-radius: 15px;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    flex-direction: column;
    box-sizing: border-box;
    animation: slideIn 0.3s ease-out;
}

.chat-header {
    background-color: #007bff;
    color: white;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.close-chat {
    background-color: transparent;
    border: none;
    color: white;
    cursor: pointer;
    font-size: 18px;
}

.chat-messages {
    padding: 10px;
    overflow-y: auto;
    flex-grow: 1;
    max-height: 300px;
}

.chat-input {
    display: flex;
    padding: 10px;
    background-color: #007bff;
    border-top: 1px solid #ddd;
}

.chat-input input {
    flex-grow: 1;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.chat-input button {
    background-color: #007bff;
    border: none;
    color: white;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
}

.chat-input button:hover {
    background-color: #128c7e;
}

.message {
    margin: 10px 0;
    padding: 8px;
    background-color: #f1f1f1;
    border-radius: 4px;
    max-width: 80%;
}

.message.sent {
    background-color: #dcf8c6;
    align-self: flex-end;
}

.message.received {
    background-color: #f1f1f1;
    align-self: flex-start;
}


</style>
<script>
document.getElementById("chat-btn").addEventListener("click", function() {
    const chatBox = document.getElementById("chat-box");
    chatBox.style.display = chatBox.style.display === "none" ? "flex" : "none";
});

document.getElementById("close-chat").addEventListener("click", function() {
    const chatBox = document.getElementById("chat-box");
    chatBox.style.display = "none";
});

function sendMessage() {
    const messageInput = document.getElementById("message-input");
    const messageText = messageInput.value.trim();

    if (messageText) {
        const chatMessages = document.getElementById("chat-messages");
        const messageElement = document.createElement("div");
        messageElement.classList.add("message", "sent");
        messageElement.textContent = messageText;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
        setTimeout(() => {
            const responseMessage = document.createElement("div");
            responseMessage.classList.add("message", "received");
            responseMessage.textContent = "Chúng tôi sẽ trả lời bạn sớm.";
            chatMessages.appendChild(responseMessage);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }, 1000);

        messageInput.value = '';
    }
}
</script>