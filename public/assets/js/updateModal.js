$(document).ready(function() {
    $('.updateModal').click(function() {
        var fruitId = $(this).data('id');
        var editFormId = '#editForm_' + fruitId;
        var editFormContent = $(editFormId).html();
        $('#updateModalContent').html(editFormContent);
        $('#updateModal').modal('show');
    });
});
