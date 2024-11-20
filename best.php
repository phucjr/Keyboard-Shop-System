<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Component</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="component.css">
    <style>
 .product {
    position: relative;
}

.card {
    position: relative;
}

.new-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 35px; /* Adjust size as needed */
    height: auto;
    padding-bottom:40px;
}


    </style>
</head>
<body>
    <div id="product-list">
        <?php
     
        function component($productname, $productprice, $productimg, $productid){
            $element = '
            <div class="product">
                <form action="index.php" method="post">
                    <div class="card">
                                                <img class="new-icon" src="upload/best.gif"/>

                        <div class="card-image">
 <a href="details.php?product_id=' . $productid . '">
                        <img src="' . $productimg . '" alt="Image1" class="img-fluid">
                    </a>                        </div>
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
