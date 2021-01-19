
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
                                      <li class="active">
                                          Riwayat Konseling
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
                                <h4 class="header-title m-t-0">Data Konseling</h4>
                                <div class="p-20">
                                  <table class="table table-striped" id="datatable" style="text-align:center">
                                    <thead style="text-align:center">
                                      <th style="text-align:center">No</th>
                                      <th style="text-align:center">No PMR</th>
                                      <th style="text-align:center">Tanggal PMR</th>
                                      <th style="text-align:center">Keluhan</th>
                                      <th style="text-align:center">Observasi</th>
                                      <th style="text-align:center">Lihat Detail</th>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach ($rk as $a): ?>
                                      <tr>
                                      <td><?php echo $i++; ?></td>
                                      <td><?php echo $a->nopmr; ?></td>
                                      <td><?php echo $a->tanggalpmr; ?></td>
                                      <td><?php echo $a->keluhan; ?></td>
                                      <td><?php echo $a->observasi; ?></td>
                                      <td>
                                        <a class="btn  btn-sm btn-primary btn-rounded waves-effect waves-light" href="<?php echo site_url('riwayatkonseling/detail/'.$a->nopmr); ?>"><img width="20" height="20" src="<?php echo base_url('img/detail.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Detail Konseling"/> Detail Konseling</a>
                                      </td>
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

                      <!-- Modal Edit -->

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

  <script src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script>

<!-- Required datatable js -->
 <script src="<?php echo base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url('assets/'); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>


  <script type="text/javascript">
     $(document).ready(function() {
         $('#datatable').DataTable();

     });

 </script>

 <script>
     var resizefunc = [];
 </script>
  <?php $this->load->view('templates/footer'); ?>



</html>
