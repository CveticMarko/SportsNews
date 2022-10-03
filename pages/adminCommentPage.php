<?php
include_once("../partials/header.php");
include_once ("../Repository/commentsRepository.php");
include_once ("../Repository/UserRepository.php");
include_once ("../Repository/PostRepository.php");
$postRepository=new PostRepository();
$commentRepository=new commentsRepository();
$userRepository= new UserRepository();
$data=$commentRepository->unpublishedComments();
?>

<br>
<br>

<div>
    <label><h3 style="margin-left: 190px; margin-bottom: 50px; margin-right: 20px;margin-top: 50px; ">Find comment</h3></label><input id="search" type="text" placeholder="Search user by username or email..." style="width: 200px" >

</div>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css /> -->
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">

                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Content of comments</th>
                            <th>Post title</th>
                            <th>Post Comment</th>
                        </tr>
                        </thead>
                        <tbody >
                        <?php foreach ($data as $datas){
                            $user=$userRepository->findUserById($datas['user_id']);
                            $post=$postRepository->findPostById($datas['post_id']);
                            ?>

                            <tr class="buttonParent">
                                <td style="text-align: center"><?=$user['username']?></td>
                                <td><?=$datas['content']?></td>
                                <td><?=$post['title']?></td>
                                <td><button class="allowComment" data-commentId="<?=$datas['commentId']?>" style="background: forestgreen; color: white; border-radius: 10px">Allow a comment</button></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/admin.js"></script>