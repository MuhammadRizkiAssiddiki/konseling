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
                                      <a href="<?php echo site_url('pasien'); ?>">Pasien</a>
                                    </li>
                                    <li class="active">
                                        Detail Pasien
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
                                <h4 class="header-title m-t-0">Detail Data Pasien</h4>
                                <!--
                                <?php if ($level == 'pengawas'): ?>
                                    <button type="button" name="button" class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#koreksidata">Buat Memo Koreksi</button>                                       
                                <?php endif; ?>
                                -->
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
                        </div>
                      </div>
                    </div> <!-- container -->

              </div> <!-- content -->



          </div>
          <!-- End content-page -->


          <!-- ============================================================== -->
          <!-- End Right content here -->
          <!-- ============================================================== -->


          <!-- Modal Memo Koreksi -->
                    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="koreksidata">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                                    <h4 class="modal-title">Memo Koreksi Kinerja Administrator</h4>
                                </div>
                                <form class="form-horizontal" action="<?php echo base_url('monitoring/koreksi'); ?>" method="post" enctype="multipart/form-data" role="form">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-lg-3 col-sm-2 control-label">User</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="user" class="form-control" value="<?= $this->uri->segment('2'); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 col-sm-2 control-label">Perihal</label>
                                            <div class="col-lg-9">
                                                <input value="Data User" readonly type="text" name="perihal" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 col-sm-2 control-label">Catatan</label>
                                            <div class="col-lg-9">
                                                <textarea name="catatan" id="" cols="66" class="form-control" rows="4" placeholder="Masukkan Catatan"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

          <footer class="footer text-right">
              2019 © Uplon.
          </footer>


      </div>
      <!-- END wrapper -->


      <?php $this->load->view('templates/footer') ?>

  </body>
</html>
