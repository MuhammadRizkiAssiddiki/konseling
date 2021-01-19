
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
                                          Diagnosa
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
                                <h4 class="header-title m-t-0">Data Hasil Diagnosa</h4>
                                <div class="p-20">
                                  <table class="table table-striped" id="datatable" style="text-align:center">
                                    <thead style="text-align:center">
                                      <th style="text-align:center">No</th>
                                      <th style="text-align:center">No PMR</th>
                                      <th style="text-align:center">Nama Pasien</th>
                                      <th style="text-align:center">Tanggal PMR</th>
                                      <th style="text-align:center; width:250px;">Diagnosa</th>
                                      <th style="text-align:center">Treatment</th>
                                      <th style="text-align:center">Opsi</th>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach ($diagnosa as $a): ?>
                                      <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $a->nopmr; ?></td>
                                        <td><?php echo $a->namapasien; ?></td>
                                        <td><?php echo $a->tanggalpmr; ?></td>
                                        <td><?php echo $a->diagnosa; ?></td>
                                        <td><?php echo $a->treatment; ?></td>
                                        <td>
                                          <a href="<?php echo site_url('diagnosa/detaildiagnosa/'.$a->iddiagnosa.'/'.$a->idpasien) ?>"><img name="detail" width="20" height="20" src="<?php echo base_url('img/detail.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Detail Data Diagnosa" disabled/></a>
                                          <a href="" data-toggle="modal" data-target="#editdata<?=$a->iddiagnosa; ?>" disabled><img name="edit" width="20" height="20" src="<?php echo base_url('img/edit.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit Data Diagnosa" disabled/></a>
                                          <a href="<?php echo site_url('diagnosa/hapusdiagnosa/'.$a->iddiagnosa.'/'.$a->nopmr); ?>" class="sa-params"><img width="20" height="20" src="<?php echo base_url('img/hapus.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Data Diagnosa"/></a>
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
                      <?php foreach($diagnosa as $b): ?>
                        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editdata<?=$b->iddiagnosa; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                                <h4 class="modal-title">Edit Data Diagnosa</h4>
                              </div>
                              <form class="form-horizontal" action="<?php echo site_url('diagnosa/editdiagnosa'); ?>" method="post" enctype="multipart/form-data" role="form">
                                <div class="modal-body">
                                  <input type="hidden" name="iddiagnosa" class="form-control" value="<?= $b->iddiagnosa; ?>" readonly="readonly" >
                                  <div class="form-group">
                                    <label class="col-lg-3 col-sm-2 control-label">Nomor PMR</label>
                                    <div class="col-lg-9">
                                      <input type="text" name="nopmr" class="form-control" value="<?= $b->nopmr; ?>" readonly="readonly" >
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-3 col-sm-2 control-label">Nama Pasien</label>
                                    <div class="col-lg-9">
                                      <input type="text" name="nopmr" class="form-control" value="<?= $b->namapasien; ?>" readonly="readonly" >
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-3 col-sm-2 control-label">Tanggal Konseling</label>
                                    <div class="col-lg-9">
                                      <input type="text" name="nopmr" class="form-control" value="<?= $b->tanggalpmr; ?>" readonly="readonly" >
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-3 col-sm-2 control-label">Diagnosa</label>
                                    <div class="col-lg-9">
                                      <textarea name="diagnosa" rows="3" cols="65"><?= $b->diagnosa; ?></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-3 col-sm-2 control-label">Treatment</label>
                                    <div class="col-lg-9">
                                      <textarea name="treatment" rows="3" cols="65"><?= $b->treatment; ?></textarea>
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
                      <?php endforeach; ?>

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



</html>
