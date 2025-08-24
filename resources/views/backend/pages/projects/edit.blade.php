<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crud_modalLabel">Edit Project</h5>
            <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
            </button>
        </div>
        <div class="modal-body">
            <div class="server_side_error"></div>
            <form id="crud_form" action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="client_id">Client ID</label>
                    <input type="text" class="form-control" id="client_id" name="client_id" value="{{ $project->client_id }}">
                </div>

                <div class="form-group">
                    <label for="title">Project Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $project->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Project Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    @if($project->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/'.$project->image) }}" alt="Project Image" class="img-thumbnail" style="max-height: 100px;">
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="github">GitHub Link</label>
                    <input type="url" class="form-control" id="github" name="github" value="{{ $project->github }}" placeholder="https://github.com/...">
                </div>

                <div class="form-group">
                    <label for="live">Live Link</label>
                    <input type="url" class="form-control" id="live" name="live" value="{{ $project->live }}" placeholder="https://example.com/...">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1" {{ $project->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $project->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="order">Order</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ $project->order }}">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="crud_form_submit_btn" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
