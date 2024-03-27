<?php 
include('../src/User/layouts/header.php');

$pages = isset($_GET['p']) ? $_GET['p'] : '';

if(isset($pages)) {
    switch ($pages) {
        case '1':
            include('../src/User/views/new_product.php');
            break;
        default:
            include('../src/User/views/home.php');
            break;
    }
} else {
    include('../src/User/views/home.php');
}

include('../src/User/layouts/footer.php');
?>
