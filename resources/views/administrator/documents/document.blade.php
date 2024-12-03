<h3>Danh sách File</h3>
<div class="container mt-3">
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Nhập tên file">
                <button class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <a href="#" class="btn btn-success" id="add-new-documents-btn">
                <i class="bi bi-plus-circle-fill"></i> <span>Thêm mới</span>
            </a>                  
        </div>
        <div id="dynamic-content"></div> 
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên File</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($files as $index => $file)
            @if ($file != '.' && $file != '..')  
                <tr>
                    <td>{{ $index + 1 }}</td>  
                    <td>{{ basename($file) }}</td>  
                    <td>
                        <a href="{{ asset('uploads/' . $file) }}" class="btn btn-primary" target="_blank">
                            <i class="bi bi-eye-fill"></i> Chi tiết
                        </a>
                        <form action="{{ route('documents.delete', basename($file)) }}" method="POST" 
                              onsubmit="return confirm('Bạn có chắc chắn muốn xóa mục này?');" 
                              style="display: inline-block; margin-left: 5px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >
                                <i class="bi bi-trash-fill"></i> Xóa
                            </button>
                        </form>
                    </td>                   
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $("#add-new-documents-btn").click(function(e) {
            e.preventDefault(); 
            $.ajax({
                url: '/add-documents', 
                method: 'GET',
                success: function(data) {             
                    $("#dynamic-content").html(data);
                },
                error: function(xhr) {
                    alert("Đã xảy ra lỗi, vui lòng thử lại!");
                }
            });
        });
    });
</script>
