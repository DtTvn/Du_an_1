<?php
class Product extends BaseModel
{
    // Get all products with their category names
    // Lấy tất cả sản phẩm kèm tên danh mục
    public function all()
    {
        $sql = "SELECT p.*, c.CategoryName FROM `products` p JOIN categories c ON p.CategoryID = c.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh sách sản phẩm trong một danh mục
    public function listProductInCategory($id)
    {
        $sql = "SELECT p.*, c.CategoryName 
                    FROM `products` p 
                    JOIN categories c ON p.CategoryID = c.id 
                    WHERE c.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Các phương thức khác không cần thay đổi liên quan đến `CategoryID


    // Add a new product
    public function create($data)
    {
        $sql = "INSERT INTO `products`(`ProductName`, `CategoryID`, `Price`, 
                `Description`, `Material`, `Color`, `Dimensions`, `Image`) 
                VALUES (:ProductName, :CategoryID, :Price, :Description, 
                :Material, :Color, :Dimensions, :Image)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    // Update an existing product
    public function update($id, $data)
    {
        $sql = "UPDATE `products` SET 
                `ProductName` = :ProductName, 
                `CategoryID` = :CategoryID, 
                `Price` = :Price, 
                `Description` = :Description, 
                `Material` = :Material, 
                `Color` = :Color, 
                `Dimensions` = :Dimensions, 
                `Image` = :Image 
                WHERE `id` = :id";
        $stmt = $this->conn->prepare($sql);
        // Add `id` to the data array
        $data['id'] = $id;
        $stmt->execute($data);
    }

    // Delete a product
    public function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE `id` = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    // Find a product by its ID
    public function find($id)
    {
        $sql = "SELECT p.*, c.CategoryName 
                FROM `products` p 
                JOIN `Categories` c ON p.CategoryID  = c.id 
                WHERE p.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //lấy sản phẩm ko phải table(type=1)
    public function listOtherProduct()
    {
        $sql = "SELECT p.*, c.CategoryName FROM products p JOIN categories c ON p.CategoryID=c.id ORDER BY c.id DESC LIMIT 8";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //tìm kiếm sản phẩm
    public function filterByNameAndPrice($keyword = '', $minPrice = 0, $maxPrice = PHP_INT_MAX)
    {
        $sql = "SELECT * FROM products 
            WHERE ProductName LIKE :keyword 
            AND Price BETWEEN :minPrice AND :maxPrice";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'keyword' => '%' . $keyword . '%',
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    
}
// $productModel = new Product();
// $tables = $productModel->listOtherProduct(); // Lấy danh sách sản phẩm mới
// $product = $productModel->find($_GET['id']); // Lấy chi tiết sản phẩm theo ID

// include_once ROOT_DIR . "views/client/products/detail.php";