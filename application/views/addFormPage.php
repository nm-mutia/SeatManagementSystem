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
                                <h1><?php echo $kategori ?></h1>
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
                                <strong class="card-title"><?php echo $kategori ?></strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Tambah Data <?php echo $kategori ?></h3>
                                        </div>
                                        <hr>
                                        <form action="<?php echo base_url()?>crud/<?php if($page_title == 'PO Detail' || $page_title == 'History Detail'){echo $this->uri->segment(1).'Detail';}else{echo $this->uri->segment(1);}?>" method="post"  >

                                            <?php foreach ($content->field_data() as $field): ?>
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1"><?php echo $field->name ?> </label>
                                                    <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" required = "true">
                                                </div>
                                            <?php endforeach ?>


                                            <?php
                                                if($kategori == "Purchase Order" || $kategori == "History"){
                                            ?>
                                                    <div id="readroot" style="display: none;">
                                                        <input type="button" class="btn btn-danger" value="Remove detail" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br /><br />
                                                        <?php foreach ($contentdet->field_data() as $field): ?>
                                                            <div class="form-group" >
                                                                <label for="cc-payment" class="control-label mb-1"><?php echo $field->name ?> </label>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                                            </div>
                                                        <?php endforeach ?>
                                                    </div>

                                                    <?php
                                                        if($kategori == "Purchase Order"){
                                                    ?>
                                                        <div id="readroot2" style="display: none;">
                                                            <input type="button" class="btn btn-danger" value="Remove aset" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br /><br />
                                                            <?php foreach ($contentaset->field_data() as $field): ?>
                                                                <div class="form-group" >
                                                                    <label for="cc-payment" class="control-label mb-1"><?php echo $field->name ?> </label>
                                                                    <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                                                </div>
                                                            <?php endforeach ?>
                                                        </div>
                                                    <?php
                                                        }
                                                    ?>

                                                    <span id="writeroot"></span>

                                                    <!-- <a href="<?php echo site_url($this->uri->segment(1))?>/<?php echo $this->uri->segment(2)?>/<?php if ($this->uri->segment(3)!=null){ echo $this->uri->segment(3)?>/<?php } ?><?php echo 'addDetail'?>"><button type="button" class="btn btn-success">Tambah Detail <?php echo $page_title?></button></a> -->

                                                    <button type="button" class="btn btn-success" onclick="moreFields()">Tambah Detail</button>
                                                    <?php
                                                        if($kategori == "Purchase Order"){
                                                    ?>
                                                        <button type="button" class="btn btn-success" onclick="moreFields2()">Tambah Aset</button>
                                                    <?php
                                                        }
                                                    ?>

                                                    <br> <br>
                                                    <div>
                                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                            <span id="payment-button-amount">Save</span>
                                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                        </button>
                                                    </div>
                                            <?php
                                                }
                                                else{
                                            ?>
                                                    <div>
                                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                            <span id="payment-button-amount">Save</span>
                                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                        </button>
                                                    </div>
                                            <?php
                                                }
                                             ?>

                                        </form> <!-- endform -->
                                    </div>

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

    <script type='text/javascript'>
        var counter = 0;
        var flag = 0;

        function moreFields() {
            counter++;
            var newFields = document.getElementById('readroot').cloneNode(true);
            newFields.id = '';
            newFields.style.display = 'block';
            var newField = newFields.childNodes;
            for (var i=0;i<newField.length;i++) {
                var theName = newField[i].name
                if (theName)
                    newField[i].name = theName + counter;
            }
            var insertHere = document.getElementById('writeroot');
            insertHere.parentNode.insertBefore(newFields,insertHere);
        }

        function moreFields2() {
            flag++;
            var newFields = document.getElementById('readroot2').cloneNode(true);
            newFields.id = '';
            newFields.style.display = 'block';
            var newField = newFields.childNodes;
            for (var i=0;i<newField.length;i++) {
                var theName = newField[i].name
                if (theName)
                    newField[i].name = theName + flag;
            }
            var insertHere = document.getElementById('writeroot');
            insertHere.parentNode.insertBefore(newFields,insertHere);
        }
        // window.onload = moreFields;
    </script>

    <?php $this->load->view("_partials/js.php") ?>

</body>
</html>
