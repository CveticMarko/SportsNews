<?php
    include_once("../partials/header.php");
    include_once ("../Repository/UserRepository.php");
    $repository=new UserRepository();
    $user=$repository->findUserById($_GET['id']);
?>
<section class="vh-100" style="background-color: white">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white"
                             style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                 alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                            <h6><?=$user['email']?></h6>
                          <!--  <p>Web Designer</p>  -->
                            <i class="far fa-edit mb-5"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>User information</h6>
                                <hr class="mt-0 mb-4">
                                <form>

                                    <?php if(isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){ ?>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h4>username</h4>
                                            <input type="text" name="username" id="username" value="<?=$user['username']?>">
                                            <input type="hidden" name="userId" id="userId" value="<?=$user['id']?>">
                                        </div>
                                    <div class="col-6 mb-3">
                                        <h4>Role</h4>
                                        <select name="role" id="role">
                                            <option <?php if ($user['role']=='admin'){ echo "selected";}?> value="admin">admin</option>
                                            <option <?php if ($user['role']=='user'){ echo "selected";}?> value="user">user</option>
                                            <option <?php if ($user['role']=='author'){ echo "selected";}?> value="author">author</option>
                                        </select>
                                    </div>
                                    <?php } ?>

                                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role']=='user'){ ?>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h4>username</h4>
                                                <input type="text" name="username" id="username" value="<?=$user['username']?>">
                                                <input type="hidden" name="userId" id="userId" value="<?=$user['id']?>">
                                            </div>
                                        <input name="role" id="role" type="hidden" value="user">
                                    <?php }?>
                                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role']=='author'){ ?>
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h4>username</h4>
                                                    <input type="text" name="username" id="username" value="<?=$user['username']?>">
                                                    <input type="hidden" name="userId" id="userId" value="<?=$user['id']?>">
                                                </div>
                                        <input name="role" id="role" type="hidden"  value="author">
                                    <?php }?>

                                </div>
                                <button type="button" class="btn btn-primary btn-sm" onclick="changeUserData()">Change data</button>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h4>Old password</h4>
                                        <input class="text-muted" type="password" name="oldPass" id="oldPass" placeholder="Enter old password">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h4>New password</h4>
                                        <input class="text-muted" name="newPass" type="password" id="newPass"  placeholder="Enter new password">
                                    </div>
                                </div>
                                <button style="margin-bottom: 22px" type="button" class="btn btn-primary btn-sm" onclick="changePassword()">Change password</button>
                                            <br>
                                            <?php if ($user['deleted']!=1){?>
                                            <h5 style="display: inline; margin-top: 14px;">Change activity:</h5>
                                            <?php if ($user['activity']==1){?>
                                            <button type="button" class="btn btn-success btn-sm activityButton" style="margin-left: 40px; margin-top: -5px; background: forestgreen" data-activity="1" data-id="<?=$user['id']?>">Active User</button>
                                            <?php }else{ ?>
                                            <button type="button" class="btn btn-danger btn-sm activityButton" style="margin-left: 40px; margin-top: -5px; background: red" data-activity="0" data-id="<?=$user['id']?>">Inactive User</button>
                                            <?php } ?>
                                            <?php }else{?>
                                                <h5 style="display: inline; margin-top: 14px; color: red">User is deleted!!!</h5>

                                            <?php } ?>
                                </form>

                                <div id="response" style=" display: none; text-align: center; margin-top: 30px; background-color: red; color: white; padding: 5px;opacity: 75%; border-radius: 5px"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once("../partials/footer.php")?>
<script src="../assets/js/login.js"></script>
