<?php
require_once('../include/init.php');

$SITE_NAME = SITE_NAME;

// Kiểm tra xem biến $_GET['url'] có tồn tại không
if(isset($_SESSION['user'])) {
    if(isset( $_GET['url'])){

        $url = $_GET['url'];
    
        // Sử dụng switch case để xử lý các trường hợp khác nhau của $url
        switch ($url) {
            case 'logout':
                include('../src/Admin/views/authenticate/logout.php');
                break;
            case 'register':
                include('../src/User/views/authenticate/register.php');
                break;
            default:
                echo "Không tìm thấy trang";
                break;
        }
    }
    else{
        include('../src/Admin/views/index.php');
    }
}
else {
    include('../src/Admin/views/authenticate/login.php');
}
?>
