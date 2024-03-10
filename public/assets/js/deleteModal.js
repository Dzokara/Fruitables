$(document).ready(function () {
    $('.deleteModal').click(function () {
        var id = $(this).data('id');
        $('#fruit_id').val(id);
        $('#deleteModal').modal('show');
    });

    $('.cancelDelete').click(function () {
        $('#deleteModal').modal('hide');
    });
});
