@extends('backend.layout.app')

@section('content')
    <div class="container-fluid px-4">
        <h4 class="mt-2 mb-3">Contact Management</h4>
        <div class="card my-2">
            <div class="card-header">
                <div class="row ">
                    <div class="col-12 d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <h5 class="m-0">Contact Messages</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered yajra-datatable" data-url="{{ route('admin.contacts.list') }}">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="crud_modal" tabindex="-1" role="dialog" aria-labelledby="crud_modalLabel"
        aria-hidden="true">

    </div>
@endsection

@section('script')
    <script>
        const columns = [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'subject',
                name: 'subject'
            },
            {
                data: 'status_badge',
                name: 'status_badge',
                orderable: false,
                searchable: false
            },
            {
                data: 'created_at',
                name: 'created_at',
                render: function(data) {
                    return new Date(data).toLocaleString();
                }
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ];

        let table = initDatatable({columns});

        // Handle mark as read
        $(document).on('click', '.mark_read_btn', function() {
            const url = $(this).data('url');
            if (confirm('Mark this message as read?')) {
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
                            table.ajax.reload();
                        }
                    },
                    error: function() {
                        toastr.error('Something went wrong!');
                    }
                });
            }
        });

        // Handle mark as unread
        $(document).on('click', '.mark_unread_btn', function() {
            const url = $(this).data('url');
            if (confirm('Mark this message as unread?')) {
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
                            table.ajax.reload();
                        }
                    },
                    error: function() {
                        toastr.error('Something went wrong!');
                    }
                });
            }
        });

        // Handle view button
        $(document).on('click', '.view_btn', function() {
            const url = $(this).data('url');
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#crud_modal').html(response.html).modal('show');
                },
                error: function() {
                    toastr.error('Something went wrong!');
                }
            });
        });
    </script>
@endsection
