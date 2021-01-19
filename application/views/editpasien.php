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
                                          Edit Data Pasien
                                      </li>
                                  </ol>
                                  <div class="clearfix"></div>
                              </div>
                            </div>
                      </div>
                      <!-- end row -->
                      <form enctype="multipart/form-data" role="form" action="<?php echo site_url('pasien/proseseditpasien'); ?>" method="post">
                      <div class="row">
                        <div class="col-xs-12">

                          <div class="card-box">
                            <div class="row">
                              <div class="col-lg-12">
                                <h4 class="header-title m-t-0">Edit Data Pasien</h4>
                                <div class="p-20">
                                  <?php foreach ($pasien as $a): ?>
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Kode Pesanan" class="col-sm-4 form-control-label">ID Pasien <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <input type="text" id="idpasien" name="idpasien" parsley-trigger="change" readonly value="<?php echo $a->idpasien; ?>" class="form-control" id="userName">
                                    </div>
                                  </div>
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Kode Pesanan" class="col-sm-4 form-control-label">Nama Pasien <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <input type="text" id="namapasien" name="namapasien" parsley-trigger="change" required value="<?php echo $a->namapasien; ?>" class="form-control" id="userName">
                                    </div>
                                  </div>
                                  <div class="form-group row" style="text-align: right">
                                    <label class="col-sm-4 form-control-label">Data Orang Tua</label>
                                    <div class="col-sm-5">
                                      <select class="form-control" name="idorangtua">
                                        <?php foreach ($ortu as $c): ?>
                                          <option value="<?php echo $c->idorangtua; ?>" <?php if($c->idorangtua == $a->idorangtua){ echo "selected='selected;'";} ?>><?php echo $c->namaorangtua; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Kode Pesanan" class="col-sm-4 form-control-label">Tempat Lahir <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <input type="text" name="tempatlahir" parsley-trigger="change" required value="<?php echo $a->tempatlahir; ?>" class="form-control" id="userName">
                                    </div>
                                  </div>
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Kode Pesanan" class="col-sm-4 form-control-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <div class="input-group">
                                        <input type="text" name="tanggallahir" parsley-trigger="change" required value="<?php echo $a->tanggallahir; ?>" class="form-control" id="datepicker-autoclose">
                                        <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Kode Pesanan" class="col-sm-4 form-control-label">Umur <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <input type="text" name="umur" parsley-trigger="change" required value="<?php echo $a->umur; ?>" class="form-control" id="userName">
                                    </div>
                                  </div>
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Alamat" class="col-sm-4 form-control-label">Alamat <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <textarea name="alamat" rows="3" cols="46"><?php echo $a->alamat; ?></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Kode Pesanan" class="col-sm-4 form-control-label">No HP/Telp <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <input type="text" name="notelp" parsley-trigger="change" required value="<?php echo $a->notelp; ?>" class="form-control" id="userName">
                                    </div>
                                  </div>
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Kode Pesanan" class="col-sm-4 form-control-label">Anak Ke <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <input type="text" name="anakke" parsley-trigger="change" required value="<?php echo $a->anakke; ?>" class="form-control" id="userName">
                                    </div>
                                  </div>
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Kode Pesanan" class="col-sm-4 form-control-label">Sekolah <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <input type="text" name="sekolah" parsley-trigger="change" required value="<?php echo $a->sekolah; ?>" class="form-control" id="userName">
                                    </div>
                                  </div>
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Kode Pesanan" class="col-sm-4 form-control-label">Password <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <input type="text" name="password" parsley-trigger="change" required value="<?php echo $a->password; ?>" class="form-control" id="userName">
                                    </div>
                                  </div>
                                  <?php endforeach; ?>
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
              2019 © Uplon.
          </footer>


      </div>
      <!-- END wrapper -->
      <script src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script>

      <script type="text/javascript">
            $(document).ready(function () {
                $('#datepicker-autoclose').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                });
            });
        </script>

      <script type="text/javascript">
        $(document).ready(function(){
          $('#pilihortu').change(function() {
            var id = $(this).val();
            if (id==1) {
              $.ajax({
                url: "<?php echo site_url('pasien/getortu'); ?>",
                method: "POST",
                async: false,
                dataType: 'json',
                success: function(data){
                  $('#tampilortu').prop('hidden', false)
                  $('#getortu').prop('hidden', true)
                  $('#dataortu').prop('hidden', true)
                  var html= '<option>--Silihkan Pilih Data Orang Tua--</option>';
                  var i;
                  for (var i = 0; i < data.length; i++) {

                    html += '<option value='+data[i].idorangtua+'>'+data[i].namaorangtua+'</option>'
                  }
                  $('#daftarortu').html(html);
                }
              });
            } else if(id==2) {
              $('#tampilortu').prop('hidden', true)
              $('#getortu').prop('hidden', true)
              $('#dataortu').prop('hidden', false)
              var html = '<div class="form-group row" style="text-align: right">';
                  html += '<label for="ID Orang Tua" class="col-sm-4 form-control-label">ID Orang Tua <span class="text-danger">*</span></label>';
                  html += '<div class="col-sm-5">';
                  html += '<input type="text" name="idorangtua" parsley-trigger="change" required placeholder="Masukkan ID Orang Tua" class="form-control" id="idorangtua">'
                  html += '</div>';
                  html += '</div>';

                  html += '<div class="form-group row" style="text-align: right">';
                  html += '<label for="Nama Orang Tua" class="col-sm-4 form-control-label">Nama Orang Tua <span class="text-danger">*</span></label>';
                  html += '<div class="col-sm-5">';
                  html += '<input type="text" name="namaorangtua" parsley-trigger="change" required placeholder="Masukkan ID Orang Tua" class="form-control">'
                  html += '</div>';
                  html += '</div>';

                  html += '<div class="form-group row" style="text-align: right">';
                  html += '<label for="Umur Orang Tua" class="col-sm-4 form-control-label">Umur <span class="text-danger">*</span></label>';
                  html += '<div class="col-sm-5">';
                  html += '<input type="text" name="umur" parsley-trigger="change" required placeholder="Masukkan Umur Orang Tua" class="form-control">'
                  html += '</div>';
                  html += '</div>';

                  html += '<div class="form-group row" style="text-align: right">';
                  html += '<label for="Pendidikan Orang Tua" class="col-sm-4 form-control-label">Pendidikan <span class="text-danger">*</span></label>';
                  html += '<div class="col-sm-5">';
                  html += '<select class="form-control" name="pendidikan">';
                  html += '<option value="">--Silahkan Masukkan Pilihan--</option>';
                  html += '<option value="SD/Sederajat">SD/Sederajat</option>';
                  html += '<option value="SMP/Sederajat">SMP/Sederajat</option>';
                  html += '<option value="SMA/Sederajat">SMA/Sederajat</option>';
                  html += '<option value="D III">D III</option>';
                  html += '<option value="S1/D IV">S1/D IV</option>';
                  html += '<option value="S2">S2</option>';
                  html += '<option value="S3">S3</option>';
                  html += '</select>';
                  html += '</div>';
                  html += '</div>';

                  html += '<div class="form-group row" style="text-align: right">';
                  html += '<label for="Pekerjaan Orang Tua" class="col-sm-4 form-control-label">Pekerjaan <span class="text-danger">*</span></label>';
                  html += '<div class="col-sm-5">';
                  html += '<select class="form-control" name="pekerjaan">';
                  html += '<option value="">--Silahkan Masukkan Pilihan--</option>';
                  html += '<option value="Pegawai Negeri Sipil(PNS)">Pegawai Negeri Sipil(PNS)</option>';
                  html += '<option value="TNI/POLRI">TNI/POLRI</option>';
                  html += '<option value="Guru">Guru</option>';
                  html += '<option value="Pegawai BUMN">Pegawai BUMN</option>';
                  html += '<option value="Pegawai Swasta">Pegawai Swasta</option>';
                  html += '<option value="Wirausaha">Wirausaha</option>';
                  html += '<option value="Buruh">Buruh</option>';
                  html += '<option value="Petani">Petani</option>';
                  html += '<option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>';
                  html += '</select>';
                  html += '</div>';
                  html += '</div>';

                  html += '<div class="form-group row" style="text-align: right">';
                  html += '<label for="Suku Orang Tua" class="col-sm-4 form-control-label">Suku Bangsa <span class="text-danger">*</span></label>';
                  html += '<div class="col-sm-5">';
                  html += '<input type="text" name="sukubangsa" parsley-trigger="change" required placeholder="Masukkan Suku Bangsa" class="form-control">'
                  html += '</div>';
                  html += '</div>';

              $('#dataortu').html(html);
            }
          });

          $('#daftarortu').change(function(){
            var id = $(this).val();
            $.ajax({
              url: "<?php echo site_url('pasien/getortubyid'); ?>",
              method: "POST",
              data: {id: id},
              async: false,
              dataType: 'json',
              success: function(data){
                $('#getortu').prop('hidden', false)
                for (var i = 0; i < data.length; i++) {
                var html = '<div class="form-group row" style="text-align: right">';
                    html += '<label for="Nama Orang Tua" class="col-sm-4 form-control-label">Nama Orang Tua <span class="text-danger">*</span></label>';
                    html += '<div class="col-sm-5">';
                    html += '<input type="text" value='+'"'+data[i].namaorangtua+'"'+' name="namaorangtua" parsley-trigger="change" readonly class="form-control">'
                    html += '</div>';
                    html += '</div>';

                    html += '<div class="form-group row" style="text-align: right">';
                    html += '<label for="Umur Orang Tua" class="col-sm-4 form-control-label">Umur <span class="text-danger">*</span></label>';
                    html += '<div class="col-sm-5">';
                    html += '<input type="text" value='+'"'+data[i].umur+'"'+' name="umur" parsley-trigger="change" readonly class="form-control">'
                    html += '</div>';
                    html += '</div>';

                    html += '<div class="form-group row" style="text-align: right">';
                    html += '<label for="Pendidikan Orang Tua" class="col-sm-4 form-control-label">Pendidikan <span class="text-danger">*</span></label>';
                    html += '<div class="col-sm-5">';
                    html += '<input type="text" value='+'"'+data[i].pendidikan+'"'+' name="pendidikan" parsley-trigger="change" readonly class="form-control">'
                    html += '</div>';
                    html += '</div>';

                    html += '<div class="form-group row" style="text-align: right">';
                    html += '<label for="Pekerjaan Orang Tua" class="col-sm-4 form-control-label">Pekerjaan <span class="text-danger">*</span></label>';
                    html += '<div class="col-sm-5">';
                    html += '<input type="text" value='+'"'+data[i].pekerjaan+'"'+' name="pekerjaan" parsley-trigger="change" readonly class="form-control">'
                    html += '</div>';
                    html += '</div>';

                    html += '<div class="form-group row" style="text-align: right">';
                    html += '<label for="Suku Bangsa Orang Tua" class="col-sm-4 form-control-label">Suku Bangsa <span class="text-danger">*</span></label>';
                    html += '<div class="col-sm-5">';
                    html += '<input type="text" value='+'"'+data[i].sukubangsa+'"'+' name="sukubangsa" parsley-trigger="change" readonly class="form-control">'
                    html += '</div>';
                    html += '</div>';
                }
                $('#getortu').html(html);
              }
            });

          });
        });
      </script>
      <?php $this->load->view('templates/footer') ?>

  </body>
</html>
