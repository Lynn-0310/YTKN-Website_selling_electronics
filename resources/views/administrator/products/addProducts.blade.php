<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="">Thêm Sản Phẩm</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf                   
                <div class="form-group">
                    <label for="name">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="purchase_price">Giá Nhập</label>
                    <input type="text" class="form-control" id="purchase_price" name="purchase_price" required>
                </div>
                <div class="form-group">
                    <label for="sale_price">Giá Bán</label>
                    <input type="text" class="form-control" id="sale_price" name="sale_price" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Số Lượng</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    <input type="file" class="form-control" id="image" name="image" >
                </div>

                <div class="modal-footer">
                    <a href="" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>

        </div>
    </div>
</div>
