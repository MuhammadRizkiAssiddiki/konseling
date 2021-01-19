
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
                                          Monitoring
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
                                <h4 class="header-title m-t-0">Data Monitoring</h4>
                                <div class="p-20">
                                  <table id="datatable" class="table table-striped" >
                                    <thead>
                                      <th>No</th>
                                      <th>User</th>
                                      <th>Waktu</th>
                                      <th>Keterangan</th>
                                      <th>Opsi</th>


                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach ($monitoring as $a): ?>
                                      <tr>
                                      <td><?php echo $i++; ?></td>
                                      <td><?php echo $a->user; ?></td>
                                      <td><?php echo $a->waktu; ?></td>
                                      <td><?php echo $a->keterangan; ?></td>
                                        <td>
                                          <a class="btn btn-rounded btn-primary" href="<?php echo $a->url; ?>" target="_blank">Akses Halaman</a>
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
   <script>
     var resizefunc = [];
 </script>

 <!-- Required datatable js -->
 <script src="<?php echo base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url('assets/'); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>


  <script type="text/javascript">
     $(document).ready(function() {
         $('#datatable').DataTable();

     });

 </script>



  <?php $this->load->view('templates/footer') ?>
</html>
