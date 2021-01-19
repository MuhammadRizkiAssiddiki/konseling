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
                                          <a href="<?php echo base_url(); ?>">Dashboard</a>
                                      </li>
                                      <li class="active">
                                          Profile Pasien
                                      </li>
                                  </ol>
                                  <div class="clearfix"></div>
                              </div>
            </div>
                      </div>
                      <!-- end row -->


                      <div class="row">
                        <div class="col-xs-12">
                          <div class="card-box">
                            <div class="row">
                              <div class="col-lg-12">
                                <h4 class="header-title m-t-0">Data Pasien</h4>
                                <div class="p-20">
                                  <table class="table table-striped">
                                    <?php foreach ($pasien as $a): ?>
                                      <tr>
                                        <td>ID Pasien</td>
                                        <td><b><?php echo $a->idpasien; ?> </b></td>
                                      </tr>
                                      <tr>
                                        <td>Nama Pasien</td>
                                        <td><b><?php echo $a->namapasien; ?> </b></td>
                                      </tr>
                                      <tr>
                                        <td>Nama Orang Tua</td>
                                        <td><b><?php echo $a->namaorangtua; ?> </b></td>
                                      </tr>
                                      <tr>
                                        <td>Tempat, Tanggal Lahir</td>
                                        <td><b><?php echo $a->tempatlahir.', '.$a->tanggallahir; ?> </b></td>
                                      </tr>
                                      <tr>
                                        <td>Umur</td>
                                        <td><b><?php echo $a->umur.' Tahun'; ?> </b></td>
                                      </tr>
                                      <tr>
                                        <td>Alamat</td>
                                        <td><b><?php echo $a->alamat; ?> </b></td>
                                      </tr>
                                      <tr>
                                        <td>No Telepon/Handphone</td>
                                        <td><b><?php echo $a->notelp; ?> </b></td>
                                      </tr>
                                      <tr>
                                        <td>Anak Ke</td>
                                        <td><b><?php echo $a->anakke; ?> </b></td>
                                      </tr>
                                      <tr>
                                        <td>Sekolah</td>
                                        <td><b><?php echo $a->sekolah; ?> </b></td>
                                      </tr>
                                    <?php endforeach; ?>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="card-box">
                            <div class="row">
                              <div class="col-lg-12">
                                <h4 class="header-title m-t-0">Data Orang Tua Pasien</h4>
                                <div class="p-20">
                                  <table class="table table-striped">
                                    <?php foreach ($pasien as $a): ?>
                                      <tr>
                                        <td>ID Orang Tua</td>
                                        <td><b><?php echo $a->idorangtua; ?> </b></td>
                                      </tr>
                                      <tr>
                                        <td>Nama Orang Tua</td>
                                        <td><b><?php echo $a->namaorangtua; ?> </b></td>
                                      </tr>
                                      <tr>
                                        <td>Umur</td>
                                        <td><b><?php echo $a->umurortu.' Tahun'; ?> </b></td>
                                      </tr>
                                      <tr>
                                        <td>Pendidikan Orang Tua</td>
                                        <td><b><?php echo $a->pendidikan; ?> </b></td>
                                      </tr>
                                      <tr>
                                        <td>Pekerjaan Orang Tua</td>
                                        <td><b><?php echo $a->pekerjaan; ?> </b></td>
                                      </tr>
                                      <tr>
                                        <td>Suku Bangsa Orang Tua</td>
                                        <td><b><?php echo $a->sukubangsa; ?> </b></td>
                                      </tr>
                                    <?php endforeach; ?>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>

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
              2019 © Uplon.
          </footer>


      </div>
      <!-- END wrapper -->


      <?php $this->load->view('templates/footer') ?>

  </body>
</html>
