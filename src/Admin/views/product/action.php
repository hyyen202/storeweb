<?php

include('../../../../include/init.php');

$act = $_GET['act'];
switch ($act) {
    case 'add':
        $result = array();
        $type = check_input($_POST['type_choose'], $db);
        $category = check_input($_POST['category_choose'], $db);
        $name = check_input($_POST['product'], $db);
        $qty = check_input($_POST['qty'], $db);
        $price = check_input($_POST['price'], $db);
        $discount = check_input($_POST['discount'], $db);
        $detail = check_input($_POST['detail'], $db);
    
        // Kiểm tra xem có file ảnh được chọn không
        if (isset($_FILES['img']) && !empty($_FILES['img']['name'][0])) { // Kiểm tra xem có file được chọn không
            $uploaded_images = $_FILES['img'];
            $image_names = array();
    
            // Thư mục lưu trữ hình ảnh
            $target_dir = "../../../../assets/img/product/";
    
            // Duyệt qua từng hình ảnh đã upload
            foreach ($uploaded_images['tmp_name'] as $key => $tmp_name) {
                $image_name = $uploaded_images['name'][$key];
                $target_file = $target_dir . basename($image_name);
    
                if (move_uploaded_file($tmp_name, $target_file)) {
                    // Hình ảnh đã được upload thành công, thêm tên vào mảng
                    $image_names[] = $image_name;
                } else {
                    // Xử lý lỗi nếu có
                    $result['type'] = error;
                    $result['message'] = "Upload tệp thất bại";
                    echo json_encode($result);
                    exit(); // Kết thúc xử lý nếu có lỗi
                }
            }
    
            // Chuyển mảng tên hình ảnh thành chuỗi
            $image_names_str = implode(',', $image_names);
            $time = CUR_DATE;
            // Lưu vào cơ sở dữ liệu
            $check = $db->num_rows("SELECT * FROM `tbl_products` WHERE name = '$name'");
            
            
            if ($check > 0) {
                $result['type'] = warning;
                $result['message'] = "<b>Thất bại!</b> sản phẩm này đã tồn tại !!";
            } else if(!$name||!$qty|| !$price||!$detail ) {
                $result['type'] = error;
                $result['message'] = "<b>Thất bại!</b> Vui lòng điền đầy đủ thông tin !!";
            }
            else{
                $result['type'] = success;
                $result['message'] = "<b>Thêm thành công!</b> Bạn đã thêm sản phẩm thành công";
                $db->query("INSERT INTO `tbl_products`(`name`, `price`, `qty`, `create_at`,  `detail`, `discount`, `category`, `img`, `type`, `status`) 
                            VALUES ('$name', $price, $qty, '$time',  '$detail', $discount, $category, '$image_names_str', $type, 1)");
            }
        } else {
            // Không có tệp tin được chọn hoặc có lỗi khi upload
            $result['type'] = error;
            $result['message'] = "Vui lòng chọn ít nhất một tệp tin hình ảnh";
        }
    
        echo json_encode($result);
        break;
        case 'update_p':
            $result = array();
            
            // Thu thập dữ liệu mới từ form
            $id = check_input($_POST['sp'], $db);
            $new_type = check_input($_POST['type_choose'], $db);
            $new_category = check_input($_POST['category_choose'], $db);
            $new_name = check_input($_POST['product'], $db);
            $new_qty = check_input($_POST['qty'], $db);
            $new_price = check_input($_POST['price'], $db);
            $new_discount = check_input($_POST['discount'], $db);
            $new_detail = check_input($_POST['detail'], $db);
            $new_status = check_input($_POST['status'], $db);
            $time = CUR_DATE;
            
            // Lấy dữ liệu cũ từ cơ sở dữ liệu
            $old_data = $db->fetch_assoc("SELECT * FROM `tbl_products` WHERE id = '$id'",1);
            $old_type = $old_data['type'];
            $old_category = $old_data['category'];
            $old_name = $old_data['name'];
            $old_qty = $old_data['qty'];
            $old_price = $old_data['price'];
            $old_discount = $old_data['discount'];
            $old_detail = $old_data['detail'];
            $old_status = $old_data['status'];
            
            // So sánh dữ liệu mới và dữ liệu cũ
            if ($new_type == $old_type &&
                $new_category == $old_category &&
                $new_name == $old_name &&
                $new_qty == $old_qty &&
                $new_price == $old_price &&
                $new_discount == $old_discount &&
                $new_detail == $old_detail && 
                $new_status == $old_status
            ) {
                // Không có sự thay đổi, trả về thông báo lỗi
                $result['type'] = error;
                $result['message'] = "<b>Thất bại!</b> Không có thay đổi nào được thực hiện.";
            } else {

                $db->query("UPDATE `tbl_products` SET `name`='$new_type',`price`='$new_price',`qty`='$new_qty',
                            `update_at`='$time',`detail`='$new_detail',`discount`=$new_discount,`category`=$new_category,
                            `type`='$new_type',`status`=$new_status WHERE id = $id");
                $result['type'] = 'success';
                $result['message'] = "<b>Cập nhật thành công!</b> Bạn đã cập nhật sản phẩm thành công";
            }
            
        echo json_encode($result);
    break;        
    
    case 'add_category':
        $result = array();
        $category = check_input($_POST['category'], $db);
        // Kiểm tra danh muc đã tồn tại chưa
        $check = $db->num_rows("SELECT * FROM `tbl_category` WHERE name = '$category'");
        
        if (!$category) {
            $result['type'] = error;
            $result['message'] = "<b>Thất bại!</b> Vui lòng điền đầy đủ thông tin!!";
        } elseif ($check > 0) {
            $result['type'] = warning;
            $result['message'] = "<b>Thất bại!</b> Danh mục này đã tồn tại !!";
        } else {
            $result['type'] = success;
            $result['message'] = "<b>Thành công!</b> Bạn đã thêm danh mục thành công";
            $db->query("INSERT INTO `tbl_category`( `name`, `status`) 
                        VALUES ('$category', 1)");
        }
        echo json_encode($result);
    break;
    case 'add_type':
        $result = array();
        $type      = check_input($_POST['type'], $db);
        // Kiểm tra loại sản phẩm đã tồn tại chưa
        $check = $db->num_rows("SELECT * FROM `tbl_type` WHERE name = '$type'");
        
        if (!$type) {
            $result['type'] = error;
            $result['message'] = "<b>Thất bại!</b> Vui lòng điền đầy đủ thông tin!!";
        } elseif ($check > 0) {
            $result['type'] = warning;
            $result['message'] = "<b>Thất bại!</b> Loại sản phẩm này đã tồn tại !!";
        } else {
            $result['type'] = success;
            $result['message'] = "<b>Thành công!</b> Bạn đã thêm loại sản phẩm thành công";
            $db->query("INSERT INTO `tbl_type`( `name`, `status`) 
                        VALUES ('$type', 1)");
        }
        echo json_encode($result);
    break;
}
?>