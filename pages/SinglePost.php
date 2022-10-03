<?php include_once("../partials/header.php");
      include_once ("../Repository/PostRepository.php");
      include_once ("../Repository/CategoryRepository.php");
      include_once ("../Repository/commentsRepository.php");
      include_once ("../Repository/UserRepository.php");
      include_once ("../Repository/LikeRepository.php");

      $repository=new PostRepository();
      $categoryRepository=new CategoryRepository();
      $commentsRepository= new commentsRepository();
      $userRepository=new UserRepository();
      $likeRepository=new LikeRepository();
      $data=$repository->findPostById($_GET['id']);
      $postCategory=$categoryRepository->findCategoryById($data['category_id']);
      $otherPosts=$repository->findPostsByCategoryId($data['category_id']);
      $comments=$commentsRepository->findCommentsByPostId($_GET['id']);
      $creator=$userRepository->findUserById($data['user_id']);


?>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="news-post-wrapper">
            <div class="news-post-wrapper-sm">
              <h1 class="text-center">
                <?=$data['title']?>
              </h1>
                <br><br><br><br><br>
                <h5 style="float: right; margin-top: -20px; margin-right: 10px">News created by : <?=$creator['username']?></h5>
                <p
                class="fs-15 d-flex justify-content-center align-items-center m-0"
              >
                  <?php if (isset($_SESSION['user'])){
                      if ($_SESSION['user']['role']=='admin'){?>
                          <input type="hidden" id="postId" value="<?=$data['id']?>">
                          <a href="updatePost.php?id=<?=$_GET['id']?>"style="margin-right: 10px; margin-left: 200px">Update post</a>| <a href="" style="margin-left: 10px" data-postId="<?=$data['id']?>" onclick="deletePost()">Delete Post</a>
                        <?php } }?>
                  <?php if (isset($_SESSION['user'])){
                      if ($_SESSION['user']['id']==$data['user_id'] && $_SESSION['user']['role']!='admin'){?>
                          <a href="updatePost.php?id=<?=$_GET['id']?>"style="margin-right: 10px;margin-left: 200px">Update post</a> | <a style="margin-left: 10px" >Delete Post</a>
                <?php      }
                  }?>
              </p>

            </div>

            <div class="news-post-wrapper-sm ">

                <br>
                <?php
                echo $data['content'];
                ?>

            </div>

            </div>
            <div class="news-post-wrapper-sm mt-5">

             <br>
             <br><br>
             <br><br>
             <br>
                <h2 style="margin-left: 420px" "> Comments for this post : </h2>

                <div id="newComment" style="margin-top: 30px">

                    <button style="width: 300px; background: #e7effd; border: none; border-radius: 5px; font-size: 15px; padding: 5px; margin-bottom: 10px; margin-left: 200px" onclick="addComment()">Add your comment </button>

                    <div id="commentMessage" style="display: none">
                    <p style="margin-left: 200px; font-size: 15px">You must be logged in!!!</p>
                        <a style="margin-left: 200px" href="login.php">You can log in here...</a>
                    </div>
                    <br>
                    <div id="commentSection" style="margin-left: 200px; display: none">
                    <h6><?=$_SESSION['user']['username']?></h6>
                        <input id="userId" type="text" value="<?=$_SESSION['user']['id']?>" hidden>
                        <input id="postId" type="text" value="<?=$_GET['id']?>" hidden>
                    <input style="width: 400px; height: 70px; " type="text" placeholder="Write your comment ..." name="commentContent" id="commentContent" value=""><br>
                    <button style="margin-left: 290px; border-radius: 5px; padding: 5px; border-style: none; margin-top: 5px;background: lightsalmon; margin-bottom: 20px" onclick="postComment()">Post your comment</button>
                    <h6 id="successMessage" style="margin-bottom: 20px; margin-top: -20px; display: none"></h6>
                    </div>
                    <hr>
                </div>
                <section style="background-color: #e7effd; width: 710px; margin-left: 200px; margin-bottom: 80px;">
                    <div class="container my-5 py-5 text-dark">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-11 col-lg-9 col-xl-7">
                                <?php foreach ($comments as $comment){?>
                                <?php $user=$userRepository->findUserById($comment['user_id']);?>
                                <?php if ($user['activity']==1){?>
                                <div class="d-flex flex-start mb-4">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                         src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="65"
                                         height="65" />
                                    <div class="card w-100">
                                        <div class="card-body p-4">
                                            <div>

                                                <h5><?=$user['username']?></h5>
                                                <p class="small">3 hours ago</p>
                                                <p>
                                                    <?=$comment['content'];?>
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div  class="commentDiv" ">
                                                        <button
                                                            <?php if (isset($_SESSION['user'])){
                                                                            if ($likeRepository->existLike($comment['commentId'],$_SESSION['user']['id'])){
                                                                                echo 'disabled';
                                                                            }
                                                            }?>
                                                                data-commentId="<?=$comment['commentId']?>"
                                                                data-commentUserId="<?=$comment['user_id']?>"
                                                                data-commentPostId="<?=$comment['post_id']?>"
                                                                style="background: green; margin-right: 5px; border: none; border-radius: 5px; padding: 4px;float: left"

                                                                class="likeButton">

                                                            <img src="../assets/images/icons/like.jpg" style="width: 15px">

                                                        </button>
                                                    <?php
                                                    if (isset($_SESSION['user']) && !$likeRepository->existLike($comment['commentId'],$_SESSION['user']['id'])){?>
                                                        <p  style=" color: green; margin-right: 5px;margin-top: 5px ; float: left; display: none" class="likeMessage">You liked this comment! </p>

                                                        <a style="color: black; margin-right: 5px; margin-top: 7px ;float: left" class="link-muted me-2"><i class="fas fa-thumbs-up me-1"></i>Likes :</a>
                                                        <a style="float: left; margin-left: 4px; margin-top: 7px" class="countLikes"><i ></i><?=$likeRepository->countLikes($comment['commentId'])?></a>
                                                    <?php }elseif (isset($_SESSION['user']) && $likeRepository->existLike($comment['commentId'],$_SESSION['user']['id'])){ ?>
                                                    <p  style=" color: green; margin-right: 5px;margin-top: 5px ; float: left" class="likeMessage">You liked this comment! </p>

                                                    <a style="color: black; margin-right: 5px; margin-top: 7px ;float: left" class="link-muted me-2"><i class="fas fa-thumbs-up me-1"></i>Likes :</a>
                                                    <a style="float: left; margin-left: 4px; margin-top: 7px" id="likesNumber"><i ></i><?=$likeRepository->countLikes($comment['commentId'])?></a>
                                                    <?php }else{ ?>
                                                        <p  style=" color: green; margin-right: 5px;margin-top: 5px ; float: left; display: none" class="likeMessage">You liked this comment! </p>

                                                        <a style="color: black; margin-right: 5px; margin-top: 7px ;float: left" class="link-muted me-2"><i class="fas fa-thumbs-up me-1"></i>Likes :</a>
                                                        <a style="float: left; margin-left: 4px; margin-top: 7px" id="likesNumber"><i ></i><?=$likeRepository->countLikes($comment['commentId'])?></a>
                                                    <?php } ?>
                                                    </div>

                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                            <?php } ?>
                                <hr>

                            </div>
                        </div>
                    </div>
                </section>
              <h1 style="margin-bottom: 50px" class="font-weight-600 text-center mb-5">
                You may also like
              </h1>
                <?php foreach ($otherPosts as $post){?>
                <a href="SinglePost.php?id=<?=$post['id']?>">
                <div class="border-top py-5">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="position-relative image-hover">
                      <img
                        src="../assets/images/<?=$postCategory['name']?>/<?=$post['image']?>"
                        alt="news"
                        class="img-fluid"
                      />
                        <a href="<?=$postCategory['name']?>.php"><span class="thumb-title"><?=$postCategory['name']?></span></a>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="position-relative image-hover">
                        <a style="color: black" href="SinglePost.php?id=<?=$post['id']?>">
                        <h2 class="font-weight-600">
                          <?=$post['title']?>
                      </h2>
                        </a>
                      <p class="fs-15"><?=$post['description']?></p>
                    </div>
                  </div>
                </div>
              </div>
                </a>
                <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- container-scroller ends -->
    <!-- partial:../partials/_footer.html -->
   <?php include_once("../partials/footer.php")?>

    <!-- partial -->
    <!-- inject:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/demo.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
<script src="../assets/js/comment.js"></script>
<script src="../assets/js/admin.js"></script>
