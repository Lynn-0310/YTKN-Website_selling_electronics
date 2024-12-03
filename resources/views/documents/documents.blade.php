<!doctype html>
<html lang="zxx">
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
                        <li class="active">Tư liệu Tham Khảo</li>
                    </ul>
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên File</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $index => $file)
                    @if ($file != '.' && $file != '..')  
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><a href="{{ asset('uploads/' . $file) }}" target="_blank">{{ basename($file) }}</a></td>  
                            <td>
                                <a href="{{ asset('uploads/' . $file) }}" class="btn btn-primary" target="_blank"  >
                                    <i class="bi bi-eye-fill"></i> Chi tiết
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        @include('layouts.footer')
    </div>
</body>
</html>

<style>
    .table-striped {
        width: 80%;
        margin: 30px auto;
        border-collapse: collapse; 
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
    }

    .table-striped th, .table-striped td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table-striped th {
        background-color: #f1f1f1;
        font-weight: bold;
        color: #333;
    }

    .table-striped tr:hover {
        background-color: #f9f9f9; 
    }

    .table-striped td a {
        color: #007bff; 
        text-decoration: none; 
        font-weight: 600;
    }

    .table-striped td:hover {
        color: #218838; 
    }

    .table-striped .btn {

        border: none;
        padding: 6px 12px;
        color: white;
        border-radius: 4px;
        cursor: pointer;
    }



    .bi-eye-fill {
        font-size: 18px;
    }
</style>
