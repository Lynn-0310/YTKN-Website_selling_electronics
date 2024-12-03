<h3>Danh sách Sản Phẩm</h3>
<div class="container mt-3">
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm">
                <button class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
        <div class="col-md-6 text-end">
    <a href="" class="btn btn-success" id="add-new-product-btn">
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
            <th>Tên Sản Phẩm</th>
            <th>Giá bán</th>
            <th>Số lượng</th>
            <th>Hình ảnh</th>
            <th>Giá mua</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->sale_price, 0, ',', '.') }} VNĐ</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <img src="{{ asset('images/product/'.$product->image ) }}" alt="Li's Product Image" style="width: 100px; height: auto;">
                </td>
                <td>{{ number_format($product->purchase_price, 0, ',', '.') }} VNĐ</td>
                <td >
                    <a href="{{ route('products.edit', $product->id) }}" id="edit-product-btn-{{ $product->id }}">
                        <i class="bi bi-pencil-fill edit-icon" style="color: #FFC107;"></i>
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="post" 
                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa mục này?');" 
                        style="display: inline-block; margin-left: 5px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer;">
                            <i class="bi bi-trash3-fill delete-icon" style="color: red"></i>
                        </button>
                    </form>
                </td>
                
            </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links('pagination::bootstrap-4') }}
<script>
   $(document).ready(function() {
    $("#add-new-product-btn").click(function(e) {
        e.preventDefault(); 
        $.ajax({
            url: '/add-products', 
            method: 'GET',
            success: function(data) {
                $("#dynamic-content").html(data);
            },
            error: function(xhr) {
                alert("Đã xảy ra lỗi, vui lòng thử lại!");
            }
        });
    });

    $(document).on("click", "[id^='edit-product-btn-']", function(e) {
        e.preventDefault(); 
        var productId = $(this).attr('id').split('-').pop();  
        $.ajax({
            url: '/edit-products/' + productId, 
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

