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
                                        <a class="active ">Beranda</a>
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <?php if ($level == 'pasien') { ?>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card-box tilebox-one">
                                    <i class="fa fa-bar-chart-o pull-xs-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20" style="color:darkblue">Jumlah Konseling</h6>
                                    <h2 class="m-b-10" data-plugin="counterup"><?= $tkp; ?></h2>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card-box tilebox-one">
                                    <i class="fa fa-tasks pull-xs-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20" style="color:green">Konseling Terakhir</h6>

                                    <?php if ($lastkonsul->num_rows() > 0) {
                                            echo "<h2 class='m-b-10'>";
                                            echo $lastkonsul->row()->tanggalpmr;
                                            echo "</h2>";
                                        } else {
                                            echo "<h2 class='m-b-10'>";
                                            echo "Belum Konseling";
                                            echo "</h2>";
                                        }
                                        ?>

                                </div>
                            </div>
                        <?php  } else { ?>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fa fa-users pull-xs-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20" style="color:darkblue">Total Pasien</h6>
                                    <h2 class="m-b-10" data-plugin="counterup"><?= $totalpasien; ?></h2>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fa fa-bar-chart-o pull-xs-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20" style="color:green">Pasien Baru Bulan Ini</h6>
                                    <h2 class="m-b-10"><span data-plugin="counterup">
                                            <?php foreach ($tpb as $a) {
                                                    echo $a->bulan;
                                                } ?>
                                        </span></h2>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fa fa-tasks pull-xs-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20" style="color:mediumturquoise">Total Konseling</h6>
                                    <h2 class="m-b-10"><span data-plugin="counterup"><?= $totalkonseling; ?></span></h2>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="icon-chart pull-xs-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20" style="color:deepskyblue">Konseling Bulan Ini</h6>
                                    <h2 class="m-b-10" data-plugin="counterup">
                                        <?php foreach ($tkb as $a) {
                                                echo $a->bulan;
                                            } ?>
                                    </h2>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                    <!-- end row -->


                    <!-- START carousel-->
                    <div id="carousel-example-captions" data-ride="carousel" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-captions" data-slide-to="1"></li>
                            <li data-target="#carousel-example-captions" data-slide-to="2"></li>
                        </ol>
                        <div role="listbox" class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url('img/humanika1.jpg'); ?>" alt="First slide image" style="height:410px; width:1080px">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('img/humanika2.png'); ?>" alt="Second slide image" style="height:410px; width:1080px">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url('img/humanika3.jpg'); ?>" alt="Third slide image" style="height:410px; width:1080px">
                            </div>
                        </div>
                        <a href="#carousel-example-captions" role="button" data-slide="prev" class="left carousel-control"> <span aria-hidden="true" class="fa fa-angle-left"></span> <span class="sr-only">Previous</span> </a>
                        <a href="#carousel-example-captions" role="button" data-slide="next" class="right carousel-control"> <span aria-hidden="true" class="fa fa-angle-right"></span> <span class="sr-only">Next</span> </a>
                    </div>
                    <!-- END carousel-->


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
<script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>



<script>
    var resizefunc = [];
</script>



<?php $this->load->view('templates/footer') ?>

</html>