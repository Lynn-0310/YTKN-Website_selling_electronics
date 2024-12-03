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
            <div class="slider-with-banner">
                <div class="container">
                    <p>Trang chủ/ Giới thiệu</p>
                    <div style="width: 95%; height: 80%; background-color: whitesmoke;" >
                        
                        <!-- Begin Slider Area -->
                        <div  style="margin-left:  30px ;">
                            <h1 >Giới thiệu</h1>
                            <p> Rolat không chỉ là một cộng đồng, mà còn là nơi khơi nguồn sáng tạo và kết nối những tâm hồn đam mê công nghệ. 
                                Các thành viên tại đây không ngừng học hỏi, chia sẻ kiến thức và cùng nhau khám phá những ứng dụng mới của robot 
                                và hệ thống tự động hóa.  <br> Với tinh thần làm việc nhóm và đổi mới, Rolat đã và đang nghiên cứu, phát triển nhiều sản phẩm mang tính thực tiễn cao như: </p>
                            <ul style="margin-left: 20px">
                                <li style="list-style-type: disc;">Robot hỗ trợ trong giáo dục, giúp trẻ em học tập thông minh hơn.</li>
                                <li style="list-style-type: disc;">Hệ thống tự động hóa trong nông nghiệp, tăng năng suất và giảm thiểu công sức lao động.</li>
                                <li style="list-style-type: disc;">Robot phục vụ trong các lĩnh vực công nghiệp, giải trí, và đời sống hằng ngày.</li>
                            </ul>
                            <p> <br> Rolat không ngừng mở rộng hợp tác với các doanh nghiệp, trung tâm nghiên cứu 
                                và các chuyên gia trong ngành để đưa các ý tưởng sáng tạo từ phòng thí nghiệm ra thực tế. 
                                Cộng đồng cũng thường xuyên tổ chức các buổi workshop, cuộc thi, và giao lưu học hỏi với các đội robot khác, 
                                tạo sân chơi bổ ích cho sinh viên và lan tỏa niềm đam mê công nghệ đến xã hội.</p>
                            <img src=" {{ asset('images/introduce/robot.jpg') }}" alt="hinhanh-robot" style="margin-left: 250px; width: 50%;">
                                </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')>
        </div>
    </body>
</html>
