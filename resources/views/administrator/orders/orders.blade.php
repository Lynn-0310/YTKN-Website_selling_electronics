@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h3>Danh sách đơn hàng</h3>
<div class="container mt-3">
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Nhập mã đơn">
                <button class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Mã đơn</th>           
            <th>Họ và tên</th>
            <th>Quốc gia</th>          
            <th>Thành phố</th>
            <th>Quận(Huyện)</th>
            <th>Số điện thoại</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Hàng động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->first_name }} {{$order->last_name}}</td>
                <td>{{ $order->country}}</td>
                <td>{{ $order->city}}</td>
                <td>{{ $order->district}}</td>

                <td>{{ $order->phone }}</td>
                <td>{{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</td>
                <td>
                    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Chờ xử lý</option>
                            <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Đang xử lý</option>
                            <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Hoàn thành</option>
                            <option value="Canceled" {{ $order->status == 'Canceled' ? 'selected' : '' }}>Hủy</option>
                        </select>
                    </form>
                </td>
                <td>
                    <button class="btn btn-info"><i class="bi bi-eye-fill"></i>    
                    Chi tiết</button>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>


