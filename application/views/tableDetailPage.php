<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <?php $this->load->view("_partials/head.php") ?>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
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
                                    <li><a href="#"><?php echo $page_title ?></a></li>
                                    <li><a href="<?php echo site_url($this->uri->segment(1))?>"><?php echo $kategori ?></a></li>
                                    <li class="active"><?php echo $subkategori ?></li>
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
                                <strong class="card-title"><?php echo $kategori ?></strong>
                            </div>
                            <div class="card-body table-stats order-table">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                    <?php foreach ($content->field_data() as $field): ?>
                                            <th><?php echo $field->name ?> </th>
                                    <?php endforeach ?>
                                    <?php
                                        if ($kategori == 'Aset Keseluruhan' || $kategori == 'Purchase Order'){
                                    ?>
                                        <th> Action </th>
                                    <?php
                                        }
                                     ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($content->result_array() as $key): ?>
                                        <tr>
                                            <?php foreach ($key as $idnya => $key1): ?>
                                             <?php if($idnya == "IMAGE") {
                                                $key1 = base64_encode($key1)
                                                ?>
                                                <td> <img src="data:image/jpeg;base64,<?php echo $key1 ?>"/> </td>
                                                <!-- <td> hallo</td> -->
                                              <?php
                                            }else{?>
                                              <td> <?php echo $key1 ; ?></td>
                                            <?php } ?>

                                            <?php endforeach ?>

                                            <?php
                                                if ($kategori == 'Aset Keseluruhan' || $kategori == 'Purchase Order'){
                                            ?>
                                            <td>
                                              <a href="<?php echo base_url($this->uri->segment(1))?>/<?php  echo "det/"; echo $this->uri->segment(3); ?>/<?php $u = $this->encryption->encrypt(current($key)); echo base64_encode($u); ?>">
                                                <div class="icon-container">
                                                  <span class="ti-eye"></span>
                                                </div>
                                              </a>

                                            </td>

                                            <?php
                                                }
                                             ?>

                                            <!--  <?php
                                               if ($kategori == 'Purchase Order'){
                                            ?>
                                            <td>
                                              <a href="<?php echo base_url($this->uri->segment(1))?>/<?php  echo "det/"; echo $this->uri->segment(3); ?>/<?php $u = $this->encryption->encrypt(current($key)); echo base64_encode($u); ?>">
                                                <div class="icon-container">
                                                  <span class="ti-eye"></span>
                                                </div>
                                              </a>
                                                <a href="<?php echo base_url()?>aset/<?php echo "addAset/";?><?php $u = $this->encryption->encrypt($idspk); echo base64_encode($u); ?>/<?php $us = $this->encryption->encrypt(current($key)); echo base64_encode($us); ?>">
                                                    <div class="icon-container">
                                                      <span class="ti-plus"></span><span class="icon-name"></span>
                                                    </div>
                                                </a>
                                            </td>
                                            <?php
                                                }
                                             ?> -->
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                                <?php
                                   if ($kategori == 'Purchase Order'){
                                ?>
                                    <a href="<?php echo base_url()?>po/detailpo/<?php $u = $this->encryption->encrypt($idspk); echo base64_encode($u); ?>"><button type="button" class="btn btn-success">Tambah Detail PO</button></a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

             <?php $this->load->view("_partials/footer.php") ?>

    </div>
    <!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->

    <!-- <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script> -->
      <?php $this->load->view("_partials/js.php") ?>

</body>
</html>
