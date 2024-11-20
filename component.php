<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Component</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="component.css">
    
</head>
<body>
    <div id="product-list">
        <?php
        function component($productname, $productprice, $productimg, $productid){
            $element = '
            <div class="product">
                <form action="index.php" method="post">
                    <div class="card">
                        <div class="card-image">
                            <a href="details.php?product_id=' . $productid . '">
                                <img src="' . $productimg . '" alt="Bàn Phím" class="img-fluid">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($productname) . '</h5>
                            <div class="rating">
                                <span>&#9733;</span>
                                <span>&#9733;</span>
                                <span>&#9733;</span>
                                <span>&#9733;</span>
                                <span>&#9733;</span>
                            </div>
                            <p class="card-text">Giá Tốt Nhất Thị Trường</p>
                            <h5><span class="price">' . number_format($productprice, 0, ",", ".") . ' VND</span></h5>
                            <button type="submit" id="btn-add-cart" class="btn" name="add">Thêm Vào Giỏ Hàng <span class="cart-icon">&#128722;</span></button>
                            <input type="hidden" name="product_id" value="' . $productid . '">
                        </div>
                    </div>
                </form>
            </div>
            ';
            echo $element;
        }

        function cartElement($productimg, $productname, $productprice, $productid, $quantity) {
            $total_price = $productprice * $quantity;
            $element = '
            <form action="cart.php" method="post" class="cart-items">
                <div class="cart-item">
                    <div class="cart-item-row">
                        <div class="cart-image">
                            <img src="' . $productimg . '" alt="Product Image" class="img-fluid">
                        </div>
                        <div class="cart-details">
                            <h5 class="cart-title">' . htmlspecialchars($productname) . '</h5>
                            <small class="text-secondary">Shop: BlessingKeyboard</small>
                            <h5 class="cart-price">Giá: ' . number_format($productprice, 0, ",", ".") . ' VND</h5>
                            <input type="hidden" name="product_id" value="' . $productid . '">
                            <button type="submit" class="remove-icon" name="action" value="remove">
                              <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        <div class="cart-quantity">
                            <button type="submit" class="quantity-btn" name="quantity_action" value="decrease">-</button>
                            <input type="text" name="quantity" value="' . $quantity . '" class="quantity-input">
                            <button type="submit" class="quantity-btn" name="quantity_action" value="increase">+</button>
                        </div>
                    </div>
                </div>
            </form>
            ';
            echo $element;
        }
     
        
        
        ?>
        
        
    </div>
    <div class="search-result">
        <?php
           function searchProductByName($productName, $db) {
            $sql = "SELECT * FROM " . $db->tablename . " WHERE product_name LIKE ?";
            $stmt = $db->con->prepare($sql);
            $searchTerm = "%" . $productName . "%";
            $stmt->bind_param("s", $searchTerm);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Gọi trực tiếp hàm component, kết quả sẽ được hiển thị với các thẻ <div> bên trong hàm component
        component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
    }
} else {
    echo "<p>Không tìm thấy sản phẩm nào.</p>";
}

$stmt->close();

            
        }
        ?>
        </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const maxLength = 20; // Giới hạn số ký tự

            const titles = document.querySelectorAll('.card-title');
            titles.forEach(title => {
                if (title.textContent.length > maxLength) {
                    title.setAttribute('data-full-title', title.textContent); // Lưu toàn bộ tiêu đề vào thuộc tính data
                    title.textContent = title.textContent.slice(0, maxLength) + '...';
                }
            });
        });
    </script>
</body>
</html>
