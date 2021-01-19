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
                    <a href="<?php echo site_url('diagnosa'); ?>">Diagnosa</a>
                  </li>
                  <li class="active">
                    Pemberian Diagnosa
                  </li>
                </ol>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <!-- end row -->
          <div class="row">
            <div class="col-xs-12">
              <?php foreach ($diagnosa as $a) : ?>
                <div class="card-box">
                  <div class="row">
                    <div class="col-lg-12">
                      <h4 class="header-title m-t-0">Data Pasien</h4>
                      <div class="p-20">
                        <table class="table table-striped table-bordered" style="width:68%;margin-left:15%;">
                          <tr>
                            <td width="50%">ID Pasien</td>
                            <td><b><?php echo $a->idpasien; ?></b></td>
                          </tr>
                          <tr>
                            <td>Nama Pasien</td>
                            <td><b><?php echo $a->namapasien; ?></b></td>
                          </tr>
                          <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td><b><?php echo $a->tempatlahir . ' - ' . $a->tanggallahir; ?></b></td>
                          </tr>
                          <tr>
                            <td>Usia</td>
                            <td><b><?php echo $a->umur; ?></b></td>
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td><b><?php echo $a->alamat; ?></b></td>
                          </tr>
                          <tr>
                            <td>No Telpon</td>
                            <td><b><?php echo $a->notelp; ?></b></td>
                          </tr>
                          <tr>
                            <td>Anak Ke</td>
                            <td><b><?php echo $a->anakke; ?></b></td>
                          </tr>
                          <tr>
                            <td>Sekolah</td>
                            <td><b><?php echo $a->sekolah; ?></b></td>
                          </tr>
                        </table>

                        <table class="table table-bordered">
                          <thead>
                            <th colspan="6" style="text-align: center">Riwayat Konseling/Keluhan</th>
                          </thead>
                          <?php if ($riwayat == NULL) : ?>
                            <td style="text-align: center">Belum Memiliki Riwayat Konseling/Keluhan</td>
                          <?php else : ?>
                            <thead>
                              <th style="text-align: center">No PMR</th>
                              <th style="text-align: center">Tanggal Konseling</th>
                              <th style="text-align: center">Keluhan</th>
                              <th style="text-align: center">Observasi</th>
                              <th style="text-align: center">Diagnosa</th>
                              <th style="text-align: center">Treatment</th>
                            </thead>
                            <tbody>
                              <?php foreach ($riwayat as $b) : ?>
                                <tr>
                                  <td style="text-align: center"><?php echo $b->nopmr; ?></td>
                                  <td style="text-align: center"><?php echo $b->tanggalpmr; ?></td>
                                  <td style="text-align: center;width: 250px;"><?php echo $b->keluhan; ?></td>
                                  <td style="text-align: center;width: 250px;"><?php echo $b->observasi; ?></td>
                                  <td style="text-align: center;width: 250px;"><?php echo $b->diagnosa; ?></td>
                                  <td style="text-align: center;width: 250px;"><?php echo $b->treatment; ?></td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          <?php endif; ?>
                        </table>

                      </div>
                    </div>
                  </div>
                </div>

                <form enctype="multipart/form-data" role="form" action="<?php echo site_url('diagnosa/tambahdiagnosa'); ?>" method="post">
                  <div class="card-box">
                    <div class="row">
                      <div class="col-lg-12">
                        <h4 class="header-title m-t-0">Data Konseling</h4>
                        <div class="p-20">
                          <div class="form-group row" style="text-align: right">
                            <label for="Kode Pesanan" class="col-sm-4 form-control-label">No PMR <span class="text-danger">*</span></label>
                            <div class="col-sm-5">
                              <input type="text" name="nopmr" parsley-trigger="change" value="<?php echo $a->nopmr; ?>" readonly class="form-control" id="userName">
                            </div>
                          </div>
                          <div class="form-group row" style="text-align: right">
                            <label for="Kode Pesanan" class="col-sm-4 form-control-label">Tanggal Konseling<span class="text-danger">*</span></label>
                            <div class="col-sm-5">
                              <div class="input-group">
                                <input type="text" name="tanggalpmr" parsley-trigger="change" value="<?php echo $a->tanggalpmr; ?>" readonly class="form-control" id="datepicker-autoclose">
                                <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row" style="text-align: right">
                            <label for="Keluhan" class="col-sm-4 form-control-label">Keluhan <span class="text-danger">*</span></label>
                            <div class="col-sm-5">
                              <textarea name="keluhan" rows="3" cols="46"><?php echo $a->keluhan; ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>

                <div class="card-box">
                  <div class="row">
                    <div class="col-lg-12">
                      <h4 class="header-title m-t-0">Input Data Diagnosa</h4>
                      <div class="p-20">
                        <div class="form-group row" style="text-align: right">
                          <label for="Kode Pesanan" class="col-sm-4 form-control-label">ID Diagnosa<span class="text-danger">*</span></label>
                          <div class="col-sm-5">
                            <input type="text" name="iddiagnosa" parsley-trigger="change" required placeholder="Masukkan ID Diagnosa" class="form-control" id="userName">
                          </div>
                        </div>
                        <div class="form-group row" style="text-align: right">
                          <label for="Keluhan" class="col-sm-4 form-control-label">Observasi <span class="text-danger">*</span></label>
                          <div class="col-sm-5">
                            <textarea name="observasi" rows="3" cols="46" required placeholder="Masukkan Hasil Observasi"></textarea>
                          </div>
                        </div>
                        <div class="form-group row" style="text-align: right">
                          <label for="Keluhan" class="col-sm-4 form-control-label">Assesment <span class="text-danger">*</span></label>
                          <div class="col-sm-5">
                            <textarea name="assesment" rows="3" cols="46" required placeholder="Masukkan Hasil Assesment"></textarea>
                          </div>
                        </div>
                        <div class="form-group row" style="text-align: right">
                          <label for="Keluhan" class="col-sm-4 form-control-label">Diagnosa <span class="text-danger">*</span></label>
                          <div class="col-sm-5">
                            <textarea name="diagnosa" rows="3" cols="46" required placeholder="Masukkan Hasil Diagnosa"></textarea>
                          </div>
                        </div>
                        <div class="form-group row" style="text-align: right">
                          <label for="Observasi" class="col-sm-4 form-control-label">Treatment <span class="text-danger">*</span></label>
                          <div class="col-sm-5">
                            <textarea name="treatment" rows="3" cols="46" required placeholder="Masukkan Hasil Treatment"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12 col-md-offset-4">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
            </div>
          </div>
          </form>
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#datepicker-autoclose').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true
    });
  });
</script>


<?php $this->load->view('templates/footer') ?>

</html>