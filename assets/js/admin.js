$(document).ready(function(){
    $('#search').keyup(function (){
        search_table($(this).val());
    });
    function search_table(value){
        $('#myTable tr').each(function (){
            var found='false';
            $(this).each(function (){
                if ($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0)
                {
                    found = 'true';
                }
            });
            if (found =='true'){
                $(this).show();
            }else{
                $(this).hide();
            }
        });
    }
});

$(".allowComment").on("click",function(){
    let commentId= $(this).attr('data-commentId');
    let Button=$(this);
    let commentUserId= $(this).attr('data-commentUserId');
    let commentPostId= $(this).attr('data-commentPostId');
    let likeMessage=$(this).parents('.commentDiv').children('.likeMessage');
    let likesCount=$(this).parents('.commentDiv').children('.countLikes');

    $.post("../../ajax/commentAjax.php?function=allowComment", {commentId: commentId},function (response){
        let resp=JSON.parse(response);
        Button.parents('.buttonParent').hide();
        alert(resp.success);
    });
});
$(".deleteUser").on("click",function(){
    let userId=$(this).attr('data-id');
    let button=$(this);
    let confirmAction = confirm("Are you sure you want to delete this user?");
    if (confirmAction) {
        $.post("../../ajax/userProfileAjax.php?function=deleteUser", {userId: userId},function (response) {
            let resp = JSON.parse(response);
            if (!resp.error==""){
                alert(resp.error);
            }else{
                button.parents('.action-list').parents('.td').parents('.tr').children('#activity').html('Deleted').css("color","red");
                button.hide();

                alert(resp.success);
            }
        });
    } else {
        alert("Action canceled");
    }

});

function insertCategory() {
    let categoryName = $("#newCategory").val();
    $.post("../../ajax/categoryAjax.php", {categoryName: categoryName}, function (response) {
        let resp = JSON.parse(response);
        if (resp.error!=""){
            $(".message-admin").html(resp.error).css("color","red").show();
        }else{
            $(".message-admin").html(resp.success).css("color","green").show();
        }
    });
}
function deletePost() {
    let id = $("#postId").val();
    $.post("../../ajax/postAjax.php?function=deletePost", {id: id}, function (response) {
        let resp = JSON.parse(response);
        alert(resp.success);
    });
}