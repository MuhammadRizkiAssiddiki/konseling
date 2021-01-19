<!-- Top Bar Start -->
<div class="topbar">

  <!-- LOGO -->
  <div class="topbar-left">
    <a href="index.html" class="logo">
      <span>Konseling</span></a>
  </div>


  <nav class="navbar navbar-custom">
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <button class="button-menu-mobile open-left waves-light waves-effect">
          <i class="zmdi zmdi-menu"></i>
        </button>
      </li>
      <li class="nav-item hidden-mobile">
        <form role="search" class="app-search">
          <input type="text" placeholder="Search..." class="form-control">
          <a href=""><i class="fa fa-search"></i></a>
        </form>
      </li>
    </ul>

    <ul class="nav navbar-nav pull-right">


      <li class="nav-item dropdown notification-list">
        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
          <img src="<?php echo base_url('assets/'); ?>images/users/avatar-1.jpg" alt="user" class="img-circle">
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown " aria-labelledby="Preview">
          <!-- item-->
          <div class="dropdown-item noti-title">
            <h5 class="text-overflow"><small>Welcome ! John</small> </h5>
          </div>

          <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item notify-item">
            <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
          </a>
          <!-- item-->
          <a href="<?=
                      site_url('login/logout');
                    ?>" class="dropdown-item notify-item">
            <i class="zmdi zmdi-power"></i> <span>Logout</span>
          </a>

        </div>
      </li>

    </ul>

  </nav>

</div>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
  <div class="sidebar-inner slimscrollleft">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <ul>

        <li class="has_sub">
          <a href="<?php echo site_url('beranda'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == '') {
            echo "active";
          } ?>"><i class="zmdi zmdi-view-dashboard"></i><span> Beranda </span> </a>
        </li>

        <?php if ($level == 'administrator') { ?>
          <li class="has_sub">
            <a href="<?php echo site_url('admin'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'admin') {
              echo "active";
            } ?>"><i class="ion ion-log-in"></i><span> Data User </span> </a>
          </li>
          <li class="has_sub">
            <a href="<?php echo site_url('pasien'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'pasien') {
              echo "active";
            } ?>"><i class="zmdi zmdi-account"></i><span> Registrasi Pasien </span> </a>
          </li>

          <li class="has_sub">
            <a href="<?php echo site_url('orangtua'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'orangtua') {
              echo "active";
            } ?> "><i class="zmdi zmdi-male-female"></i><span> Data Orang Tua </span> </a>
          </li>

          <li class="has_sub">
            <a href="<?php echo site_url('konseling'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'konseling') {
              echo "active";
            } ?> "><i class="fa fa-tasks"></i><span> Konseling </span> </a>
          </li>
          <li class="has_sub">
            <a href="<?php echo site_url('memokoreksi'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'memokoreksi') {
              echo "active";
            } ?> "><span class="label label-pill label-warning pull-xs-right"><?= $total; ?></span><i class="fa fa-pencil"></i><span> Memo Koreksi </span> </a>
          </li>

          <li class="has_sub">
            <a href="<?php echo site_url('laporan'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'laporan') {
              echo "active";
            } ?>"><i class="zmdi zmdi-folder-person"></i> <span> Laporan </span></a>
          </li>


        <?php } else if ($level == 'psikolog') { ?>

          <li class="has_sub">
            <a href="<?php echo site_url('pasien'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'pasien') {
              echo "active";
            } ?>"><i class="zmdi zmdi-account"></i><span> Data Pasien </span> </a>
          </li>

          <li class="has_sub">
            <a href="<?php echo site_url('orangtua'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'orangtua') {
              echo "active";
            } ?> "><i class="zmdi zmdi-male-female"></i><span> Data Orang Tua </span> </a>
          </li>

          <li class="has_sub">
            <a href="<?php echo site_url('konseling'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'konseling') {
              echo "active";
            } ?> "><i class="fa fa-tasks"></i><span> Konseling </span> </a>
          </li>

          <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect <?php if ($this->uri->segment(1) == 'diagnosa' || $this->uri->segment(1) == 'hasildiagnosa') {
              echo "active";
            } ?>"><i class="fa fa-check-square-o"></i> <span> Diagnosa </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled">
              <li class="<?php if ($this->uri->segment(1) == 'diagnosa' && $this->uri->segment(2) != 'hasildiagnosa') {
                  echo "active";
              } ?>"><a href="<?php echo base_url('diagnosa'); ?>">Perlu Didiagnosa</a></li>
              <li class="<?php if ($this->uri->segment(2) == 'hasildiagnosa') {
                echo "active";
              } ?>"><a href="<?php echo base_url('diagnosa/hasildiagnosa'); ?>">Hasil Diagnosa</a></li>
            </ul>
          </li>
          <li class="has_sub">
            <a href="<?php echo site_url('laporan'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'laporan') {
              echo "active";
            } ?>"><i class="zmdi zmdi-folder-person"></i> <span> Laporan </span></a>
          </li>
        <?php  } else if ($level == 'pasien') { ?>
          <li class="has_sub">
            <a href="<?php echo site_url('profilpasien'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'profilpasien') {
              echo "active";
            } ?>"><i class="zmdi zmdi-account"></i><span> Profil Pasien </span> </a>
          </li>

          <li class="has_sub">
            <a href="<?php echo site_url('riwayatkonseling'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'riwayatkonseling') {
              echo "active";
            } ?> "><i class="fa fa-tasks"></i><span> Riwayat Konseling </span> </a>
          </li>

        <?php  } else if ($level == 'pengawas') { ?>
          <li class="has_sub">
            <a href="<?php echo site_url('monitoring'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'monitoring') {
                echo "active";
              } ?>"><i class="fa fa-list-alt"></i><span> Monitoring Admin </span> </a>
          </li>

          <li class="has_sub">
            <a href="<?php echo site_url('memokoreksi'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'memokoreksi') {
              echo "active";
            } ?> "><i class="fa fa-pencil"></i><span> Memo Koreksi </span> </a>
          </li>

          <li class="has_sub">
            <a href="<?php echo site_url('laporan'); ?>" class="waves-effect <?php if ($this->uri->segment(1) == 'laporan') {
              echo "active";
            } ?>"><i class="zmdi zmdi-folder-person"></i> <span> Laporan </span></a>
          </li>
        <?php   } ?>
      </ul>
      <div class="clearfix"></div>
    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>

  </div>

</div>
<!-- Left Sidebar End -->