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
                                        <a href="<?php echo site_url('konseling'); ?>">Konseling</a>
                                      </li>
                                      <li class="active">
                                          Tambah Data Konseling
                                      </li>
                                  </ol>
                                  <div class="clearfix"></div>
                              </div>
                            </div>
                      </div>
                      <!-- end row -->
                      <form enctype="multipart/form-data" role="form" action="<?php echo site_url('konseling/prosestambahkonseling'); ?>" method="post">
                      <div class="row">
                        <div class="col-xs-12">

                          <div class="card-box">
                            <div class="row">
                              <div class="col-lg-12">
                                <h4 class="header-title m-t-0">Data Pasien</h4>
                                <p class="text-muted font-13 m-b-10">
                                  Note : Silahkan Pilih/Masukkan Data Pasien Terlebih Dahulu, Setelah itu baru masukkan data konseling!
                                </p>
                                <div class="p-20">
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Pilih Ortu" class="col-sm-4 form-control-label">Pilih Data Pasien <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <select class="form-control" id="pilihpasien" name="pilihpasien">
                                        <option value="">--Silahkan Masukkan Pilihan--</option>
                                        <?php foreach ($pasien as $a): ?>
                                          <option value="<?php echo $a->idpasien; ?>"><?php echo $a->namapasien; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div id="datapasien" >

                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="card-box">
                            <div class="row">
                              <div class="col-lg-12">
                                <h4 class="header-title m-t-0">Input Data Konseling</h4>
                                <div class="p-20">
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Kode Pesanan" class="col-sm-4 form-control-label">No PMR <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <input type="text" name="nopmr" parsley-trigger="change" required placeholder="Masukkan Nomor PMR" class="form-control" id="userName">
                                    </div>
                                  </div>
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Kode Pesanan" class="col-sm-4 form-control-label">Tanggal Konseling<span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <div class="input-group">
                                        <input type="text" name="tanggalpmr" parsley-trigger="change" required placeholder="mm/dd/yyyy" class="form-control" id="datepicker-autoclose">
                                        <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group row" style="text-align: right">
                                    <label for="Keluhan" class="col-sm-4 form-control-label">Keluhan <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                      <textarea name="keluhan" rows="4" cols="46" placeholder="Masukkan Keluhan"></textarea>
                                    </div>
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


  </body>
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
        $('#pilihpasien').change(function(){
          var id = $(this).val();
          $.ajax({
            url: "<?php echo site_url('konseling/getdatapasien'); ?>",
            method: "POST",
            data: {id: id},
            async: false,
            dataType: "JSON",
            success: function(data){
              var jsonResult = $.parseJSON;
              var data1 = data.pasien;
              var data2 = data.keluhan;

              console.log(data1[0].namapasien)

              // for (var i = 0; i < data2.length; i++) {
              //   console.log(data2[i].keluhan);
              // }

              //console.log(data2);
              for (var i = 0; i < data1.length; i++) {
                var html  = '<table class="table table-striped table-bordered" style="width:68%;margin-left:15%;">';
                    html += '<tr>';
                    html += '<td width="50%">ID Pasien</td>';
                    html += '<td><b>'+data1[i].idpasien+'</b></td>';
                    html += '</tr>';
                    html += '<tr>';
                    html += '<td>Nama Pasien</td>';
                    html += '<td><b>'+data1[i].namapasien+'</b></td>';
                    html += '</tr>';
                    html += '<tr>';
                    html += '<td>Tempat, Tanggal Lahir</td>';
                    html += '<td><b>'+data1[i].tempatlahir+', '+data1[i].tanggallahir+'</b></td>';
                    html += '</tr>';
                    html += '<tr>';
                    html += '<td>Usia</td>';
                    html += '<td><b>'+data1[i].umur+' Tahun'+'</b></td>';
                    html += '</tr>';
                    html += '<tr>';
                    html += '<td>Alamat</td>';
                    html += '<td><b>'+data1[i].alamat+'</b></td>';
                    html += '</tr>';
                    html += '<tr>';
                    html += '<td>No Telpon</td>';
                    html += '<td><b>'+data1[i].notelp+'</b></td>';
                    html += '</tr>';
                    html += '<tr>';
                    html += '<td>Anak Ke</td>';
                    html += '<td><b>'+data1[i].anakke+'</b></td>';
                    html += '</tr>';
                    html += '<tr>';
                    html += '<td>Sekolah</td>';
                    html += '<td><b>'+data1[i].sekolah+'</b></td>';
                    html += '</tr>';
                    html += '</table>';
                    html += '<table class="table table-bordered">';
                        html += '<thead>';
                        html += '<th style="border: 0px;">Riwayat Keluhan</th>';
                        html += '</thead>';

                    if (data2 == '') {

                          html += '<td style="text-align: center">Belum Memiliki Riwayat Keluhan</td>';

                    }

                        else {
                          html += '<thead>';
                          html += '<th style="text-align: center">No PMR</th>';
                          html += '<th style="text-align: center">Tanggal Konseling</th>';
                          html += '<th style="text-align: center">Keluhan</th>';
                          html += '</thead>';
                          html += '<tbody>';
                          html += '<tr>';
                          for (var b = 0; b < data2.length; b++) {
                          html += '<td style="text-align: center">'+data2[b].nopmr+'</td>';
                          html += '<td style="text-align: center">'+data2[b].tanggalpmr+'</td>';
                          html += '<td style="text-align: center">'+data2[b].keluhan+'</td>';
                          html += '</tr>';
                        }
                          html += '</tbody>';


                        }
                        html += '</table>';
              }





                $('#datapasien').html(html);

            }
          });
        });
      });
    </script>

  <?php $this->load->view('templates/footer') ?>
</html>
