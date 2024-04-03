<?php require('../src/Admin/layouts/header.php');
      require('../src/Admin/layouts/sidebar.php');
      require('../src/Admin/layouts/navbar.php');

      $pages = isset($_GET['p']) ? $_GET['p'] : '';

      if(isset($pages)) {
          switch ($pages) {
            case 'product':
                include('../src/Admin/views/product/index.php');
                break;
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