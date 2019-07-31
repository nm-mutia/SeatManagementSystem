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
                                    <li><a href="<?php echo base_url($this->uri->segment(1))?>/<?php  echo "det/"; echo $this->uri->segment(3); ?>"><?php echo $subkategori ?></a></li>
                                    <li class="active"><?php echo $subsubkategori ?></li>

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
                                          <?php if ($kategori != "Aset Keseluruhan"){
                                            ?>
                                            <!-- <th> image </th> -->
                                            <th> Action </th>
                                          <?php }?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($content->result_array() as $key): ?>
                                        <tr>


                                            <?php foreach ($key as $idnya => $key1): ?>
                                              <?php if($idnya == "IMAGE") {?>
                                                <?php if($key1 == null) {?>
                                                  <td> <img src="<?php echo base_url();?>images/noimage.png"/> </td>
                                              <?php }else { ?>

                                                <td> <img src="data:image/jpeg;base64,<?php $key1 = base64_encode($key1); echo $key1; ?>"/> </td>

                                              <?php } ?>

                                                <!-- <td> hallo</td> -->
                                              <?php
                                            }else{?>
                                              <td> <?php echo $key1 ; ?></td>

                                            <?php } ?>
                                            <?php endforeach ?>
                                      <?php if ($kategori != "Aset Keseluruhan"){?>
                                            <td>
                                              <?php if($kategori == "Purchase Order"){ ?>
                                                <a name= "po/<?php $u = $this->encryption->encrypt(current($key)); echo base64_encode($u);?>" data-toggle="modal" data-target="#Modal_Edit"  id = 'btn_updateedit' href="">
                                                  <div class="icon-container">
                                                    <span class="ti-pencil-alt"></span>
                                                  </div>
                                                </a>
                                          <?php    }else{ ?>
                                            <a name= "<?php $u = $this->encryption->encrypt(current($key)); echo base64_encode($u);?>" data-toggle="modal" data-target="#Modal_Edit"  id = 'btn_updateedit' href="">
                                              <div class="icon-container">
                                                <span class="ti-pencil-alt"></span>
                                              </div>
                                            </a>

                                          <?php    } ?>
                                              <a  id = 'btn_delete' href="<?php echo base_url($this->uri->segment(1))?>/deleteAset/<?php $u = $this->encryption->encrypt(current($key)); echo base64_encode($u); ?>">
                                                <div class="icon-container">
                                                  <span class="ti-trash"></span><span class="icon-name"></span>
                                                </div>
                                              </a>

                                            </td>
                                      <?php }?>

                                        </tr>


                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                                <?php
                                   if ($kategori == 'Purchase Order'){
                                ?>
                                    <a href="<?php echo base_url()?>aset/<?php echo "addAset/".$this->uri->segment(4);?>"><button type="button" class="btn btn-success">Tambah Aset</button></a>
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

            <form id="Medit" action="<?php echo base_url()?>crud/update/<?php if($this->uri->segment(1) == "Purchase_Order"){ echo 'asetpo';}else{echo $this->uri->segment(1);}?>" method="POST">
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
                                <?php if($field->name != "IMAGE"){ ?> 
                                  <label class="col-md-2 col-form-label"><?php echo $field->name ?> </label>

                                <?php }if($field->name == "SN" || $field->name == "MASA" ){?>
                                    <div class="col-md-10">
                                        <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" readonly >
                                    </div>
                                <?php } else if($field->name == "NAMA_PERUSAHAAN" || $field->name == "ID_PERUSAHAAN"){?>
                                    <div class="col-md-10">
                                        <select id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            <?php foreach ($lokasi->result_array() as $lok): ?>
                                                <option value="<?php echo $lok['ID_PERUSAHAAN'] ?>"> <?php echo $lok['NAMA_PERUSAHAAN'].' - '.$lok['KOTA'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                <?php }else if($field->name == "IMAGE"){ ?>
                                    <div class="col-md-10" style="display: none;">
                                        <!-- <input type="hidden"> -->
                                    </div>
                                <?php }else { ?>
                                    <div class="col-md-10">
                                        <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                    </div>
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
    <!-- Scripts -->

    <!-- <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script> -->
      <?php $this->load->view("_partials/js.php") ?>

</body>
</html>
