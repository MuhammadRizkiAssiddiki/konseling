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
                    Memo Koreksi
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
                    <h4 class="header-title m-t-0">Memo Koreksi Kinerja Administrator</h4>

                    <div class="p-20">
                      <table class="table table-striped" id="datatable">
                        <thead>
                          <th>No</th>
                          <th>Waktu</th>
                          <th>User</th>
                          <th>Perihal</th>
                          <th>Catatan</th>
                          <th>Opsi</th>


                        </thead>
                        <tbody>
                          <?php $i = 1; ?>

                          <?php if ($level == 'administrator') { ?>
                            <?php foreach ($memo as $a) : ?>
                              <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $a->waktu; ?></td>
                                <td><?php echo $a->user; ?></td>
                                <td><?php echo $a->perihal; ?></td>
                                <td style="text-align:justify"><?php echo $a->catatan; ?></td>
                                <td>
                                  <?php if ($a->status == 'Belum Diakses') { ?>
                                    <a value="Belum Diakses" id="id<?php echo $a->idkoreksi; ?>" onclick="ubahstatus(<?php echo $a->idkoreksi; ?>)" class="btn btn-sm btn-rounded btn-warning" href="<?php echo $a->url; ?>" target="_blank"> Akses Halaman </a></td>
                              <?php } else if ($a->status == 'Sudah Diakses') { ?>
                                <a value="Sudah Diakses" class="btn btn-sm btn-rounded btn-primary" href="<?php echo $a->url; ?>" target="_blank"> Akses Halaman </a></td>
                              <?php } ?>
                              </td>
                              </tr>
                            <?php endforeach; ?>

                          <?php } else if ($level == 'pengawas') { ?>
                            <?php foreach ($koreksi as $a) : ?>
                              <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $a->waktu; ?></td>
                                <td><?php echo $a->user; ?></td>
                                <td><?php echo $a->perihal; ?></td>
                                <td style="text-align:justify"><?php echo $a->catatan; ?></td>
                                <td style="width:31%">
                                  <a class="btn btn-sm btn-rounded btn-warning" href="" data-toggle="modal" data-target="#editdata<?= $a->idkoreksi; ?>" disabled><img name="edit" width="20" height="20" src="<?php echo base_url('img/edit.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit Data Konseling" disabled /> Edit</a>
                                  <a class="btn btn-sm btn-rounded btn-danger sa-params" href="<?php echo site_url('memokoreksi/hapuskoreksi/'.$a->idkoreksi); ?>" class="sa-params"><img width="20" height="20" src="<?php echo base_url('img/hapus.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Data Konseling" /> Hapus</a>

                                  <a class="btn btn-sm btn-rounded btn-primary" href="<?php echo $a->url; ?>" target="_blank"><img name="edit" width="20" height="20" src="<?php echo base_url('img/lou.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit Data Konseling" disabled /> Akses</a></td>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          <?php } ?>


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

    <!-- Modal Edit -->
    <?php foreach ($koreksi as $a) : ?>
      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editdata<?= $a->idkoreksi; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
              <h4 class="modal-title">Edit Memo Koreksi</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('memokoreksi/editkoreksi'); ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="modal-body">
                <input type="hidden" name="idkoreksi" value="<?= $a->idkoreksi; ?>" id="">
                <div class="form-group">
                  <label class="col-lg-3 col-sm-2 control-label">User</label>
                  <div class="col-lg-9">
                    <input type="text" name="user" class="form-control" value="<?= $a->user; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 col-sm-2 control-label">Perihal</label>
                  <div class="col-lg-9">
                    <input type="text" name="perihal" class="form-control" value="<?= $a->perihal; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 col-sm-2 control-label">Catatan</label>
                  <div class="col-lg-9">
                    <textarea name="catatan" id="" cols="66" class="form-control" rows="4"><?= $a->catatan; ?></textarea>
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

<script>
  function ubahstatus(id) {
    var status = $('#id' + id).attr('value');


    if (status == 'Belum Diakses') {
      var ubah = "Sudah Diakses";
      $.ajax({
        url: "<?php echo base_url('memokoreksi/ubahstatus/') ?>",
        type: "post",
        data: {
          id: id,
          ubah: ubah
        },
        success: function() {
          $('#id' + id).removeClass('btn-warning').addClass('btn-primary').attr('value', 'Sudah Diakses');
        }
      });

    }


  }

  function changestatus(id) {
    //var value = document.getElementById("link").getAttribute("val");
    var text = $('#id' + id).attr('value');
    alert(text);
  }
</script>



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

<?php $this->load->view('templates/footer') ?>

</html>