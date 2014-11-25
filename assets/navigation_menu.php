       <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php require("navigation_menu/nav_header.html"); ?>
       
<!-- Construct dropdown menus on top right of page -->
            <ul class="nav navbar-top-links navbar-right">
              <?php //No need for now require("navigation_menu/nav_dropdown_messages.php"); ?>
              <?php require("navigation_menu/nav_dropdown_tasks.php"); ?>
              <?php require("navigation_menu/nav_dropdown_alerts.php"); ?>  
              <?php require("navigation_menu/nav_dropdown_user.html"); ?>
            </ul>

<!-- Dropdown messages complete -->

<!-- Construct left hand side menus -->
        <?php require("navigation_menu/sidebar_menu.html"); ?>
<!-- Done -->

        </nav>



