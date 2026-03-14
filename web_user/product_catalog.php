<?php
require_once '../model_user/connectdb_user.php';
$pdo = connectdb();

// Build filter conditions
$where = [];
$params = [];

// Category filter
$catalog_id = $_GET['id'] ?? '';
if ($catalog_id && is_numeric($catalog_id)) {
    $where[] = "catalog_id = ?";
    $params[] = $catalog_id;
}

// Gender filter
$gender = $_GET['gender'] ?? '';
if ($gender !== '' && in_array($gender, ['Men', 'Women', 'Unisex'])) {
    $where[] = "gender = ?";
    $params[] = $gender;
}

// Price range filter
$price_range = $_GET['price_range'] ?? '';
if ($price_range !== '') {
    if ($price_range == '1200+') {
        $where[] = "product_prices >= ?";
        $params[] = 1200000;
    } elseif (preg_match('/^\d+-\d+$/', $price_range)) {
        list($min, $max) = explode('-', $price_range);
        $where[] = "product_prices BETWEEN ? AND ?";
        $params[] = $min * 1000;
        $params[] = $max * 1000;
    }
}

// Build SQL
$sql = "SELECT * FROM tbl_product";
if ($where) {
    $sql .= " WHERE " . implode(' AND ', $where);
}
$sql .= " ORDER BY id_product DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$catalog_product = $stmt->fetchAll();
?>

<main class="main-wrapper">
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <h1 class="title-kid">Explore Products</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img style="height: 50px; width: 50px;" src="../assets_kimono/imgs/1.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->
    <!-- Start Shop Area  -->
    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="axil-shop-top">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="category-select">
                                    <!-- Filter Form -->
                                    <form method="get" action="">
                                        <input type="hidden" name="act" value="product_catalog_user">
                                        <?php if ($catalog_id) { echo '<input type="hidden" name="id" value="'.htmlspecialchars($catalog_id).'">'; } ?>
                                        <select name="gender" class="single-select" onchange="this.form.submit()">
                                            <option value="">All Genders</option>
                                            <option value="Men" <?= ($gender == 'Men') ? 'selected' : '' ?>>Men</option>
                                            <option value="Women" <?= ($gender == 'Women') ? 'selected' : '' ?>>Women</option>
                                            <option value="Unisex" <?= ($gender == 'Unisex') ? 'selected' : '' ?>>Unisex</option>
                                        </select>
                                        <select name="price_range" class="single-select" onchange="this.form.submit()">
                                            <option value="">All Prices</option>
                                            <option value="400-600" <?= ($price_range == '400-600') ? 'selected' : '' ?>>400-600</option>
                                            <option value="600-800" <?= ($price_range == '600-800') ? 'selected' : '' ?>>600-800</option>
                                            <option value="800-1000" <?= ($price_range == '800-1000') ? 'selected' : '' ?>>800-1000</option>
                                            <option value="1000-1200" <?= ($price_range == '1000-1200') ? 'selected' : '' ?>>1000-1200</option>
                                            <option value="1200+" <?= ($price_range == '1200+') ? 'selected' : '' ?>>1200+</option>
                                        </select>
                                    </form>
                                    <!-- End Filter Form -->
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">
                                    <!-- Start Single Select  -->
                                    <select class="single-select" onchange="location = this.value;">
                                        <option value="?sort=latest">Sort by Latest</option>
                                        <option value="?sort=name">Sort by Name</option>
                                        <option value="?sort=price">Sort by Price</option>
                                    </select>
                                    <!-- End Single Select  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row--15">
                <?php
                foreach($catalog_product as $pd)
                {
                        echo '
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="axil-product product-style-one has-color-pick mt--40">
                                <div class="thumbnail">
                                    <a href="fashionApp.php?act=detail_product&id='.$pd['id_product'].'">
                                        <img class="conform-img" src="../uploads/'.$pd['product_img'].'" alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="fashionApp.php?act=detail_product&id='.$pd['id_product'].'"><i class="far fa-heart"></i></a></li>
                                            <li class="select-option"><a  href="fashionApp.php?act=detail_product&id='.$pd['id_product'].'">Buy product</a></li>
                                            <li class="quickview"><a href="fashionApp.php?act=detail_product&id='.$pd['id_product'].'"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="fashionApp.php?act=detail_product&id='.$pd['id_product'].'">'.$pd['product_name'].'</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">'.number_format($pd['product_prices']).'MAD</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
                ?>
                <!-- End Single Product  -->
            </div>
        </div>
    </div>
</main>