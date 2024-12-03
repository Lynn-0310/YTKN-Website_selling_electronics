@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h3>Danh sách người dùng</h3>
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
            <th>STT</th>     
            <th>Tên</th>         
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Vai trò</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>**********</td> 
        <td>
            <form action="{{ route('users.updateRole', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <select name="role" class="form-select" onchange="this.form.submit()">
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Khách Hàng</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }} >Quản trị viên</option>
                </select>
            </form>
        </td>
        <td>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editPasswordModal{{ $user->id }}">
                <i class="bi bi-pencil-fill edit-icon"></i> Sửa mật khẩu
            </button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@foreach ($users as $user)
<div class="modal fade" id="editPasswordModal{{ $user->id }}" tabindex="-1" aria-labelledby="editPasswordModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                
            <div class="modal-header">
                <h5 class="modal-title" id="editPasswordModalLabel{{ $user->id }}">Sửa mật khẩu người dùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.updatePassword', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Tên người dùng</label>
                        <input type="text" class="form-control"  name="" readonly value="{{$user->name}}">

                        <label for="password{{ $user->id }}" class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="password{{ $user->id }}" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
