<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>
<body>
    <!-- Left Panel -->
    <?php $this->load->view("_partials/sidebar.php") ?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel ">
        <!-- Header-->
        <?php $this->load->view("_partials/navbar.php") ?>

        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="ti-server"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $soft->row()->jml; ?></span></div>
                                            <div class="stat-heading">Software</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $hard->row()->jml; ?></span></div>
                                            <div class="stat-heading">Hardware</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $pjm->row()->jml; ?></span></div>
                                            <div class="stat-heading">Peminjam</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->

                <div class="clearfix"></div>
                
                <!-- card lokasi -->
                <div class="row">
                <?php foreach ($content->result_array() as $key): ?>
                    <div class="col-md-4">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <a href="#">
                                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/admin.jpg">
                                        </a>
                                        <div class="media-body">
                                            <h2 class="text-light display-6"><th><?php echo $key['NAMA_PERUSAHAAN'] ?> </th></h2>
                                            <p><?php echo $key['ALAMAT_LOKASI'].', '.$key['KOTA'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <i class="fa fa-desktop"></i> Hardware <span class="badge badge-primary pull-right"><?php $count = $acc->countKtgLokHardware($key['ID_LOKASI']); echo $count->row()->jml; ?></span>
                                    </li>
                                    <?php $countKtg = $acc->countSubktgLokH($key['ID_LOKASI']); foreach ($countKtg->result_array() as $cs): ?>
                                    <li class="list-group-item">
                                        <i class="fa fa-tag"></i> <?php echo $cs['SUB_KATEGORI'] ?> <span class="badge badge-warning pull-right r-activity"><?php echo $cs['jml'] ?></span>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </section>
                        </aside>
                    </div>
                <?php endforeach ?>
                </div>

            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
         <?php $this->load->view("_partials/footer.php") ?>
    </div>
    <!-- /#right-panel -->
    <?php $this->load->view("_partials/js.php") ?>
</body>
</html>
