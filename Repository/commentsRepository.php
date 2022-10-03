<?php
include_once ("../Services/DatabaseConnection.php");

class commentsRepository extends DatabaseConnection
{
    public function insertComment($content,$userId,$postId)
    {
        $conn = $this->getConnection();
        $conn->query("INSERT INTO comments (content,user_id,post_id,published) VALUES ('{$content}',{$userId},{$postId},0)");
    }
    public function findCommentsByPostId($id){
        $conn = $this->getConnection();
        $stmt = $conn->query("SELECT * FROM comments where post_id={$id} and published=1 ORDER BY commentId DESC ");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function unpublishedCommentsCount(){
        $conn = $this->getConnection();
        $stmt = $conn->query("SELECT * FROM comments where published=0");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return count($data);
    }
    public function unpublishedComments(){
        $conn = $this->getConnection();
        $stmt = $conn->query("SELECT * FROM comments where published=0");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function allowComment($commentId){
        $conn = $this->getConnection();
        $conn->query("UPDATE comments set published=1 where commentId={$commentId}");
    }
}