<?php require('../src/Admin/layouts/header.php');
      require('../src/Admin/layouts/sidebar.php');
      require('../src/Admin/layouts/navbar.php');

      $pages = isset($_GET['p']) ? $_GET['p'] : '';

      if(isset($pages)) {
          switch ($pages) {
            //product
            case 'product':
                include('../src/Admin/views/product/index.php');
                break;
            case 'category':
                include('../src/Admin/views/product/category.php');
                break;
            case 'update_p':
                include('../src/Admin/views/product/update.php');
                break;
            case 'add_p':
                include('../src/Admin/views/product/add.php');
                break;
            case 'orders':
                include('../src/Admin/views/product/orders.php');
                break;
            case 'order':
                include('../src/Admin/views/orders_management/detail.php');
                break;
            case 'update_category':
                include('../src/Admin/views/product/update_category.php');
                break;
            case 'update_type':
                include('../src/Admin/views/product/update_type.php');
                break;
            case 'bought':
                include('../src/Admin/views/product/bought.php');
                break;
           
            //customers
              case 'customers': 
                  include('../src/Admin/views/customers/index.php');
                  break;
              case 'historic_orders': 
                  include('../src/Admin/views/customers/historic_orders.php');
                  break;
              case 'profile': 
                include('../src/Admin/views/customers/profile.php');
                  break;
            //customers
              case 'orders_management': 
                  include('../src/Admin/views/orders_management/index.php');
                  break;
              default:
                  include('../src/Admin/views/home.php');
                  break;
          }
      } 
     require('../src/Admin/layouts/footer.php') 
    ?>