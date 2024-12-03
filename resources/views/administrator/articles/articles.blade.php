<h3>Danh sách Bài Viết</h3>
<div class="container mt-3">
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Nhập tên bài viết">
                <button class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <a href="#" class="btn btn-success" id="add-new-article-btn">
                <i class="bi bi-plus-circle-fill"></i> <span>Thêm mới</span>
            </a>                  
        </div>
        <div id="dynamic-content"></div> 
    </div>
</div>

<table class="table table-striped" >
    <thead>
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Hình ảnh</th>
            <th>Nội dung</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>
                    <img src=" {{ asset('images/articles/'.$article->image) }}" alt="Li's article Image" style="width: 100px; height: auto;">

                </td>
                <td>{{ $article->content }}</td>
                <td>{{ $article->created_at }}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->id) }}" id="edit-article-btn-{{ $article->id }}">
                        <i class="bi bi-pencil-fill edit-icon" style="color: #FFC107;"></i>
                    </a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="post" 
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

{{ $articles->links('pagination::bootstrap-4') }}

<script>
    $(document).ready(function() {
        $("#add-new-article-btn").click(function(e) {
            e.preventDefault(); 
            $.ajax({
                url: '/add-articles', 
                method: 'GET',
                success: function(data) {             
                    $("#dynamic-content").html(data);
                },
                error: function(xhr) {
                    alert("Đã xảy ra lỗi, vui lòng thử lại!");
                }
            });
        });
        $(document).on("click", "[id^='edit-article-btn-']", function(e) {
            e.preventDefault(); 
            var articleId = $(this).attr('id').split('-').pop();  
            $.ajax({
                url: '/edit-articles/' + articleId, 
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


