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
                    Konseling
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
                    <?php if ($level == 'administrator') : ?>
                      <a href="<?php echo site_url('konseling/tambahkonseling') ?>" class="btn btn-info btn-rounded waves-effect waves-light">Tambah Data Konseling</a>
                    <?php endif; ?>
                    <?php if ($level == 'pengawas') : ?>
                      <button type="button" name="button" class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#koreksidata">Buat Memo Koreksi</button>
                    <?php endif; ?>
                    <div class="p-20">
                      <table class="table table-striped" id="datatable" style="text-align:center">
                        <thead style="text-align:center">
                          <th style="text-align:center">No</th>
                          <th style="text-align:center">No PMR</th>
                          <th style="text-align:center">Nama Pasien</th>
                          <th style="text-align:center">Tanggal PMR</th>
                          <th style="text-align:center">Keluhan</th>
                          <?php if ($level == 'administrator') : ?>
                            <th style="text-align:center">Opsi</th>
                          <?php endif; ?>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                          foreach ($konseling as $a) : ?>
                            <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $a->nopmr; ?></td>
                              <td><?php echo $a->namapasien; ?></td>
                              <td><?php echo $a->tanggalpmr; ?></td>
                              <td><?php echo $a->keluhan; ?></td>
                              <?php if ($level == 'administrator') : ?>
                                <td>
                                  <a href="" data-toggle="modal" data-target="#editdata<?= $a->nopmr; ?>" disabled><img name="edit" width="20" height="20" src="<?php echo base_url('img/edit.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit Data Konseling" disabled /></a>
                                  <a href="<?php echo site_url('konseling/hapuskonseling/' . $a->nopmr); ?>" class="sa-params"><img width="20" height="20" src="<?php echo base_url('img/hapus.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Data Konseling" /></a>
                                </td>
                              <?php endif; ?>
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
          <?php foreach ($konseling as $b) : ?>
            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editdata<?= $b->nopmr; ?>">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                    <h4 class="modal-title">Edit Data Konseling</h4>
                  </div>
                  <form class="form-horizontal" action="<?php echo site_url('konseling/editkonseling'); ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-lg-3 col-sm-2 control-label">Nomor PMR</label>
                        <div class="col-lg-9">
                          <input type="text" name="nopmr" class="form-control" value="<?= $b->nopmr; ?>" readonly="readonly">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 col-sm-2 control-label">Nama Pasien</label>
                        <div class="col-lg-9">
                          <select class="form-control" name="idpasien">
                            <?php foreach ($pasien as $c) : ?>
                              <option value="<?php echo $c->idpasien; ?>" <?php if ($c->idpasien == $b->idpasien) {
                                echo "selected='selected;'";
                              } ?>><?php echo $c->namapasien; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 col-sm-2 control-label">Tanggal PMR</label>
                        <div class="col-lg-9">
                          <div class="input-group">
                            <?php
                              $newDate = date("m-d-Y", strtotime($b->tanggalpmr)); ?>
                            <input type="text" name="tanggalpmr" id="datepicker-autoclose" class="form-control" value="<?php echo $newDate ?>">
                            <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 col-sm-2 control-label">Keluhan</label>
                        <div class="col-lg-9">
                          <textarea name="keluhan" rows="3" cols="65" placeholder="Masukkan Observasi"><?= $b->keluhan; ?></textarea>
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

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="koreksidata">
      <div class="modal-dialog ">
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
                  <input type="text" name="user" class="form-control" value="<?= $this->input->get('user'); ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 col-sm-2 control-label">Perihal</label>
                <div class="col-lg-9">
                  <input value="Data Konseling" readonly type="text" name="perihal" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 col-sm-2 control-label">Catatan</label>
                <div class="col-lg-9">
                  <textarea name="catatan" id="" cols="66" class="form-control" rows="4" placeholder="Masukkan Catatan"></textarea>
                </div>
              </div>
              <input type="hidden" name="url" value="<?= base_url('konseling?user='.$this->input->get('user')); ?>">
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