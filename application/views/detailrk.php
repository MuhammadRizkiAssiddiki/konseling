<?php $this->load->view('templates/header') ?>

  <body class="fixed-left">

      <!-- Begin page -->
      <div id="wrapper">
        <?php $this->load->view('templates/sidebar') ?>

          <!-- ============================================================== -->
          <!-- Start right Content here -->
          <!-- ============================================================== -->
          <div class="content-page">
              <!-- Start content -->
              <div class="content">
                  <div class="container">

                      <div class="row">
                         <div class="col-xs-12">
                                   <div class="page-title-box">
                                  <h4 class="page-title">Humanika Psychology Center </h4>
                                  <ol class="breadcrumb p-0">
                                      <li>
                                          <a href="<?php echo site_url(); ?>">Dashboard</a>
                                      </li>
                                      <li>
                                        <a href="<?php echo site_url('riwayatkonseling'); ?>">Riwayat Konseling</a>
                                      </li>
                                      <li class="active">
                                          Detail Riwayat Konseling
                                      </li>
                                  </ol>
                                  <div class="clearfix"></div>
                              </div>
                            </div>
                      </div>
                      <!-- end row -->
                      <div class="row">
                        <div class="col-xs-12">
                          <?php foreach ($rk as $a): ?>
                          <div class="card-box">
                            <div class="row">
                              <div class="col-lg-12">
                                <h4 class="header-title m-t-0">Detail Data Konseling</h4>
                                <div class="p-20">
                                  <table class="table table-striped table-bordered" style="width:68%;margin-left:15%;">
                                      <tr>
                                      <td width="50%">Nomor PMR</td>
                                      <td><b><?php echo $a->nopmr; ?></b></td>
                                      </tr>
                                      <tr>
                                      <td>Tanggal Konseling</td>
                                      <td><b><?php echo $a->tanggalpmr; ?></b></td>
                                      </tr>

                                      <tr>
                                      <td>Nama Pasien</td>
                                      <td><b><?php echo $a->namapasien; ?></b></td>
                                      </tr>
                                      <tr>
                                      <td>Keluhan</td>
                                      <td><b><?php echo $a->keluhan; ?></b></td>
                                      </tr>
                                      <tr>
                                      <td>Observasi</td>
                                      <td><b><?php echo $a->observasi; ?></b></td>
                                      </tr>
                                      <tr>
                                      <td>Diagnosa</td>
                                      <td><b><?php echo $a->diagnosa; ?></b></td>
                                      </tr>
                                      <tr>
                                      <td>Treatment</td>
                                      <td><b><?php echo $a->treatment; ?></b></td>
                                      </tr>

                                  </table>



                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="card-box">
                            <div class="row">
                              <div class="col-lg-12">
                                <h4 class="header-title m-t-0">Data Konseling Lainnya</h4>
                                <div class="p-20">
                                  <table class="table table-striped table-bordered" style="width:68%;margin-left:15%;">
                                      <tr>
                                      <td width="50%">Nomor PMR</td>
                                      <td><b><?php echo $a->nopmr; ?></b></td>
                                      </tr>
                                      <tr>
                                      <td>Tanggal Konseling</td>
                                      <td><b><?php echo $a->tanggalpmr; ?></b></td>
                                      </tr>
                                      <tr>
                                      <td>Keluhan</td>
                                      <td><b><?php echo $a->keluhan; ?></b></td>
                                      </tr>
                                      <tr>
                                      <td>Observasi</td>
                                      <td><b><?php echo $a->observasi; ?></b></td>
                                      </tr>
                                      <tr>
                                      <td>Diagnosa</td>
                                      <td><b><?php echo $a->diagnosa; ?></b></td>
                                      </tr>
                                      <tr>
                                      <td>Treatment</td>
                                      <td><b><?php echo $a->treatment; ?></b></td>
                                      </tr>

                                  </table>



                                </div>
                              </div>
                            </div>
                          </div>

                          <?php endforeach; ?>
                        </div>
                      </div>
                    </div> <!-- container -->

              </div> <!-- content -->



          </div>
          <!-- End content-page -->


          <!-- ============================================================== -->
          <!-- End Right content here -->
          <!-- ============================================================== -->

          <footer class="footer text-right">
              2019 © Rafiuddarojat.
          </footer>


      </div>
      <!-- END wrapper -->


  </body>



  <?php $this->load->view('templates/footer') ?>
</html>
