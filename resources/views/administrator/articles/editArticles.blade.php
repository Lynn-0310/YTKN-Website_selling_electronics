<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="">Chỉnh Sửa Sản Phẩm</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{  $article->title }}" required>
                </div>
                <div class="form-group">
                    <label for="content">Nội dung</label>
                    <input type="text" class="form-control" id="content" name="content" value="{{  $article->content }}" required >
                </div>
                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if($article->image)
                        <img src="{{ asset('images/articles/'.$article->image) }} " alt="Product Image" width="100">
                        
                    @endif
                </div>

                <div class="modal-footer">
                    <a href="" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
