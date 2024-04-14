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
            case 'update_p':
                include('../src/Admin/views/product/update.php');
                break;
            case 'add_p':
                include('../src/Admin/views/product/add.php');
                break;
           
            //customers
              case 'customers': 
                  include('../src/Admin/views/customers/index.php');
                  break;
              case 'profile': 
                include('../src/Admin/views/customers/profile.php');
                  break;
              default:
                  include('../src/Admin/views/home.php');
                  break;
          }
      } 
     require('../src/Admin/layouts/footer.php') 
    ?>