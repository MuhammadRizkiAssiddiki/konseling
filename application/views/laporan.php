<?php $this->load->view('templates/header') ?>
<style>
  table,
  th {
    border: solid black 2px;
  }
</style>

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
                  <li class="active">
                    Laporan
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
                    <h4 class="header-title m-t-0">Data Laporan</h4>
                    <div class="p-20">
                      <form method="get" action="">
                        <div class="form-group row" style="text-align: right">
                          <label for="Pilih Ortu" class="col-sm-4 form-control-label">Filter Berdasarkan <span class="text-danger">*</span></label>
                          <div class="col-sm-5">
                            <select class="form-control" id="filter" name="filter">
                              <option value="">--Silahkan Masukkan Pilihan--</option>
                              <option value="1">--TANGGAL--</option>
                              <option value="2">--BULAN--</option>
                              <option value="3">--TAHUN--</option>
                              <option value="4">--ORANG TUA--</option>
                              <option value="5">--PASIEN--</option>
                              <option value="6">--PEKERJAAN ORANG TUA--</option>
                              <option value="7">--PENDIDIKAN ORANG TUA--</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row" style="text-align: right" id="pilihtanggal" hidden>
                          <label for="Pilih Ortu" class="col-sm-4 form-control-label">Pilih Tanggal <span class="text-danger">*</span></label>
                          <div class="col-sm-5">
                            <div class="input-group">
                              <input type="text" name="tanggallaporan" class="form-control" id="input-tanggal">
                              <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row" style="text-align: right" id="pilihbulan" hidden>
                          <label for="Pilih Ortu" class="col-sm-4 form-control-label">Pilih Bulan <span class="text-danger">*</span></label>
                          <div class="col-sm-5">
                            <select class="form-control" name="bulanlaporan">
                              <option value="">--Silahkan Masukkan Pilihan--</option>
                              <option value="1">--Januari--</option>
                              <option value="2">--Februari--</option>
                              <option value="3">--Maret--</option>
                              <option value="4">--April--</option>
                              <option value="5">--Mei--</option>
                              <option value="6">--Juni--</option>
                              <option value="7">--Juli--</option>
                              <option value="8">--Agustus--</option>
                              <option value="9">--September--</option>
                              <option value="10">--Oktober--</option>
                              <option value="11">--November--</option>
                              <option value="12">--Desember--</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row" style="text-align: right" id="pilihtahun" hidden>
                          <label for="Pilih Ortu" class="col-sm-4 form-control-label">Pilih Tahun <span class="text-danger">*</span></label>
                          <div class="col-sm-5">
                            <select class="form-control" name="tahunlaporan">
                              <option value="">--Silahkan Masukkan Pilihan--</option>
                              <?php foreach ($option_tahun as $e) : ?>
                                <option value="<?php echo $e->tahun; ?>"><?php echo $e->tahun; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row" style="text-align: right" id="pilihorangtua" hidden>
                          <label for="Pilih Ortu" class="col-sm-4 form-control-label">Pilih Orang Tua <span class="text-danger">*</span></label>
                          <div class="col-sm-5">
                            <select class="form-control" name="orangtua">
                              <option value="">--Silahkan Masukkan Pilihan--</option>
                              <?php foreach ($ortu as $d) : ?>
                                <option value="<?php echo $d->namaorangtua; ?>"><?php echo $d->namaorangtua; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row" style="text-align: right" id="pilihpasien" hidden>
                          <label for="Pilih Pasien" class="col-sm-4 form-control-label">Pilih Pasien <span class="text-danger">*</span></label>
                          <div class="col-sm-5">
                            <select class="form-control" name="pasien">
                              <option value="">--Silahkan Masukkan Pilihan--</option>
                              <?php foreach ($pasien as $m) : ?>
                                <option value="<?php echo $m->namapasien; ?>"><?php echo $m->namapasien; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row" style="text-align: right" id="pilihpekerjaan" hidden>
                          <label for="Pilih Ortu" class="col-sm-4 form-control-label">Pilih Pekerjaan <span class="text-danger">*</span></label>
                          <div class="col-sm-5">
                            <select class="form-control" name="pekerjaan">
                              <option value="">--Silahkan Masukkan Pilihan--</option>
                              <?php foreach ($pekerjaan as $c) : ?>
                                <option value="<?php echo $c->pekerjaan; ?>"><?php echo $c->pekerjaan; ?></option>
                              <?php endforeach; ?>
                              <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row" style="text-align: right" id="pilihpendidikan" hidden>
                          <label for="Pilih Ortu" class="col-sm-4 form-control-label">Pilih Pendidikan <span class="text-danger">*</span></label>
                          <div class="col-sm-5">
                            <select class="form-control" name="pendidikan">
                              <option value="">--Silahkan Masukkan Pilihan--</option>
                              <?php foreach ($pendidikan as $b) : ?>
                                <option value="<?php echo $b->pendidikan; ?>"><?php echo $b->pendidikan; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>

                        <div style="text-align:center">
                          <button type="submit" class="btn btn-rounded btn-success" name="button">Tampilkan Data Laporan</button>
                        </div>
                      </form>
                      <br>
                      <div>

                        <a href="<?php echo $url_cetak; ?>" class="btn btn-rounded btn-info">Cetak Laporan</a>

                      </div>
                      <br>
                      <b>
                        <h5> <?php echo $ket; ?></h5>
                      </b>
                      <table class="table table-striped table-bordered" style="border: solid black 1px;" id="datatable" style="text-align:center">
                        <thead style="text-align:center">
                          <th style="text-align:center">No</th>
                          <th style="text-align:center">No PMR</th>
                          <th style="text-align:center">Nama Pasien</th>
                          <th style="text-align:center">Tanggal PMR</th>
                          <th style="text-align:center; width:200px;">keluhan</th>
                          <th style="text-align:center; width:200px;">Observasi</th>
                          <th style="text-align:center; width:200px;">Diagnosa</th>
                          <th style="text-align:center; width:200px;">Treatment</th>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                          foreach ($laporan as $a) : ?>
                            <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $a->nopmr; ?></td>
                              <td style="text-align:justify;"><?php echo $a->namapasien; ?></td>
                              <td style="text-align:justify;"><?php echo $a->tanggalpmr; ?></td>
                              <td style="text-align:center;"><?php echo $a->keluhan; ?></td>
                              <td style="text-align:center;"><?php echo $a->observasi; ?></td>
                              <td style="text-align:center;"><?php echo $a->diagnosa; ?></td>
                              <td style="text-align:center;"><?php echo $a->treatment; ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
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


