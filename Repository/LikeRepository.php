<?php
include_once ("../Services/DatabaseConnection.php");

class LikeRepository extends DatabaseConnection
{

    public function existLike($commentId,$userId)
    {
        $conn = $this->getConnection();
        $stmt = $conn->query("SELECT * FROM likes where commentId={$commentId} and user_id={$userId}");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(empty($data[0])){
            return false;
        }else{
            return true;
        }
    }

    public function insertLike($commentId,$commentUserId,$commentPostId,$userId)
    {
        $conn = $this->getConnection();
        $conn->query("INSERT INTO likes (commentId,commentUserId,commentPostId,user_id) VALUES ('{$commentId}','{$commentUserId}',{$commentPostId},{$userId})");
    }
    public function countLikes($commentId){
        $conn = $this->getConnection();
        $stmt = $conn->query("SELECT * FROM likes where commentId={$commentId}");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return count($data);
    }
}