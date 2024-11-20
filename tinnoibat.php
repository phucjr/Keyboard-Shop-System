<?php require_once "config.php";

try {
    $sql = "SELECT idTin, TieuDe, SoLanXem, urlHinh FROM tin WHERE NoiBat=1 ORDER BY Ngay DESC LIMIT 0,5";
    $kq = $conn->query($sql);
} catch (Exception $e) {
    die("Lỗi thực thi sql: " . $e->getMessage());
}
?>
<style>
 :root {
    --primary-color: #2c3e50;
    --secondary-color: #7f8c8d;
    --accent-color: #e74c3c;
    --background-color: #ecf0f1;
    --border-color: #bdc3c7;
    --shadow-color: rgba(0, 0, 0, 0.15);
    --hover-shadow-color: rgba(0, 0, 0, 0.25);
    --radius: 10px;
    --transition-speed: 0.3s;
}

*,
*::before,
*::after {
    box-sizing: border-box;
}

.data {
    border: 1px solid #ccc;
    padding: 20px;
    max-width: 600px;
    margin: 20px auto;
    font-family: Arial, sans-serif;
    background-color:white;
    
}
.item {
    display: block;
    margin-bottom: 20px;
    text-decoration: none;
    color: #333;
}
.item-content {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.item-content:hover {
    background-color: yellow;
    border-color: #007bff; /* Màu khung khi hover */
    color: #007bff; /* Màu chữ khi hover */
}
.item-image {
    width: 100px;
    height: 100px;
    margin-right: 20px;
    object-fit: cover;

    border-radius: 5px;
}

.item-text {
    font-size: 18px;
    color: #333;
}

.item-text span {
    font-size: 14px;
    color: #999;
}







</style>
<div id="txn" class="data">
    <?php if ($kq): ?>
        <?php foreach ($kq as $tin): ?>
            <a href="tinchitiet.php?idTin=<?php echo $tin['idTin'] ?>" class="item">
                <div class="item-content">
                    <!-- Sử dụng URL động cho hình ảnh -->
                    <img src="<?php echo htmlspecialchars($tin['urlHinh']); ?>" alt="<?php echo htmlspecialchars($tin['TieuDe']); ?>" class="item-image">
                    <p class="item-text"><?php echo htmlspecialchars($tin['TieuDe']); ?> <span>(<?php echo $tin['SoLanXem']; ?> lượt xem)</span></p>
                </div>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No data found.</p>
    <?php endif; ?>
</div>