</body>

<!-- Sweet Alert js -->
<script src="<?php echo base_url('assets/'); ?>plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>pages/jquery.sweet-alert.init.js"></script>
<?php $this->load->view('templates/footer'); ?>

<script>
  $(document).ready(function() { // Ketika halaman selesai di load
    $('#input-tanggal').datepicker({
      dateFormat: 'yy-mm-dd', // Set format tanggalnya jadi yyyy-mm-dd
      autoclose: true
    });

    //$('#pilihpekerjaan, #pilihpendidikan').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

    $('#filter').change(function() { // Ketika user memilih filter
      if ($(this).val() == '5') { // Jika filter nya 1 (per tanggal)
        //$('#pilihpendidikan').hide(); // Sembunyikan form bulan dan tahun
        $('#pilihorangtua').prop('hidden', true);
        $('#pilihpasien').prop('hidden', false);
        $('#pilihpendidikan').prop('hidden', true);
        $('#pilihpekerjaan').prop('hidden', true);
        $('#pilihtanggal').prop('hidden', true);
        $('#pilihbulan').prop('hidden', true);
        $('#pilihtahun').prop('hidden', true);
        //$('#pilihpekerjaan').show(); // Tampilkan form tanggal
      } else if ($(this).val() == '6') { // Jika filter nya 1 (per tanggal)
        //$('#pilihpendidikan').hide(); // Sembunyikan form bulan dan tahun
        $('#pilihorangtua').prop('hidden', true);
        $('#pilihpasien').prop('hidden', true);
        $('#pilihpendidikan').prop('hidden', true);
        $('#pilihpekerjaan').prop('hidden', false);
        $('#pilihtanggal').prop('hidden', true);
        $('#pilihbulan').prop('hidden', true);
        $('#pilihtahun').prop('hidden', true);
        //$('#pilihpekerjaan').show(); // Tampilkan form tanggal
      } else if ($(this).val() == '7') { // Jika filter nya 2 (per bulan)
        $('#pilihpendidikan').prop('hidden', false);
        $('#pilihpasien').prop('hidden', true);
        $('#pilihpekerjaan').prop('hidden', true);
        $('#pilihorangtua').prop('hidden', true);
        $('#pilihtanggal').prop('hidden', true);
        $('#pilihbulan').prop('hidden', true);
        $('#pilihtahun').prop('hidden', true);
      } else if ($(this).val() == '4') { // Jika filter nya 2 (per bulan)
        $('#pilihpendidikan').prop('hidden', true);
        $('#pilihpasien').prop('hidden', true);
        $('#pilihpekerjaan').prop('hidden', true);
        $('#pilihorangtua').prop('hidden', false);
        $('#pilihtanggal').prop('hidden', true);
        $('#pilihbulan').prop('hidden', true);
        $('#pilihtahun').prop('hidden', true);
      } else if ($(this).val() == '1') { // Jika filter nya 2 (per bulan)
        $('#pilihpendidikan').prop('hidden', true);
        $('#pilihpasien').prop('hidden', true);
        $('#pilihpekerjaan').prop('hidden', true);
        $('#pilihorangtua').prop('hidden', true);
        $('#pilihtanggal').prop('hidden', false);
        $('#pilihbulan').prop('hidden', true);
        $('#pilihtahun').prop('hidden', true);
      } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
        $('#pilihpendidikan').prop('hidden', true);
        $('#pilihpasien').prop('hidden', true);
        $('#pilihpekerjaan').prop('hidden', true);
        $('#pilihorangtua').prop('hidden', true);
        $('#pilihtanggal').prop('hidden', true);
        $('#pilihbulan').prop('hidden', false);
        $('#pilihtahun').prop('hidden', false);
      } else if ($(this).val() == '3') { // Jika filter nya 2 (per bulan)
        $('#pilihpendidikan').prop('hidden', true);
        $('#pilihpasien').prop('hidden', true);
        $('#pilihpekerjaan').prop('hidden', true);
        $('#pilihorangtua').prop('hidden', true);
        $('#pilihtanggal').prop('hidden', true);
        $('#pilihbulan').prop('hidden', true);
        $('#pilihtahun').prop('hidden', false);
      }

      $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
    })
  })
</script>



</html>