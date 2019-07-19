<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>
<body>
    <!-- Left Panel -->
    <?php $this->load->view("_partials/sidebar.php") ?>
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
                                <h1><?php echo $page_title ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#"><?php echo $kategori ?></a></li>
                                    <li class="active">Tambah Data</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?php echo $page_title ?></strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Tambah Data <?php echo $page_title ?></h3>
                                        </div>
                                        <hr>
                                        <form action="<?php echo base_url()?>crud/<?php if($page_title == 'PO Detail' || $page_title == 'History Detail'){echo $this->uri->segment(1).'Detail';}else{echo $this->uri->segment(1);}?>" method="post" novalidate="novalidate">
                                            <!-- <div class="form-group text-center">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                                                </ul>
                                            </div> -->

                                            <?php foreach ($content->field_data() as $field): ?>
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1"><?php echo $field->name ?> </label>
                                                    <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" required = "true">
                                                </div>
                                            <?php endforeach ?>

                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Save</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form> <!-- endform -->


                                    </div>
                                    <?php
                                        if($page_title == "Purchase Order" || $page_title == "History"){
                                    ?>  <div>
                                            <a href="<?php echo site_url($this->uri->segment(1))?>/<?php echo $this->uri->segment(2)?>/<?php if ($this->uri->segment(3)!=null){ echo $this->uri->segment(3)?>/<?php } ?><?php echo 'addDetail'?>"><button type="button" class="btn btn-success">Tambah Detail <?php echo $page_title?></button></a>
                                        </div>
                                    <?php
                                        }
                                     ?>
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
    <!-- Right Panel -->


      <?php $this->load->view("_partials/js.php") ?>

</body>
</html>
