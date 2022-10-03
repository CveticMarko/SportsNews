
<?php include_once("../partials/adminHeader.php");
include_once("../Repository/CategoryRepository.php");
include_once ("../Repository/PostRepository.php");
$categoryRepository=new CategoryRepository();
$postRepository=new PostRepository();
$thisPost=$postRepository->findPostById($_GET['id']);
?>

<body class="main-bg">
<div class=" text-c animated flipInX">
    <div>
        <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>                                                                                               <br><br><br>
    </div>
                                                                                                                                                                                                        <br><br><br>
    <h3 class="text-whitesmoke">Update post</h3>
                                                                                                                                                                                                <br><br><br>
    <div class="container-content">
        <form id="form" method="post"  enctype="multipart/form-data">
            <p style="color: white; float: left">Title</p>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Title" value="<?=$thisPost['title']?>"  name="title" required=""><br><br>
            </div>
            <p style="color: white; float: left">Description</p>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Description" value="<?=$thisPost['description']?>" name="description" required="">
                <br><br>
            </div>
            <p style="color: white; float: left">Select category</p>

            <select class="conference form-control" id="category"  name="category"><br><br>
                <option value="0" disabled selected>Select Category</option>
                <?php
                $categories=$categoryRepository->allCategories();
                foreach ($categories as $value){?>
                <option value="<?=$value['id']?>"><?=$value['name']?></option>
                <?php } ?>
            </select><br>
            <input type="text" id="postId" value="<?=$_GET['id']?>" hidden>

            <textarea  id="content" name="content"><?=$thisPost['content']?></textarea><br>
                                                                                                                                                                                          <br><br><br><br><br><br><br>
            <br><br><br><br>

            <button class="form-button button-l" onclick="updatePost()">Update post</button>

        </form>
        <br><br><br><br><br>
        <p class="margin-t text-whitesmoke"><small>  Cvetic Marko &copy; 2022</small> </p>
    </div>

    <br><br><br><br><br>
￼
</div>

</body>
<script src="../assets/js/post.js">



</script>