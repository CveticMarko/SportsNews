CKEDITOR.replace( 'content' );

    $("#submit").click(function(e) {
        e.preventDefault();
        var fdata = new FormData()
        let content=CKEDITOR.instances['content'].getData();
        fdata.append("title", $('input[name="title"]').val());
        fdata.append("category", $("#category").val());
        fdata.append("content", content);
        fdata.append('description', $('input[name="description"]').val());

        if ($("input#file")[0].files.length > 0)
            fdata.append("file", $("input#file")[0].files[0])
        //d = $("#add_new_product").serialize();
        $.ajax({
            type: 'POST',
            url: '../../ajax/postAjax.php?function=newPost',
            data: fdata,
            contentType: false,
            processData: false,
            success: function(response) {
                let odgovor=JSON.parse(response);
                if(odgovor.error!=""){
                    alert(odgovor.error);
                    return false;
                }else {
                    alert(odgovor.success);
                }

            }
        })
    });

function updatePost() {
    let title = $('input[name="title"]').val();
    let description = $('input[name="description"]').val();
    let categoryId = $("#category").val();
    let postId=$('#postId').val();
    let content = CKEDITOR.instances['content'].getData();
    $.post("../../ajax/postAjax.php?function=updatePost", {title: title,description: description,categoryId: categoryId,content: content,postId: postId}, function (response) {
        let resp = JSON.parse(response);
        if (resp.error!="") {
            alert(resp.error)
        }else{
            alert(resp.success);
        }
    });
}
