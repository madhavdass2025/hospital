$(document).on('click', '.delete-object', function(){
    var id = $(this).attr('delete-id');
    var q = confirm("Are you sure you want to delete this product?");

    if (q == true){
        $.post('product_delete.php', {
            object_id: id
        }, function(data){
            // reload the page to see the effect of the deletion
            location.reload();
        }).fail(function() {
            alert('Unable to delete.');
        });
    }

    return false;
});
