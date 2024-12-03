<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="">Thêm File</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">

                    <input type="file" name="file" id="file" class="form-control">
                </div>
                
                <div class="modal-footer">
                    <a href="" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
