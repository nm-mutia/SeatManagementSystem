<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view("_partials/head.php") ?>
    <style>
        .hide {
            display: none;
        }
    </style>
</head>
<body>
	<!-- Left Panel -->
    <?php $this->load->view("_partials/sidebar_pgw.php") ?>
    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php $this->load->view("_partials/navbar.php") ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card bg-flat-color-7">
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

                    <div class="col-lg-6 col-md-6">
                        <div class="card bg-flat-color-7">
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
                </div>

                <!-- ISINYA -->
                <div class="tab-content" id="nav-tabContent">
                    <div id="nav-isi-dashboard" class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Peminjaman Telah Habis Masa Tenggat</strong>
                                </div>
                                <div class="card-body table-stats order-table">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                        <?php foreach ($tenggat->field_data() as $field): ?>
                                                <th><?php echo $field->name ?> </th>
                                                <!-- <th> Keterangan </th> -->
                                        <?php endforeach ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($tenggat->result_array() as $key): ?>
                                            <tr>
                                                <?php foreach ($key as $key1): ?>
                                                <td> <?php echo $key1 ; ?></td>
                                                <?php endforeach ?>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="nav-isi-aset"  class="tab-pane fade" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Aset Saat Ini</strong>
                                </div>
                                <div class="card-body table-stats order-table">
                                    <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                        <?php foreach ($aset->field_data() as $field): ?>
                                                <th><?php echo $field->name ?> </th>
                                                <!-- <th> Keterangan </th> -->
                                        <?php endforeach ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($aset->result_array() as $key): ?>
                                            <tr>
                                                <?php foreach ($key as $key1): ?>
                                                <td> <?php echo $key1 ; ?></td>
                                                <?php endforeach ?>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="nav-isi-history"  class="tab-pane fade" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">History Aset</strong>
                                </div>
                                <div class="card-body table-stats order-table">
                                    <table id="bootstrap-data-table3" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                        <?php foreach ($history->field_data() as $field): ?>
                                                <th><?php echo $field->name ?> </th>
                                                <!-- <th> Keterangan </th> -->
                                        <?php endforeach ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($history->result_array() as $key): ?>
                                            <tr>
                                                <?php foreach ($key as $key1): ?>
                                                <td> <?php echo $key1 ; ?></td>
                                                <?php endforeach ?>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>
            <?php $this->load->view("_partials/footer.php") ?>

    </div><!-- /#right-panel -->
    <?php $this->load->view("_partials/js.php") ?>
    

</body>
</html>
