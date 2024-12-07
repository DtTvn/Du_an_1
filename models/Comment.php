<?php
class Comment extends BaseModel
{
    // hiển thị
    public function listCommentInProduct($ProductID)
    {
        $sql = "SELECT c.*, u.FullName FROM comments c JOIN users u  
         ON u.id=c.UserID WHERE ProductID=:ProductID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ProductID' => $ProductID]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listProductHasComments()
    {
        $sql = "SELECT p.id, ProductName, count(c.id) 'count' FROM products p 
        JOIN comments c ON p.id=c.ProductID GROUP BY p.id, ProductName ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data){
        $sql = "INSERT INTO comments(UserID, ProductID, Content) 
        VALUES(:UserID, :ProductID, :Content)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    public function updateActive($id,$active){
        $sql = "UPDATE comments SET active=:active WHERE id=:id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id, 'active'=>$active]);
    }
    // hiển thị bình luận ở client
    public function listCommentInProductClient($ProductID)
    {
        $sql = "SELECT c.*, u.FullName FROM comments c JOIN users u  
         ON u.id=c.UserID WHERE ProductID=:ProductID AND c.active=1 ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ProductID' => $ProductID]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
