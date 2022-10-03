<?php
include_once("../partials/header.php");
include_once("../Repository/UserRepository.php");
include_once ("../Repository/commentsRepository.php");
    $commentRepository=new commentsRepository();
    $repository=new UserRepository();
    $data=$repository->allUsers();

?>
<br>
<br>
<a href="newPost.php"><h3 style="margin-left: 190px; margin-bottom: 50px   ">New Post</h3></a>
<br>
<h3 style="margin-left: 190px; margin-bottom: 50px; width: 300px;display: inline; margin-right: 10px"><a href="adminCommentPage.php">Unpublished comments</a></h3><h5 style="background: red; border-radius: 15px; height: 50px; width: 50px; padding: 4px; text-align: center; display: inline; margin-bottom: 50px"><?=$commentRepository->unpublishedCommentsCount();?></h5>
<br>


<label for=""><h3 style="margin-left: 190px;margin-top: 50px; margin-right: 20px">Add category :</h3></label>
<label><input type="text" id="newCategory" placeholder="Category name" style="margin-right: 20px;"></label>
<button onclick="insertCategory();">Insert category</button><br>
<h6 style="margin-left: 190px;display: none" class="message-admin"></h6>
<div>
    <label><h3 style="margin-left: 190px; margin-bottom: 50px; margin-right: 20px;margin-top: 50px; ">Find user</h3></label><input id="search" type="text" placeholder="Search user by username or email..." style="width: 200px" >
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
                            <th>Action</th>
                            <th>id</th>
                            <th>Username</th>
                            <th>email</th>
                            <th>Activity</th>
                        </tr>
                        </thead>
                        <tbody class="tbody">
                        <?php foreach ($data as $datas){?>
                        <tr class="tr">
                            <td class="td">
                                <ul class="action-list">

                                    <li title="Edit user's account"><a href="UserProfile.php?id=<?=$datas['id']?>" class="btn btn-primary"><i class="fa fa-pencil-alt">Edit</i></a></li>
                                   <?php if ($datas['deleted']==0){?>
                                    <li style="width: 50px" class="deleteUser" data-id="<?=$datas['id']?>" title="deleteUser"><a  class="btn btn-danger"><i class="fa fa-times">X</i></a></li>
                                    <?php } ?>
                                </ul>
                            </td>
                            <td><?=$datas['id']?></td>
                            <td><?=$datas['username']?></td>
                            <td><?=$datas['email']?></td>
                            <?php if ($datas['deleted']==1){
                                echo "<td id='activity' style='color: red'>Deleted</td>";
                            }elseif ($datas['deleted']==0 && $datas['activity']==1){
                                echo "<td id='activity' style='color: green'>Activ</td>";
                            }elseif ($datas['deleted']==0 && $datas['activity']==0){
                                echo "<td  id='activity' data-userId='{$datas['id']}' style='color: red'>Inactiv</td>";
                            }?>
                            <?php } ?>
                        </tr>
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