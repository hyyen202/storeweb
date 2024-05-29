<?php

include('../../../../include/init.php');

$act = $_GET['act'];
switch ($act) {
    case 'xacnhan':
        $result = array();
        $idBill = check_input($_POST['idBill'], $db);
        // Kiểm tra danh muc đã tồn tại chưa
        $check = $db->num_rows("SELECT * FROM `tbl_bill` WHERE status = 1 and id = $idBill");
        
        if ($check > 0) {
            $result['type'] = 'warning';
            $result['message'] = "<b>Thất bại!</b> Hóa đơn này đã duyệt !!";
        } else {
            $result['type'] = 'success';
            $result['message'] = "<b>Thành công!</b> Bạn đã bán đơn hàng thành công";
            $db->query("UPDATE `tbl_bill` SET status = 1 WHERE id = $idBill");
        }
        echo json_encode($result);
    break;
    case 'filter':
        $result = array();
        $filter = check_input($_POST['filterValue'], $db);
        if($filter==1){
            $str = "and tbl_bill.status = 1 ";
        }else if($filter==0){
            $str = "and tbl_bill.status = 0 ";
        }
        else{
            $str = "";
        }


        $sql = "SELECT tbl_customers.name as name, tbl_products.name as product, tbl_bill.qty as qty, 
        tbl_bill.price as price, total, tbl_bill.discount as discount, tbl_bill.id as id, tbl_bill.create_at as create_at, tbl_bill.status as status
        FROM tbl_customers, tbl_products, tbl_bill
        WHERE tbl_customers.id = tbl_bill.idCustomer and tbl_products.id = tbl_bill.idProduct ".$str."  
        ORDER BY tbl_bill.id desc ";
        $result = $db->fetch_assoc($sql, 0);
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(0);
        }
    break;
}
?>
