<?php include_once("../partials/adminHeader.php");
include_once("../Repository/CategoryRepository.php");
$categoryRepository=new CategoryRepository();
?>

<body class="main-bg">
<div class=" text-c animated flipInX">
    <div>
        <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>                                                                                               <br><br><br>
    </div>
                                                                                                                                                                                                        <br><br><br>
    <h3 class="text-whitesmoke">Add new post</h3>
                                                                                                                                                                                                <br><br><br>
    <div class="container-content">
        <form id="form" action="../ajax/postAjax.php" method="post"  enctype="multipart/form-data">
            <p style="color: white; float: left">Title</p>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Title"  name="title" required=""><br><br>
            </div>
            <p style="color: white; float: left">Description</p>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Description" name="description" required=""><br><br>
            </div>
            <p style="color: white; float: left">Select category</p>

            <select class="conference form-control" id="category" name="category"><br><br>
                <option value="0" disabled selected>Select Category</option>
                <?php
                $categories=$categoryRepository->allCategories();
                foreach ($categories as $key=>$value){?>
                <option value="<?=$value['id']?>"><?=$value['name']?></option>
                <?php } ?>
            </select><br>


            <textarea  id="content" name="content"></textarea><br>
                                                                                                                                                                                          <br><br><br><br><br><br><br>
            <input type="file" class="form-control"  id="file" name="file" style="padding-bottom: 25px">                                                                                                                 <br><br><br><br>

            <button type="submit" class="form-button button-l margin-b" id="submit" name="submit">Insert new post</button>

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