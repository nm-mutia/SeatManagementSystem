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
    <div id="right-panel" class="right-panel">
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
                                            <div class="stat-text"><span class="count">23569</span></div>
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
                                            <div class="stat-text"><span class="count">3435</span></div>
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
                                            <div class="stat-text"><span class="count">2986</span></div>
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
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Peminjaman Lebih dari Tenggat</h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th class="avatar">Avatar</th>
                                                    <th>ID</th>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>SN</th>
                                                    <th>Tanggal Tenggat</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $x = 1; ?>
                                                <?php foreach ($content->result_array() as $key): ?>
                                                <tr>
                                                    <td class="serial"><?php echo $x++; ?>.</td>
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td> <?php echo $key['ID'] ?> </td>
                                                    <td><span class="name"><?php echo $key['NIK'] ?></span> </td>
                                                    <td><span class="product"><?php echo $key['NAMA'] ?></span> </td>
                                                    <td><span ><?php echo $key['SN'] ?></span></td>
                                                    <td><span ><?php echo $key['TANGGAL TENGGAT'] ?></span></td>
                                                    <td>
                                                        <a href="<?php echo base_url()?>details/<?php echo $key['ID']?>/<?php echo $key['SN']?>"><span class="badge badge-complete">Detail</span></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
                <!-- /.orders -->
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
