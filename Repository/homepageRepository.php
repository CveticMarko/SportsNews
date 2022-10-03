<?php
include_once("Services/DatabaseConnection.php");
class homepageRepository extends DatabaseConnection
{
    public function first7categories(){
        $conn=$this->getConnectionHomepage();
        $stmt=$conn->query("SELECT * FROM category ORDER BY id LIMIT 7");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function otherCategories(){
        $conn=$this->getConnectionHomepage();
        $stmt=$conn->query("SELECT * FROM category LIMIT 50 offset 7");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function findCategoryById($id){
        $conn=$this->getConnectionHomepage();
        $stmt=$conn->query("SELECT * FROM category where id='$id'");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data[0];
    }
    public function findUserById($id){
        $conn=$this->getConnectionHomepage();
        $stmt=$conn->query("SELECT * FROM user where id='$id'");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data[0];
    }
    public function last4posts(){
        $conn=$this->getConnectionHomepage();
        $stmt = $conn->query("SELECT * FROM post where deleted=0 ORDER BY id DESC LIMIT 4");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function last6pBasketballPosts(){
        $conn=$this->getConnectionHomepage();
        $stmt = $conn->query("SELECT * FROM post where category_id=3 and deleted=0 ORDER BY id DESC LIMIT 6 offset 0");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function last4TennisPosts(){
        $conn=$this->getConnectionHomepage();
        $stmt = $conn->query("SELECT * FROM post where category_id=2 and deleted=0 ORDER BY id DESC LIMIT 4 offset 0");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function last3NflPosts(){
        $conn=$this->getConnectionHomepage();
        $stmt = $conn->query("SELECT * FROM post where category_id=7 and deleted=0 ORDER BY id DESC LIMIT 3 offset 0");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function lastHockeyPost(){
        $conn=$this->getConnectionHomepage();
        $stmt = $conn->query("SELECT * FROM post where category_id=4 and deleted=0 ORDER BY id DESC LIMIT 1 offset 0");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data[0];
    }
    public function last4HockeyPosts(){
        $conn=$this->getConnectionHomepage();
        $stmt = $conn->query("SELECT * FROM post where category_id=4 and deleted=0 ORDER BY id DESC LIMIT 4 offset 1");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function last3BoxingPosts(){
        $conn=$this->getConnectionHomepage();
        $stmt = $conn->query("SELECT * FROM post where category_id=6 and deleted=0 ORDER BY id DESC LIMIT 3 offset 0");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function last3to6BoxingPosts(){
        $conn=$this->getConnectionHomepage();
        $stmt = $conn->query("SELECT * FROM post where category_id=6 and deleted=0 ORDER BY id DESC LIMIT 3 offset 3");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function last2ValleyballPosts(){
        $conn=$this->getConnectionHomepage();
        $stmt = $conn->query("SELECT * FROM post where category_id=5 and deleted=0 ORDER BY id DESC LIMIT 2 offset 0");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
//$ git clone https://github.com/zamalo1/SportsNews
}