<?php 
include('../src/User/layouts/header.php');

$pages = isset($_GET['p']) ? $_GET['p'] : '';

if(isset($pages)) {
    switch ($pages) {
        case '1': //quan ao
            include('../src/User/views/clothes.php');
            break;
        case '2': //phu kien
            include('../src/User/views/accessory.php');
            break;
        case '3': //health & beauty
            include('../src/User/views/health.php');
            break;
        case '4': //elictronic
            include('../src/User/views/elictronic.php');
            break;
        case '5': //do gia dung
            include('../src/User/views/houseware.php');
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
