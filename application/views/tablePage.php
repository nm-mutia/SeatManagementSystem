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
                                <h1><?php echo $kategori ?></h1>
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
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?php echo $kategori ?></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                          <!-- <th></th> -->
                                    <?php foreach ($content->field_data() as $field): ?>
                                            <th><?php echo $field->name ?> </th>
                                            <!-- <th> Keterangan </th> -->
                                    <?php endforeach ?>
                                            <th> KETERANGAN </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($content->result_array() as $key): ?>
                                        <tr>
                                          <!-- <td></td> -->
                                            <?php foreach ($key as $key1): ?>
                                            <td> <?php echo $key1 ; ?></td>
                                            <?php endforeach ?>
                                            <td>
                                                <a href="<?php echo base_url($this->uri->segment(1))?>/<?php if ($this->uri->segment(1)=="aset" || $this->uri->segment(1)=="history"){ echo "det/";}?><?php $u = $this->encryption->encrypt(current($key)); echo base64_encode($u); ?>"><button type="button" class="btn btn-success">Detail</button></a>
                                                <a  id = 'btn_delete' href="<?php echo base_url($this->uri->segment(1))?>/delete/<?php $u = $this->encryption->encrypt(current($key)); echo base64_encode($u); ?>"><button type="button" class="btn btn-success">Delete</button></a>
                                                <a name= "<?php $u = $this->encryption->encrypt(current($key)); echo base64_encode($u); ?>" data-toggle="modal" data-target="#Modal_Edit"  id = 'btn_update' href=""><button type="button" class="btn btn-success">Edit</button></a>
                                                <!-- <button id = 'btn_delete'>delete</button> -->

                                            </td>

                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                                <?php
                                    if ($kategori == "Purchase Order" || $kategori == "Aset" || $kategori == "Vendor" || $kategori == "History"){
                                ?>      <div>
                                            <a href="<?php echo site_url($this->uri->segment(1))?>/<?php if ($this->uri->segment(1)=="Purchase_Order" || $this->uri->segment(1)=="vendor_list"){ echo "add/";}?><?php echo urlencode($kategori)?>"><button type="button" class="btn btn-success">Tambah</button></a>
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
        <form>
                    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <div>
                                <?php foreach ($content->field_data() as $field): ?>
                                  <div class="form-group row">
                                        <label class="col-md-2 col-form-label"><?php echo $field->name ?> </label>
                                        <?php if($field->name == "ID"){?>
                                        <div class="col-md-10">
                                            <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" placeholder="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" readonly >
                                          </div>

                                          <?php }else { ?>
                                              <div class="col-md-10">
                                            <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" placeholder="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                          <?php } ?>
                                    </div>
                                <?php endforeach ?>
                            </div>
<!--
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Product Code</label>
                                    <div class="col-md-10">
                                      <input type="text" name="product_code_edit" id="product_code_edit" class="form-control" placeholder="Product Code" readonly>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Product Name</label>
                                    <div class="col-md-10">
                                      <input type="text" name="product_name_edit" id="product_name_edit" class="form-control" placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Price</label>
                                    <div class="col-md-10">
                                      <input type="text" name="price_edit" id="price_edit" class="form-control" placeholder="Price">
                                    </div>
                                </div> -->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
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

    <script type="text/javascript">

      //   $(document).ready(function() {
      //     // $('#bootstrap-data-table-export').DataTable();
      //
      // } );


  </script>


      <?php $this->load->view("_partials/js.php") ?>

</body>
</html>
