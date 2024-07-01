<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
    <div class="sidebar-brand-icon " >
        <img src="<?= base_url('assets/img/yameiport.jpg'); ?>" style="border-radius:90px" width="50px" alt="">
    </div>
    <div class="sidebar-brand-text mx-3">Risun <sup>Report</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard
<li class="nav-item <?php if($page=='dashboard'){echo 'active';}; ?>">
    <a class="nav-link" href="<?= base_url('dashboard'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li> -->



<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Master
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?php if($page=='kategori'){echo 'active';}; ?>">
        <a class="nav-link"  href="<?= base_url('kategori'); ?>">
        <i class="fa-solid fa fa-paperclip"></i>
        <span>Manajer Produk</span></a>
</li>

<li class="nav-item <?php if($page=='garfield'){echo 'active';}; ?>">
        <a class="nav-link"  href="<?= base_url('garfield'); ?>">
        <i class="fas fa-fw fa fa-chart-area"></i>
        <span>Produk</span></a>
</li>
    

<li class="nav-item <?php if($page=='users'){echo 'active';}; ?>">
    <a class="nav-link"  href="<?= base_url('users'); ?>">
        <i class="fas fa-fw fa-users"></i>
        <span>Users</span></a>
</li>

 
<!-- Nav Item - Utilities Collapse Menu -->

   
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Lainnya
</div>

<!-- Nav Item - Pages Collapse Menu -->

 
<!-- Nav Item - Charts -->


<!-- Nav Item - Tables -->
<li class="nav-item <?php if($page=='login'){echo 'active';}; ?>">
        <a class="nav-link"  href="<?= base_url('login'); ?>">
        <i class="fas fa-fw fa fa-chart-area"></i>
        <span>Logout</span></a>
</li> 

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->


</ul>