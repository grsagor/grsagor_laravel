$(document).ready(function() {
    // Handle project details button click
    $('.project-details-btn').on('click', function() {
        const projectId = $(this).data('project-id');
        
        // Show loading state
        $('#projectDetailsContent').html('<div class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');
        
        // Make AJAX request to get project details
        $.ajax({
            url: `/projects/${projectId}/details`,
            method: 'GET',
            success: function(response) {
                $('#projectDetailsContent').html(response);
                $('#projectDetailsModal').modal('show');
            },
            error: function(xhr) {
                $('#projectDetailsContent').html('<div class="alert alert-danger">Error loading project details. Please try again.</div>');
                $('#projectDetailsModal').modal('show');
            }
        });
    });
});