<?php 
//active-Side-link
?>
<aside id="sidebar">
  <div class="sidebar-title">

    <div class="sidebar-brand">
      <!--Logo--> Nails By Dion
    </div>

    <div class="close-icon" onclick="closeSidebar()">
      <i class="fa fa-x"></i>
    </div>

  </div>

  <ul class="sidebar-list">
    <!--<a href="overview.php" class = "<?php if ($page == 'overview'){echo "active-Side-link";}?>">
      <li class="sidebar-list-item">
        Overview
      </li>
    </a>-->

    <a href="appointment.php" class = "<?php if ($page == 'appointment'){echo "active-Side-link";}?>">
      <li class="sidebar-list-item">
          Appointments
      </li> 
    </a>

    <a href="admin_service.php" class = "<?php if ($page == 'admin_service'){echo "active-Side-link";}?>">
      <li class="sidebar-list-item">
          Services 
      </li>
    </a>

    <a href="inventory.php" class = "<?php if ($page == 'inventory'){echo "active-Side-link";}?>">
      <li class="sidebar-list-item">
          Inventory 
      </li>
    </a>
<!--
    <a href="customer.php class = "<?php if ($page == 'customer'){echo "active-Side-link";}?>">
      <li class="sidebar-list-item">
          Customers
      </li>
    </a>
-->
    <a href="team.php" class = "<?php if ($page == 'team'){echo "active-Side-link";}?>">
      <li class="sidebar-list-item">
          Team
      </li>
    </a>

    <!--<a href="sale.php" class = "<?php if ($page == 'sale'){echo "active-Side-link";}?>">
      <li class="sidebar-list-item">
          Sales 
      </li>
    </a>-->

    <a href="report.php" class = "<?php if ($page == 'report'){echo "active-Side-link";}?>">
      <li class="sidebar-list-item">
          Report
      </li>
    </a>

  </ul>
</aside>
