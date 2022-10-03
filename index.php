<?php include_once("partials/headerHomepage.php");
      include_once("Repository/homepageRepository.php");
      $repository=new homepageRepository();
      $last4Posts=$repository->last4posts();
      $last6BasketballPosts=$repository->last6pBasketballPosts();
      $last4TennisPosts=$repository->last4TennisPosts();
      $last4NFLPosts=$repository->last3NflPosts();
      $lstHockeyPost=$repository->lastHockeyPost();
      $last4HockeyPost=$repository->last4HockeyPosts();
      $last3BoxingPosts=$repository->last3BoxingPosts();
      $last3to6BoxingPosts=$repository->last3to6BoxingPosts();
      $last4ValleyballPosts=$repository->last2ValleyballPosts();
?>
        <div class="container">

          <div class="banner-top-thumb-wrap">
            <div class="d-lg-flex justify-content-between align-items-center">
                <?php foreach ($last4NFLPosts as $data){?>
                <a style="color: black" href="pages/SinglePost.php?id=<?=$data['id']?>">
                <div class="d-flex justify-content-between  mb-3 mb-lg-0">
                        <div>
                      <img
                        src="assets/images/NFL/<?=$data['image']?>"
                        alt="thumb"
                        class="banner-top-thumb"
                      />
                    </div>
                    <h6 class="m-0 font-weight-bold">
                        <?=$data['title']?>
                    </h6>
                  </div>
                    <?php } ?>
                </div>
                </a>
          </div>

          <div class="row">
            <div class="col-lg-8">
              <div class="owl-carousel owl-theme" id="main-banner-carousel">
                  <?php foreach ($last4Posts as $data){
                      $category=$repository->findCategoryById($data['category_id']);
                      $imageFolderName=$category['name'];
                      ?>
                  <a href="pages/SinglePost.php?id=<?=$data['id']?>">
               <div class="item">
                   <div class="carousel-content-wrapper mb-2">
                    <div class="carousel-content">
                      <h2 class="font-weight-bold">
                        <?=$data['title']?>
                      </h2>
                      <h5 class="font-weight-normal  m-0">
                          <?=$data['description']?>
                      </h5>
                      <p class="text-color m-0 pt-2 d-flex align-items-center">
                        <span class="fs-10 mr-1">2 hours ago</span>
                        <i class="mdi mdi-bookmark-outline mr-3"></i>
                        <span class="fs-10 mr-1">126</span>
                        <i class="mdi mdi-comment-outline"></i>
                      </p>
                    </div>
                    <div class="carousel-image">
                      <img src="assets/images/<?=$imageFolderName?>/<?=$data['image']?>" alt="" height="346px" />
                    </div>
                  </div>
                </div>
                </a>
                  <?php } ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="row">
                <div class="col-sm-6">
                  <div class="py-3 border-bottom">
                    <div class="d-flex align-items-center pb-2">
                      <img
                        src="assets/images/dashboard/Profile_1.jpg"
                        class="img-xs img-rounded mr-2"
                        alt="thumb"
                      />
                      <span class="fs-12 text-muted"><?php $user=$repository->findUserById($last6BasketballPosts[0]['user_id']); echo $user['username'];?></span>
                    </div>
                      <a style="color: black" href="pages/SinglePost.php?id=<?=$last6BasketballPosts[0]['id']?>">
                    <p class="fs-14 m-0 font-weight-medium line-height-sm">
                        <?=$last6BasketballPosts[0]['title']?>
                    </p>
                      </a>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="py-3 border-bottom">
                    <div class="d-flex align-items-center pb-2">
                      <img
                        src="assets/images/dashboard/Profile_2.jpg"
                        class="img-xs img-rounded mr-2"
                        alt="thumb"
                      />
                      <span class="fs-12 text-muted"><?php $user=$repository->findUserById($last6BasketballPosts[1]['user_id']); echo $user['username'];?></span>
                    </div>
                      <a style="color: black" href="pages/SinglePost.php?id=<?=$last6BasketballPosts[1]['id']?>">
                      <p class="fs-14 m-0 font-weight-medium line-height-sm">
                        <?=$last6BasketballPosts[1]['title']?>
                    </p>
                      </a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="pt-4 pb-4 border-bottom">
                    <div class="d-flex align-items-center pb-2">
                      <img
                        src="assets/images/dashboard/Profile_2.jpg"
                        class="img-xs img-rounded mr-2"
                        alt="thumb"
                      />
                      <span class="fs-12 text-muted"><?php $user=$repository->findUserById($last6BasketballPosts[2]['user_id']); echo $user['username'];?></span>
                    </div>
                      <a style="color: black" href="pages/SinglePost.php?id=<?=$last6BasketballPosts[2]['id']?>">
                    <p class="fs-14 m-0 font-weight-medium line-height-sm">
                        <?=$last6BasketballPosts[2]['title']?>
                    </p>
                      </a>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="pt-3 pb-4 border-bottom">
                    <div class="d-flex align-items-center pb-2">
                      <img
                        src="assets/images/dashboard/Profile_4.jpg"
                        class="img-xs img-rounded mr-2"
                        alt="thumb"
                      />
                      <span class="fs-12 text-muted"><?php $user=$repository->findUserById($last6BasketballPosts[3]['user_id']); echo $user['username'];?></span>
                    </div>
                      <a style="color: black" href="pages/SinglePost.php?id=<?=$last6BasketballPosts[3]['id']?>">
                    <p class="fs-14 m-0 font-weight-medium line-height-sm">
                        <?=$last6BasketballPosts[3]['title']?>
                    </p>
                      </a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="pt-4 pb-4">
                    <div class="d-flex align-items-center pb-2">
                      <img
                        src="assets/images/dashboard/Profile_5.jpg"
                        class="img-xs img-rounded mr-2"
                        alt="thumb"
                      />
                      <span class="fs-12 text-muted"><?php $user=$repository->findUserById($last6BasketballPosts[4]['user_id']); echo $user['username'];?></span>
                    </div>
                      <a style="color: black" href="pages/SinglePost.php?id=<?=$last6BasketballPosts[4]['id']?>">
                    <p class="fs-14 m-0 font-weight-medium line-height-sm">
                        <?=$last6BasketballPosts[4]['title']?>
                    </p>
                      </a>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="pt-3 pb-4">
                    <div class="d-flex align-items-center pb-2">
                      <img
                        src="assets/images/dashboard/Profile_6.jpg"
                        class="img-xs img-rounded mr-2"
                        alt="thumb"
                      />
                      <span class="fs-12 text-muted"><?php $user=$repository->findUserById($last6BasketballPosts[5]['user_id']); echo $user['username'];?></span>
                    </div>
                      <a style="color: black" href="pages/SinglePost.php?id=<?=$last6BasketballPosts[5]['id']?>">
                    <p class="fs-14 m-0 font-weight-medium line-height-sm">
                        <?=$last6BasketballPosts[5]['title']?>
                    </p>
                      </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="world-news">
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex position-relative  float-left">
                  <h3 class="section-title">Last Tennis news</h3>
                </div>
              </div>
            </div>
            <div class="row">
                <?php foreach ($last4TennisPosts as $data){?>
              <div class="col-lg-3 col-sm-6 grid-margin mb-5 mb-sm-2">
                <div class="position-relative image-hover">
                  <img
                    src="assets/images/Tennis/<?=$data['image']?>"
                    class="img-fluid"
                    alt="world-news"
                  />
                    <a href="pages/newsBySport.php?sportId=<?=$data['category_id']?>"><span class="thumb-title">TENNIS</span></a>
                </div>
                <h5 class="font-weight-bold mt-3">
                    <?=$data['title']?>
                </h5>
                <p class="fs-15 font-weight-normal">
                    <?=$data['description']?>
                </p>
                <a style="color: black" href="pages/SinglePost.php?id=<?=$data['id']?>" class="font-weight-bold text-dark pt-2"
                  >Read article</a
                >
              </div>

                <?php } ?>
            </div>
          </div>
          <div class="editors-news">
            <div class="row">
              <div class="col-lg-3">
                <div class="d-flex position-relative float-left">
                  <h3 class="section-title">Last Hockey News</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6  mb-5 mb-sm-2">
                <div class="position-relative image-hover">
                    <a style="color: black" href="pages/SinglePost.php?id=<?=$lstHockeyPost['id']?>">

                    <img
                    src="assets/images/Hockey/<?=$lstHockeyPost['image']?>"
                    class="img-fluid"
                    alt="world-news"
                  />
                  <span class="thumb-title">HOCKEY</span>
                </div>
                <h1 class="font-weight-600 mt-3">
                    <?=$lstHockeyPost['title']?>
                </h1>
                <p class="fs-15 font-weight-normal">
                  <?=$lstHockeyPost['description']?>
                </p>
                </a>
              </div>


              <div class="col-lg-6  mb-5 mb-sm-2">
                <div class="row">
                    <?php foreach ($last4HockeyPost as $data){?>
                    <div class="col-sm-6  mb-5 mb-sm-2">
                        <a style="color: black" href="pages/SinglePost.php?id=<?=$data['id']?>">

                        <div class="position-relative image-hover">
                      <img
                        src="assets/images/Hockey/<?=$data['image']?>"
                        class="img-fluid"
                        alt="world-news"
                      />
                            <a href="pages/Hockey.php"><span class="thumb-title">HOCKEY</span></a>
                    </div>
                    <h5 class="font-weight-600 mt-3">
                        <?=$data['title']?>
                    </h5>
                    <p class="fs-15 font-weight-normal">
                        <?=$data['description']?>
                    </p></a>
                    </div>
                    <?php } ?>
                </div>

              </div>
            </div>
          </div>
          <div class="popular-news">
            <div class="row">
              <div class="col-lg-3">
                <div class="d-flex position-relative float-left">
                  <h3 class="section-title">Last Boxing news</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-9">
                <div class="row">
                    <?php foreach ($last3BoxingPosts as $data){?>
                    <div class="col-sm-4  mb-5 mb-sm-2">
                        <a style="color: black" href="pages/SinglePost.php?id=<?=$data['id']?>">

                        <div class="position-relative image-hover">
                      <img
                        src="assets/images/Boxing/<?=$data['image']?>"
                        class="img-fluid"
                        alt="world-news"
                      />
                      <a href="pages/Boxing.php"><span class="thumb-title">BOXING</span></a>
                    </div>
                    <h5 class="font-weight-600 mt-3">
                        <?=$data['title']?>
                    </h5>
                    </a>
                  </div>

                    <?php } ?>

                </div>

                <div class="row mt-3">
                    <?php foreach ($last3to6BoxingPosts as $data){?>
                  <div class="col-sm-4 mb-5 mb-sm-2">
                    <div class="position-relative image-hover">
                      <img
                        src="assets/images/Boxing/<?=$data['image']?>"
                        class="img-fluid"
                        alt="world-news"
                      />
                      <span class="thumb-title">BOXING</span>
                    </div>
                    <h5 class="font-weight-600 mt-3">
                        <?=$data['title']?>
                    </h5>
                  </div>
                    <?php } ?>
                </div>


              </div>
              <div class="col-lg-3">
                <div class="position-relative mb-3">
                  <img
                    src="assets/images/Valleyball/valleyball.jpg"
                    class="img-fluid"
                    alt="world-news"
                  />

                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="d-flex position-relative float-left">
                      <h3 class="section-title">Latest valleyball News</h3>
                    </div>
                  </div>
                    <?php foreach ($last4ValleyballPosts as $data){?>
                  <div class="col-sm-12">
                    <div class="border-bottom pb-3">
                        <a style="color: black" href="pages/SinglePost.php?id=<?=$data['id']?>">
                        <h5 class="font-weight-600 mt-0 mb-0">
                          <?=$data['title'];?>
                      </h5>
                      </a>
                      <p class="text-color m-0 d-flex align-items-center">
                        <span class="fs-10 mr-1">126</span>
                        <i class="mdi mdi-comment-outline"></i>
                      </p>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->
<?php include_once("partials/footer.php")?>

        <!-- partial -->
      </div>
    </div>
    <!-- inject:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="./assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="./assets/js/demo.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
