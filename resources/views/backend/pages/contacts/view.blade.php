<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crud_modalLabel">Contact Message Details</h5>
            <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Name:</strong>
                    <p class="mb-0">{{ $contact->name }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Email:</strong>
                    <p class="mb-0">
                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                    </p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Subject:</strong>
                    <p class="mb-0">{{ $contact->subject }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Status:</strong>
                    <p class="mb-0">
                        @if($contact->is_read)
                            <span class="badge bg-success">Read</span>
                        @else
                            <span class="badge bg-warning">Unread</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Date:</strong>
                    <p class="mb-0">{{ $contact->created_at->format('F d, Y h:i A') }}</p>
                </div>
            </div>
            <div class="mb-3">
                <strong>Message:</strong>
                <div class="border p-3 rounded bg-light mt-2" style="white-space: pre-wrap;">{{ $contact->message }}</div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            @if(!$contact->is_read)
                <button type="button" class="btn btn-success mark_read_btn" data-url="{{ route('admin.contacts.mark-read', ['id' => $contact->id]) }}">
                    Mark as Read
                </button>
            @else
                <button type="button" class="btn btn-warning mark_unread_btn" data-url="{{ route('admin.contacts.mark-unread', ['id' => $contact->id]) }}">
                    Mark as Unread
                </button>
            @endif
            <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-primary">
                <i class="fa-solid fa-reply me-1"></i>Reply
            </a>
        </div>
    </div>
</div>

<script>
    // Handle mark as read from modal
    $(document).on('click', '.mark_read_btn', function() {
        const url = $(this).data('url');
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'PUT'
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    $('#crud_modal').modal('hide');
                    if (typeof table !== 'undefined') {
                        table.ajax.reload();
                    }
                }
            },
            error: function() {
                toastr.error('Something went wrong!');
            }
        });
    });

    // Handle mark as unread from modal
    $(document).on('click', '.mark_unread_btn', function() {
        const url = $(this).data('url');
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'PUT'
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    $('#crud_modal').modal('hide');
                    if (typeof table !== 'undefined') {
                        table.ajax.reload();
                    }
                }
            },
            error: function() {
                toastr.error('Something went wrong!');
            }
        });
    });
</script>
