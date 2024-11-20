<?php
include_once 'config.php';

$idTin = $_GET['idTin'];
settype($idTin, "int");
$tin = layChiTietTin($idTin);
tangSoLanXem($idTin);
?>
<style>
/* Phông chữ và màu nền tổng thể */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

/* Container chính của tin chi tiết */
.tin-chi-tiet {
    
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Header của bài báo */
.tin-chi-tiet .header {
    border-bottom: 2px solid #e2e2e2;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.tin-chi-tiet .header h1 {
    font-size: 2.5em;
    margin: 0;
    color: #333;
}

.tin-chi-tiet .meta-info {
    font-size: 1em;
    color: #555;
    margin-top: 5px;
}

/* Hình ảnh của bài báo */
.image-container {
    position: relative;
    margin-bottom: 20px;
    overflow: hidden;
    border-radius: 8px;
}

.image-container img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.3s ease;
}

.image-container img:hover {
    transform: scale(1.05);
}

.image-container figcaption {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.6);
    color: #fff;
    text-align: center;
    padding: 10px;
    font-size: 0.9em;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.image-container:hover figcaption {
    opacity: 1;
}

/* Phần tóm tắt và nội dung */
.tom-tat {
    font-size: 1.2em;
    margin-bottom: 20px;
    color: #555;
}

.content {
    font-size: 1.1em;
    line-height: 1.6;
    color: #333;
}


</style>
<?php
 require_once("header.php");

?>
<div class="tin-chi-tiet">
    <div class="header">
        <h1><?php echo htmlspecialchars($tin['TieuDe']); ?></h1>
        <p class="meta-info"><strong>Ngày:</strong> <?php echo htmlspecialchars($tin['Ngay']); ?> | <strong>Số lần xem:</strong> <?php echo htmlspecialchars($tin['SoLanXem']); ?></p>
    </div>
    <?php if (!empty($tin['urlHinh'])): ?>
        <figure class="image-container">
            <img src="<?php echo htmlspecialchars($tin['urlHinh']); ?>" alt="<?php echo htmlspecialchars($tin['TieuDe']); ?>">
            <figcaption><?php echo htmlspecialchars($tin['TieuDe']); ?></figcaption>
        </figure>
    <?php endif; ?>
    <div class="tom-tat">
        <?php echo nl2br(htmlspecialchars($tin['TomTat'])); ?>
    </div>
    <div class="content">
        <?php echo nl2br(htmlspecialchars($tin['Content'])); ?>
    </div>
</div>
<?php
require_once("footer.php");
?> 
