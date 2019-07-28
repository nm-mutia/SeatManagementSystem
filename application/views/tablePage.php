<!doctype html>
<!-- [if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!-- [if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif] -->

<head>
    <?php $this->load->view("_partials/head.php") ?>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body>
    <!-- Left Panel -->
    <?php $this->load->view("_partials/sidebar.php") ?>
    <!-- Left Panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel ">
        <!-- Header-->
              <?php $this->load->view("_partials/navbar.php") ?>
        <!-- Header-->

        <div class="breadcrumbs ">
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
                                    <li class="active"> <?php echo $kategori ?></li>
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
                        <div class="card ">
                            <div class="card-header">
                                <strong class="card-title"><?php echo $kategori ?></strong>
                            </div>
                            <div class="card-body table-stats order-table">
                                <table id="bootstrap-data-table" class="table table-condensed table-bordered hover">
                                    <thead>
                                        <tr>
                                          <!-- <th></th> -->
                                    <?php foreach ($content->field_data() as $field): ?>
                                            <th><?php echo $field->name ?> </th>
                                    <?php endforeach ?>
                                            
                                            <?php if ($page_title =="Log" || $kategori == "Tenggat"){
                                            ?>
                                            <th style="display:none"></th>
                                            <?php
                                            }else{
                                            ?>
                                                <th> ACTION </th>
                                              <?php
                                            }
                                               ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($content->result_array() as $key): ?>
                                        <tr>
                                            <?php $var = 1; ?>
                                            <?php foreach ($key as $key1): ?>
                                            <td> <?php $var++; echo $key1 ; ?></td>
                                            <?php if($kategori == "History" && $var == 5){$save = $key1;}
                                                else if($kategori == "History" && $var == 3){$save2 = $key1;}
                                                ?>
                                            <?php endforeach ?>
                                            <td>
                                                <?php
                                                    if ($kategori == "History Pegawai" || $kategori == "Aset Keseluruhan"|| $kategori == "Aset Tersedia" || $kategori == "History Pegawai"|| $kategori == "History Aset" || $kategori == "History Pegawai" ){
                                                ?>
                                                <a href="<?php echo base_url($this->uri->segment(1))?>/<?php if ($this->uri->segment(1)=="Purchase_Order" || $this->uri->segment(1)=="aset" || $this->uri->segment(1)=="history"){ echo "det/";}?><?php $u = $this->encryption->encrypt(current($key)); echo base64_encode($u); ?>">
                                                  <div class="icon-container">
                                                    <span class="ti-eye"></span>
                                                  </div>
                                                </a>
                                                <?php
                                              }else if($page_title == "log" || $kategori == "Tenggat") {?>
                                            <?php
                                              } else { ?>
                                                <a href="<?php echo base_url($this->uri->segment(1))?>/<?php if ($this->uri->segment(1)=="Purchase_Order" || $this->uri->segment(1)=="aset" || $this->uri->segment(1)=="history"){ echo "det/";}?><?php $u = $this->encryption->encrypt(current($key)); echo base64_encode($u); ?>">
                                                  <div class="icon-container">
                                                    <span class="ti-eye"></span>
                                                  </div>
                                                </a>

                                                <a name= "<?php $u = $this->encryption->encrypt(current($key)); echo base64_encode($u); if($kategori == "History"){$us = $this->encryption->encrypt($save); echo '/'.base64_encode($us);}?>" data-toggle="modal" data-target="#Modal_Edit"  id = 'btn_updateedit' href="">
                                                  <div class="icon-container">
                                                    <span class="ti-pencil-alt"></span>
                                                  </div>
                                                </a>

                                                <a  id = 'btn_delete' href="<?php echo base_url($this->uri->segment(1))?>/delete/<?php $u = $this->encryption->encrypt(current($key)); echo base64_encode($u); ?>">
                                                  <div class="icon-container">
                                                    <span class="ti-trash"></span>
                                                  </div>
                                                </a>
                                              <?php
                                              }
                                                 ?>

                                                <!-- <br> -->
                                            </td>

                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                      
                                </table>
                                <?php
                                    if ($kategori == "Purchase Order" || $kategori == "Aset" || $kategori == "Vendor" || $kategori == "History"){
                                ?>      <div>
                                            <a href="<?php echo site_url($this->uri->segment(1))?>/<?php if ($this->uri->segment(1)=="Purchase_Order" || $this->uri->segment(1)=="vendor_list"){ echo "add/";}?><?php echo urlencode($kategori)?>">
                                              <button type="button" class="btn bg-nice">
                                                <b>Tambah</b>
                                              </button>
                                            </a>
                                        </div>
                                <?php
                                    }
                                 ?>

                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

<!-- EDIT FORM -->

        <form id="Medit" action="<?php echo base_url()?>crud/update/<?php echo $this->uri->segment(1);?>" method="POST">
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $kategori ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <div>
                        <?php foreach ($content->field_data() as $field): ?>
                          <div class="form-group row">
                            <label class="col-md-2 col-form-label"><?php echo $field->name ?> </label>
                            <?php if($kategori == "Purchase Order"){ ?>

                                <?php if($field->name == "NO SPK" || $field->name == "NAMA PIC" || $field->name == "NAMA VENDOR"){?>
                                    <div class="col-md-10">
                                        <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" readonly >
                                    </div>
                                <?php }else { ?>
                                    <div class="col-md-10">
                                        <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                    </div>
                                <?php } ?>

                            <?php } else if($kategori == "Vendor"){?>
                                <?php if($field->name == "ID"){?>
                                    <div class="col-md-10">
                                        <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" readonly >
                                    </div>
                                <?php }else { ?>
                                    <div class="col-md-10">
                                        <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                    </div>
                                <?php } ?>

                            <?php } else if($kategori == "History"){?>
                                <?php if($field->name == "ID_HISTORY" || $field->name == "SN" || $field->name == "NIK"){?>
                                    <div class="col-md-10">
                                        <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" readonly >
                                    </div>
                                <?php }else { ?>
                                    <div class="col-md-10">
                                        <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                    </div>
                                <?php } ?>
                            <?php } ?>

                            </div>
                        <?php endforeach ?>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button name="submit" type="submit" id="btn_update2" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
        </form>
                <!--END MODAL EDIT-->

        <div class="clearfix"></div>

             <?php $this->load->view("_partials/footer.php") ?>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->

    <script type="text/javascript"></script>


      <?php $this->load->view("_partials/js.php") ?>

</body>
</html>
