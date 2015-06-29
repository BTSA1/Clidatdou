function DeleteComment(id){
    $.post(
        'models/deleteComment.php',
        {
            id : id,
        },
        function (data){
            $('#' + id).hide();
        }
    );
}

function DeleteLink(id){
    $.post(
        'models/deleteLink.php',
        {
            id : id,
        },
        function (data){
            $('#' + id).hide();
        }
    );
}