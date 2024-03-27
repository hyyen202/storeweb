<?php
require_once('../include/init.php');

$SITE_NAME = SITE_NAME;
// Kiểm tra xem biến $_GET['url'] có tồn tại không
if(isset($_GET['url'])) {
    // Gán giá trị của biến $_GET['url'] cho biến $url
    $url = $_GET['url'];

    // Sử dụng switch case để xử lý các trường hợp khác nhau của $url
    switch ($url) {
        case 'admin':
            // Nếu $url là 'admin', include trang admin/index.php
            include('../src/Admin/views/index.php');
            break;
        
        case 'pages':
            // Nếu $url là 'pages', include trang user/index.php
            include('../src/User/views/index.php');
            break;
        default:
            // Nếu không trùng với bất kỳ trường hợp nào, hiển thị thông báo lỗi
            echo "Không tìm thấy trang";
            break;
    }
} else {
    include('../src/Admin/views/login.php');
}
?>
