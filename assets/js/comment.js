function addComment(){
    let data="podaci";
    $.post("../../ajax/commentAjax.php?function=addComment", {data:data},function (response){
        let resp=JSON.parse(response);
        if (resp.success!==""){
            $("#commentSection").show();

        }else{
            $("#commentMessage").show();
        }

    });
}
function postComment(){
    let userId=$("#userId").val();
    let postId=$("#postId").val();
    let content=$("#commentContent").val();
    let message=$("#successMessage");

    $.post("../../ajax/commentAjax.php?function=postComment", {userId: userId,postId: postId,content:content},function (response){
        let resp=JSON.parse(response);
        if (resp.success!==""){
          message.html(resp.success).show();
        }else{
            message.html(resp.error).show();
        }

    });
    $("#commentContent").val('');
}

    $(".likeButton").on("click",function(){
        let commentId= $(this).attr('data-commentId');
        let commentUserId= $(this).attr('data-commentUserId');
        let commentPostId= $(this).attr('data-commentPostId');
        let likeMessage=$(this).parents('.commentDiv').children('.likeMessage');
        let likesCount=$(this).parents('.commentDiv').children('.countLikes');
        let count=+likesCount.text() + +1;
        let likeButton=$(this);
        $.post("../../ajax/commentAjax.php?function=likeComment", {commentId: commentId, commentUserId: commentUserId, commentPostId: commentPostId},function (response){
            let resp=JSON.parse(response);
            if (resp.success!==""){
                likeMessage.html(resp.success).show();
                likeButton.attr( "disabled", "disabled" );
                likesCount.html(count);
            }else{
                likeMessage.html(resp.error).show();
            }

        });
    });
/*function likeComment(){

    let commentId=$('#commentId').val();
     let commentUserId=$("#commentUserId").val();
     let commentPostId=$("#commentPostId").val();

     $.post("../../ajax/commentAjax.php?function=likeComment", {commentId: commentId, commentUserId: commentUserId, commentPostId: commentPostId},function (response){
         let resp=JSON.parse(response);
         if (resp.success!==""){
             $('p[name="likeMessage"]').html(resp.success).show();
         }else{
             $('p[name="likeMessage"]').html(resp.error).show();
         }

     });

}*/
