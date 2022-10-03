<?php
include_once ("../Repository/commentsRepository.php");
include_once("../Repository/LikeRepository.php");
$repository=new commentsRepository();
$likeRepository=new LikeRepository();
session_start();

$message['success']="";
$message['error']="";

$function=$_GET['function'];
if ($function =='addComment') {
    if (isset($_SESSION['user'])) {
        $message['success'] = 'exist user';
    }
}

if ($function =='postComment'){
    if (isset($_POST['userId']) && isset($_POST['postId']) && isset($_POST['content'])) {
        $content=$_POST['content'];
        $userId=$_POST['userId'];
        $postId=$_POST['postId'];

        if ($content!==""){
            $repository->insertComment($content,$userId,$postId);
            $message['success'] = 'Successfully added comment';
        }else{
            $message['error']='You have not written your comment!';
        }
    }else{
        $message['error']='Something is wrong';
    }
}


if ($function=='likeComment'){
    if (isset($_POST['commentId']) && isset($_POST['commentUserId']) && isset($_POST['commentPostId'])) {
        $commentId=$_POST['commentId'];
        $commentUserId=$_POST['commentUserId'];
        $commentPostId=$_POST['commentPostId'];
        if (isset($_SESSION['user'])){
            $userId=$_SESSION['user']['id'];
            if (!$likeRepository->existLike($commentId,$userId)){
                $likeRepository->insertLike($commentId,$commentUserId,$commentPostId,$userId);
                $message['success']="You liked this comment";
            }else{
                $message['error']="You have already liked this comment";
            }
        }else{
            $message['error']="You must be logged in";
        }
    }else{
        $message['error']='Something is wrong';
    }
}
if ($function=='allowComment'){
    if (isset($_POST['commentId'])){
        $commentId=$_POST['commentId'];
        $repository->allowComment($commentId);
        $message['success']='Successfully added comment';
    }else{
        $message['error']='Something is wrong';
    }
}
echo JSON_encode($message, 256);



