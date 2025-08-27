<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crud_modalLabel">Edit Blog</h5>
            <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
            </button>
        </div>
        <div class="modal-body">
            <div class="server_side_error"></div>
            <form id="crud_form" action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Blog Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
                </div>

                <div class="form-group">
                    <label for="short_description">Short Description</label>
                    <textarea class="form-control" id="short_description" name="short_description" rows="3">{{ $blog->short_description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Featured Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    @if($blog->image)
                        <div class="mt-2">
                            <img src="{{ asset($blog->image) }}" alt="Blog Image" class="img-thumbnail" style="max-height: 100px;">
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="date">Publish Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ $blog->date ? \Carbon\Carbon::parse($blog->date)->format('Y-m-d') : '' }}">
                </div>

                <div class="form-group">
                    <label for="url">URL Slug</label>
                    <input type="text" class="form-control" id="url" name="url" value="{{ $blog->url }}" placeholder="my-blog-post">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1" {{ $blog->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $blog->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="crud_form_submit_btn" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
