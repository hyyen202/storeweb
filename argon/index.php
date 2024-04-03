<?php
require_once('../include/init.php');

$SITE_NAME = SITE_NAME;
if(isset( $_GET['url'])){

    $url = $_GET['url'];
}
// Kiểm tra xem biến $_GET['url'] có tồn tại không
if(isset($url)) {


    // Sử dụng switch case để xử lý các trường hợp khác nhau của $url
    switch ($url) {
        case 'logout':
            include('../src/Admin/views/authenticate/logout.php');
            break;

        default:
            echo "Không tìm thấy trang";
            break;
    }
}else{
    include('../src/User/views/index.php');
}
?>
