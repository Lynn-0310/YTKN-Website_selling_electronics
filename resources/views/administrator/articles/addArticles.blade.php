<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="">Thêm Bài viết</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf                   
                <div class="form-group">
                    <label for="title">Tiêu Đề</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="content">Nội dung</label>
                    <input type="text" class="form-control" id="content" name="content" required>
                </div>
                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>

        </div>
    </div>
</div>
