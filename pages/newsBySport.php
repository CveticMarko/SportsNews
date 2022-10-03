<?php include_once("../partials/header.php");
include_once("../Repository/PostRepository.php");
include_once('../Repository/CategoryRepository.php');

$repository=new PostRepository();
$categoryRepository=new CategoryRepository();
$lastPost=$repository->lastPostByCategoryId($_GET['sportId']);
$category=$categoryRepository->findCategoryById($_GET['sportId']);
$last1to5Posts=$repository->last1to5PostsByCategoryId($_GET['sportId']);
$otherPosts=$repository->otherPostsByCategoryId($_GET['sportId']);
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <h1 class="text-center mt-5">
                    <?=$category['name']?>
                </h1>
                <p class="text-secondary fs-15">
                    Follow the most important news from the world of <?=$category['name']?>
                </p>
            </div>
            <h5 class="text-muted font-weight-medium mb-3"><?=$category['name']?> News</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6  mb-5 mb-sm-2">
            <a style="color: black" href="SinglePost.php?id=<?=$lastPost['id']?>">
            <div class="position-relative image-hover">
                <img
                        src="../assets/images/<?=$category['name']?>/<?=$lastPost['image']?>"
                        class="img-fluid"
                        alt="world-news"
                />
            </div>
            <h1 class="font-weight-600 mt-3">
                <?=$lastPost['title']?>
            </h1>
            <p class="fs-15 font-weight-normal">
                <?=$lastPost['description']?>
            </p>
        </a>
        </div>

        <div class="col-lg-6  mb-5 mb-sm-2">
            <div class="row">


            </div>
            <div class="row mt-3">
                <?php foreach ( $last1to5Posts as $data){?>
                    <div class="col-sm-6  mb-5 mb-sm-2">
                        <a style="color: black" href="SinglePost.php?id=<?=$data['id']?>">
                        <div class="position-relative image-hover">
                            <img
                                    src="../assets/images/<?=$category['name']?>/<?=$data['image']?>"
                                    class="img-fluid"
                                    alt="world-news"
                            />
                        </div>
                        <h5 class="font-weight-600 mt-3">
                            <?=$data['title']?>
                        </h5>
                        <p class="fs-15 font-weight-normal">
                            <?=$data['description']?>
                        </p>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mt-5">
        <div class="col-sm-12">
            <h5 class="text-muted font-weight-medium mb-3">Other <?=$category['name']?> News</h5>
        </div>
    </div>
    <div class="row mb-4">

        <?php foreach ($otherPosts as $data){?>

            <div class="col-sm-3  mb-5 mb-sm-2">
                <div class="position-relative image-hover">
                    <img
                            src="../assets/images/<?=$category['name']?>/<?=$data['image']?>"
                            class="img-fluid"
                            alt="world-news"
                    />
                </div>
                <h5 class="font-weight-600 mt-3">
                    <?=$data['title']?>
                </h5>

            </div>

        <?php } ?>
        <hr>
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
<!-- plugin js for this page -->
<script src="../assets/vendors/aos/dist/aos.js/aos.js"></script>
<script src="../assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="../assets/js/demo.js"></script>
<!-- End custom js for this page-->
</body>
</html>
