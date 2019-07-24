<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("_partials/head.php") ?>
    <style>
        label{
            font-weight: bold;
        }
    </style>
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
                                        <!-- <form action="<?php echo base_url()?>crud/<?php if($page_title == 'PO Detail' || $page_title == 'History Detail'){echo $this->uri->segment(1).'Detail';}else{echo $this->uri->segment(1);}?><?php if($this->uri->segment(1) == 'aset'){?>/javascript:count<?php }?>" method="post"> -->

                                        <form action="" method="post" id="act" onsubmit="test();" enctype="multipart/form-data">
                                            <!-- form awal untuk vendor  -->
                                            <?php if($kategori == "Vendor" || $kategori == "Purchase Order"){?>
                                                <div>
                                                    <?php foreach ($content->field_data() as $field): ?>
                                                        <div class="form-group" >
                                                            <label for="cc-payment" class="control-label mb-1"><?php echo $field->name ?> </label>
                                                            <?php if($kategori == "Purchase Order"){?>
                                                                <?php if($field->name == "ID_VENDOR"){ ?>
                                                                <select name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                                                    <option>Pilih...</option>
                                                                    <?php foreach ($idven->result_array() as $sel){ ?>
                                                                        <option value="<?php echo $sel['ID_VENDOR'] ?>" ><?php echo $sel['ID_VENDOR']." ".$sel['NAMA_VENDOR'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            <?php  }else{ ?>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                                            <?php }}else{ ?>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                                            <?php }?>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>

                                            <?php } else if($kategori == "History"){ ?>
                                                <!-- form awal untuk history -->
                                                <div>
                                                    <?php foreach ($content->field_data() as $field): ?>
                                                        <div class="form-group" >
                                                            <label for="cc-payment" class="control-label mb-1"><?php echo $field->name ?> </label>
                                                            <?php if($field->name == "ID_HISTORY"){ ?>
                                                                <input name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $idhist + 1; ?>" readonly>
                                                            <?php } else if($field->name == "ID_VENDOR"){ ?>
                                                                <select name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                                                    <option>Pilih...</option>
                                                                    <?php foreach ($idven->result_array() as $sel){ ?>
                                                                        <option value="<?php echo $sel['ID_VENDOR'] ?>" ><?php echo $sel['NAMA_VENDOR'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            <?php  } else{ ?>
                                                                <input name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                                            <?php  } ?>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>

                                            <?php } else if($kategori == "Aset PO"){?>
                                                <!-- form untuk aset po  -->
                                                <div id="readroot0" style="display: none;" class="form-group">
                                                    <input type="button" class="btn btn-danger" value="Remove data" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br /><br />
                                                    <?php foreach ($content->field_data() as $field): ?>
                                                        <label class="control-label mb-1"><?php echo $field->name ?> </label>
                                                        <?php if($field->name == "ID_DA"){ ?>
                                                            <input name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $da ?>" readonly>
                                                        <?php } else if($field->name == "IMAGE"){?>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="file" accept=".png,.gif,.jpg"class="form-control" aria-required="true" aria-invalid="false">
                                                        <?php } else{ ?>
                                                            <input name="<?php echo $field->name ?>" type="text" class="form-control" value="" aria-required="true" aria-invalid="false" >
                                                        <?php } ?><br>
                                                    <?php endforeach ?>
                                                </div>

                                            <?php } else if($kategori == "Detail PO"){?>
                                                <div>
                                                    <?php foreach ($content->field_data() as $field): ?>
                                                        <div class="form-group" >
                                                            <label for="cc-payment" class="control-label mb-1"><?php echo $field->name ?> </label>
                                                            <?php if($field->name == "ID_DA"){ ?>
                                                                <input name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $idda + 1;?>" readonly>
                                                            <?php } else if($field->name == "NO_SPK"){ ?>
                                                                <input name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $spk ?>" readonly>
                                                            <?php } else if($field->name == "KATEGORI"){ ?>
                                                                <select name="<?php echo $field->name ?>" type="text" class="form-control ktg" aria-required="true" aria-invalid="false" >
                                                                    <option>Pilih...</option>
                                                                    <option value="Hardware" class="hard">Hardware</option>
                                                                    <option value="Software" class="soft">Software</option>
                                                                </select>
                                                            <?php } else if($field->name == "SUB_KATEGORI"){ ?>
                                                                <select name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                                                    <option>Pilih...</option>
                                                                    <?php $v = 1; ?>
                                                                    <?php foreach ($subktg->result_array() as $sel){ ?>
                                                                        <option value="<?php echo $sel['SUB_KATEGORI'] ?>" class="<?php echo 'sub'.$v; $v++;?>"><?php echo $sel['SUB_KATEGORI'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            <?php } else{ ?>
                                                                <input name="<?php echo $field->name ?>" type="text" class="form-control" value="" aria-required="true" aria-invalid="false" >
                                                            <?php } ?>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>
                                            <?php } ?>

                                            <!-- form detail tambahan -->
                                            <?php
                                                if($kategori == "Detail PO" || $kategori == "History" || $kategori == "Aset PO"){
                                            ?>
                                                <?php if($kategori != "Aset PO"){ ?>
                                                    <div id="readroot1" style="display: none;" class="form-group">
                                                        <input type="button" class="btn btn-danger" value="Remove detail" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br /><br />
                                                        <?php foreach ($contentdet->field_data() as $field): ?>
                                                            <label for="cc-payment" class="control-label mb-1"><?php echo $field->name ?> </label>
                                                            <?php if($field->name == "IMAGE"){?>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="file" accept=".png,.gif,.jpg"class="form-control" aria-required="true" aria-invalid="false">
                                                            <?php }else{?>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                                            <?php } ?>
                                                            <br>
                                                        <?php endforeach ?>
                                                    </div>
                                                <?php  } ?>

                                                <!-- tempat untuk clone -->
                                                <span id="writeroot"></span>

                                                <?php if($kategori == "Aset PO"){ ?>
                                                    <div class="icon-container" onclick="moreFields0()">
                                                        <span class="ti-plus"  ></span><span class="icon-name"> Aset</span>
                                                    </div>
                                                <?php } else if($kategori == "Detail PO"){ ?>
                                                    <div class="icon-container" onclick="moreFields()">
                                                        <span class="ti-plus"  ></span><span class="icon-name"> Aset</span>
                                                    </div>
                                                <?php } else{ ?>
                                                    <div class="icon-container" onclick="moreFields()">
                                                        <span class="ti-plus"  ></span><span class="icon-name"> Detail</span>
                                                    </div>
                                                <?php }?>

                                                <br> <br>
                                                <!-- tombol submit -->
                                                <div>
                                                    <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <span id="payment-button-amount">Save</span>
                                                    </button>
                                                </div>

                                            <?php } else{ ?>
                                                <!-- tombol submit -->
                                                <div>
                                                    <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <span id="payment-button-amount">Save</span>
                                                    </button>
                                                </div>
                                            <?php } ?>
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

    <script src = "http://code.jquery.com/jquery-latest.min.js" type = "text/javascript"></script>
    <script>
        $(function(){
            $("select.ktg").change(function(){
                var sub = $('select.ktg').val();
                if(sub == "Hardware"){
                    for (var i = 1; i <= 6; i++) {  //$v = 4 hardware, $v 5-6 soft            
                        if(i < 5)
                            $('.sub'+i).show();
                        else
                            $('.sub'+i).hide();
                    }
                }else if(sub == "Software"){
                    for (var i = 1; i <= 6; i++) {
                        if(i < 5)
                            $('.sub'+i).hide();
                        else
                            $('.sub'+i).show();
                    }
                }
            });
        });    
    </script>

    <script type='text/javascript'>
        var counter = 0;
        var flag = 0;
        var count = 0;

        //clone utk aset PO
        function moreFields0() {
            count++;
            var newFields = document.getElementById('readroot0').cloneNode(true);
            newFields.id = '';
            newFields.style.display = 'block';
            var newField = newFields.childNodes;
            for (var i=0;i<newField.length;i++) {
                var theName = newField[i].name
                if (theName){
                    newField[i].name = theName + count;
                }
                console.log(newField[i].name);
            }
            console.log(newField.length);
            var insertHere = document.getElementById('writeroot');
            insertHere.parentNode.insertBefore(newFields,insertHere);
        }

        //clone detail
        function moreFields() {
            counter++;
            var newFields = document.getElementById('readroot1').cloneNode(true);
            newFields.id = '';
            newFields.style.display = 'block';
            var newField = newFields.childNodes;
            for (var i=0;i<newField.length;i++) {
                var theName = newField[i].name
                if (theName){
                    newField[i].name = theName + counter;
                }
                console.log(newField[i].name);
            }
            var insertHere = document.getElementById('writeroot');
            insertHere.parentNode.insertBefore(newFields,insertHere);
        }

        function test(){
            document.getElementById('act').action = '<?php echo base_url()?>crud/<?php echo $this->uri->segment(1);?><?php if($this->uri->segment(1) == "aset"){?>/' + count + '<?php } else if($this->uri->segment(1) == "history" || $this->uri->segment(1) == "po"){?>/' + counter + '<?php } ?>';
        }
        
        <?php if($kategori == "Aset PO"){ ?> 
            window.onload = moreFields0;
        <?php } else if($kategori != "Vendor"){ ?>
            window.onload = moreFields;
        <?php } ?>

        

    </script>

    <?php $this->load->view("_partials/js.php") ?>

</body>
</html>
