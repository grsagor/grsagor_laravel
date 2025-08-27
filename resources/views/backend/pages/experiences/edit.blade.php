<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crud_modalLabel">Edit Experience</h5>
            <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
            </button>
        </div>
        <div class="modal-body">
            <div class="server_side_error"></div>
            <form id="crud_form" action="{{ route('admin.experiences.update', $experience->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="title">Job Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $experience->title }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="company">Company Name</label>
                    <input type="text" class="form-control" id="company" name="company" value="{{ $experience->company }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="logo">Company Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                    @if($experience->logo)
                        <div class="mt-2">
                            <img src="{{ asset($experience->logo) }}" alt="Company Logo" class="img-thumbnail" style="max-height: 100px;">
                        </div>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $experience->start_date ? \Carbon\Carbon::parse($experience->start_date)->format('Y-m-d') : '' }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('Y-m-d') : '' }}">
                    <small class="text-muted">Leave blank if current job</small>
                </div>

                <div class="form-group mb-3">
                    <label for="description">Job Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $experience->description }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1" {{ $experience->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $experience->status == 0 ? 'selected' : '' }}>Inactive</option>
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
