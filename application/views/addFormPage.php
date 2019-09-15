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
                                    <li><a href="<?php echo site_url($this->uri->segment(1))?>"> <?php echo $kategori ?> </a></li>
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
                                                                <select name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                                    <option>Pilih...</option>
                                                                    <?php foreach ($idven->result_array() as $sel){ ?>
                                                                        <option value="<?php echo $sel['ID_VENDOR'] ?>"><?php echo $sel['ID_VENDOR']." - ".$sel['NAMA_VENDOR'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            <?php  }else if($field->name == "TAHUN_PENGADAAN"){ ?>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="date" class="form-control" aria-required="true" aria-invalid="false" required>
                                                            <?php  }else if($field->name == "FILE_SPK"){ ?>
                                                                <input id="<?php echo $field->name ?>" name="userfile" type="file" accept=".pdf"class="form-control" aria-required="true" aria-invalid="false" required>
                                                            <?php  }else{ ?>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                            <?php }}else{ ?>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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
                                                                <input name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $idhist; ?>" readonly>
                                                            <?php  }else if($field->name == "NIP"){ ?>
                                                                <select id="history_nip" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                                    <option value="">Pilih</option>
                                                                    <?php foreach ($nip->result_array() as $pgw){ ?>
                                                                        <option value="<?php echo $pgw['NIP'] ?>" ><?php echo $pgw['NIP'].' - '.$pgw['NAMA']?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            <?php  }else if($field->name == "TGL_PINJAM"){ ?>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="date" class="form-control" aria-required="true" aria-invalid="false" required>
                                                              <?php  }else if($field->name == "BUKTI_PEMINJAMAN"){ ?>
                                                                  <input id="<?php echo $field->name ?>" name="userfile" type="file" accept=".pdf"class="form-control" aria-required="true" aria-invalid="false" required>
                                                            <?php  } else{ ?>
                                                                <input name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>
                                                            <?php  } ?>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div><br>

                                            <?php } else if($kategori == "Aset PO"){?>
                                                <!-- form untuk aset po  -->
                                                <div id="readroot0" style="display: none;" class="form-group">
                                                    <input type="button" class="btn btn-danger" value="Remove data" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br /><br />
                                                    <?php foreach ($content->field_data() as $field): ?>
                                                        <label class="control-label mb-1"><?php echo $field->name ?> </label>
                                                        <?php if($field->name == "ID_DA"){ ?>
                                                            <input name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $da ?>" readonly>
                                                        <?php } else if($field->name == "IMAGE"){?>

                                                            <input id="<?php echo $field->name ?>" name="userfile" type="file" accept=".png,.gif,.jpg"class="form-control" aria-required="true" aria-invalid="false">
                                                        <?php } else if($field->name == "ID_PERUSAHAAN"){ ?>
                                                            <select id="pr_list" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                                <option>Pilih</option>
                                                                <?php foreach ($lokasi->result_array() as $lok){ ?>
                                                                    <option value="<?php echo $lok['ID_PERUSAHAAN'] ?>" ><?php echo $lok['NAMA_PERUSAHAAN']?></option>
                                                                <?php } ?>
                                                            </select>
                                                        <?php } else if($field->name == "ID_LOKASI"){ ?>
                                                            <select id="kt_list" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                                <option>Pilih</option>
                                                            </select>
                                                        <?php } else{ ?>
                                                            <input name="<?php echo $field->name ?>" type="text" class="form-control" value="" aria-required="true" aria-invalid="false" >
                                                        <?php } ?><br>
                                                    <?php endforeach ?>
                                                </div>

                                            <?php } else if($kategori == "Detail PO"){?>
                                                <!-- form untuk detail po -->
                                                <div>
                                                    <?php foreach ($content->field_data() as $field): ?>
                                                        <div class="form-group" >
                                                            <label for="cc-payment" class="control-label mb-1"><?php echo $field->name ?> </label>
                                                            <?php if($field->name == "ID_DA"){ ?>
                                                                <input name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $idda;?>" readonly>
                                                            <?php } else if($field->name == "NO_SPK"){ ?>
                                                                <input name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $spk ?>" readonly>
                                                            <?php  }else if($field->name == "MASA"){ ?>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="date" class="form-control" aria-required="true" aria-invalid="false" required>
                                                            <?php } else if($field->name == "KATEGORI"){ ?>
                                                                <select name="<?php echo $field->name ?>" type="text" class="form-control ktg" aria-required="true" aria-invalid="false" required>
                                                                    <option>Pilih...</option>
                                                                    <option value="Hardware" class="hard">Hardware</option>
                                                                    <option value="Software" class="soft">Software</option>
                                                                </select>
                                                            <?php } else{ ?>
                                                                <input name="<?php echo $field->name ?>" type="text" class="form-control" value="" aria-required="true" aria-invalid="false" required >
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
                                                        <!-- khusus history -->
                                                        <?php if($kategori == "History"){?>
                                                            <label for="cc-payment" class="control-label mb-1"> MERK</label>
                                                            <select id="merk-list" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                                <option>Pilih</option>

                                                            </select>
                                                            <br>
                                                            <label for="cc-payment" class="control-label mb-1"> TIPE </label>
                                                            <select id="tipe-list" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                                <option>Pilih</option>

                                                            </select>
                                                        <?php }?><br>

                                                        <?php foreach ($contentdet->field_data() as $field): ?>
                                                            <label for="cc-payment" class="control-label mb-1"><?php echo $field->name ?> </label>
                                                            <?php if($kategori == "History" && $field->name == "SN"){?>
                                                                <select id="mt-list-sn" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                                    <option value="">Pilih</option>

                                                                </select>
                                                            <?php } else if($field->name == "IMAGE"){?>
                                                                <input id="<?php echo $field->name ?>" name="userfile" type="file" accept=".png,.gif,.jpg"class="form-control" aria-required="true" aria-invalid="false">
                                                            <?php } else if($kategori == "Detail PO" && $field->name == "ID_DA"){?>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $idda; ?>" readonly>
                                                            <?php  }else if($kategori == "History" && $field->name == "TGL_TENGGAT"){ ?>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="date" class="form-control" aria-required="true" aria-invalid="false" >
                                                            <?php } else if($field->name == "ID_PERUSAHAAN"){ ?>
                                                                <select id="perusahaan_list"
                                                                name="<?php echo $field->name ?>"
                                                                type="text" class="form-control"
                                                                aria-required="true"
                                                                aria-invalid="false"
                                                                onChange="getCity(this.value);"
                                                                required>
                                                                    <option>Pilih</option>
                                                                    <?php foreach ($lokasi->result_array() as $lok){ ?>
                                                                        <option value="<?php echo $lok['ID_PERUSAHAAN'] ?>" ><?php echo $lok['NAMA_PERUSAHAAN'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            <?php } else if($field->name == "ID_LOKASI"){ ?>

                                                                <select name="<?php echo $field->name ?>"
                                                                        type="text"
                                                                        class="form-control"
                                                                        aria-required="true"
                                                                        aria-invalid="false"
                                                                        required
                                                                        id="city-list">
                                                                        <option value="option1">Select</option>
                                                                        <option value="option2">Select1</option>
                                                                        <option value="option3">Select2</option>

                                                                </select>

                                                            <?php  }else if($field->name == "STATUS"){ ?>
                                                                <select name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                                    <option value="0">Pinjam</option>
                                                                    <option value="2">Servis</option>
                                                                </select>
                                                            <?php }else{?>
                                                                <input id="<?php echo $field->name ?>" name="<?php echo $field->name ?>" type="text" class="form-control" aria-required="true" aria-invalid="false" >
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

    <!-- <script src = "http://code.jquery.com/jquery-latest.min.js" type = "text/javascript"></script> -->
    <?php $this->load->view("_partials/js.php") ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>


    <script>
        $("#history_nip").select2( {
             placeholder: "Pilih",
             allowClear: true
        });
    </script>

    <script type='text/javascript'>
    var base_url = window.location.origin;
    var pathArray = window.location.pathname.split( "/" );

    function getCity(val) {
          // alert("berhasil klik");
          urlx =  base_url+"/"+pathArray[1]+"/po/get_kota_list";
          // alert(urlx);
          // alert(val);
          $.ajax({
          type: "POST",
          url: urlx,
          data: {idp: val},
          success: function(data){
            // alert(data);
            // $('select#city-list').val(null).trigger('change');
            $("select#city-list").find("option").not(":first").remove();
            var jsonStr = data;
            var data = $.parseJSON(jsonStr);
            $(data).each(function(index, datax) {
              console.log(index + " : " + datax.idlokasi + " "+ datax.kota );

                  // $('#city-list').append('<option value="foo" selected="selected">Foo</option>');
                  // $("#city-list option[value='option1']").remove();
                  $('select#city-list').append($("<option></option>").attr("value", datax.idlokasi).text(datax.kota));
                  // $("select#city-list").append('<option value="option6">option6</option>');
            });
          }
          });
        }

        $(document).ready(function(){
            var base_url = window.location.origin;
            var pathArray = window.location.pathname.split( "/" );

            // $("#perusahaan_list").change(function(){
            //     var val = $(this).val();
            //     var urlx = base_url+"/"+pathArray[1]+"/po/get_kota_list";
            //     console.log("ehe"+urlx);
            //     $.ajax({
            //         type: "POST",
            //         url: urlx,
            //         data: {idp: val},
            //         dataType: "json",
            //         success: function(data){
            //             console.log("success : " + JSON.stringify(data) );
            //             $("#kota_list").find("option").not(":first").remove();
            //             $.each(data,function(index,datax){
            //                 $("#kota_list").append('<option value="'+datax["idlokasi"]+'">'+datax["kota"]+'</option>');
            //             });
            //         },
            //         error: function(data) {
            //             alert('kenapa fail');
            //         }
            //     });
            // });



            // $("[name=ID_PERUSAHAAN]").change(function(){
            //     var val = $(this).val();
            //     var urlx = base_url+"/"+pathArray[1]+"/po/get_kota_list";
            //     console.log("ehe"+urlx);
            //     $.ajax({
            //         type: "POST",
            //         url: urlx,
            //         data: {idp: val},
            //         dataType: "json",
            //         success: function(data){
            //             console.log("success : " + JSON.stringify(data) );
            //             $("[name=ID_LOKASI]").find("option").not(":first").remove();
            //             $.each(data,function(index,datax){
            //                 $("[name=LOKASI]").append('<option value="'+datax["idlokasi"]+'">'+datax["kota"]+'</option>');
            //             });
            //         },
            //         error: function(data) {
            //             alert('kenapa fail');
            //         }
            //     });
            // });
        });
    </script>

    <script type='text/javascript'>
        $(document).ready(function(){
            var base_url = window.location.origin;
            var pathArray = window.location.pathname.split( "/" );

            $("#history_nip").change(function(){
                const startTime = performance.now();
                var urlx = base_url+"/"+pathArray[1]+"/history";
                var val = $(this).val();
                $.ajax({
                    type: "POST",
                    url: urlx+"/get_merk",
                    data: {nip: val},
                    dataType : "json",
                    success: function(data){
                        console.log("success : " + JSON.stringify(data) );
                        $("#merk-list").find("option").not(":first").remove();
                        $("#tipe-list").find("option").not(":first").remove();
                        $("#mt-list-sn").find("option").not(":first").remove();
                        $.each(data, function(index,datax){
                            $("#merk-list").append("<option value="+val+"|"+datax.merk+">"+datax.merk+"</option>");
                        });
                        const duration = performance.now() - startTime;
                        console.log(`ajaxhistorynip took ${duration}ms`);
                    },
                    error: function(data) {
                        alert('kenapa fail luar');
                    }
                });
            });

            $("#merk-list").change(function(){
                const startTime = performance.now();
                var val = $(this).val();
                var urlx = base_url+"/"+pathArray[1]+"/history";
                var valex = val.split("|");
                var nip = valex[0];
                var merk = valex[1];
                $.ajax({
                    type: "POST",
                    url: urlx+"/get_tipe",
                    data: {nip: nip, merk: merk},
                    dataType : "json",
                    success: function(data){
                        console.log("success : " + JSON.stringify(data) );
                        $('#tipe-list').find('option').not(':first').remove();
                        $('#mt-list-sn').find('option').not(':first').remove();
                        $.each(data,function(index,datax){
                            $('#tipe-list').append('<option value="'+val+'|'+datax["merk"]+'|'+datax["tipe"]+'|'+datax["series"]+'">'+datax["merk"]+' '+datax["tipe"]+' '+datax["series"]+'</option>');
                        });
                        const duration = performance.now() - startTime;
                        console.log(`someMethodIThinkMightBeSlow took ${duration}ms`);
                    },
                    error: function(data){
                        alert("fail dalam");
                    }
                });
            });

            $("#tipe-list").change(function(){
                var val = $(this).val();
                var valex = val.split("|");
                var nip = valex[0];
                var merk_nm = valex[1];
                var tipe_nm = valex[2];
                var seri_nm = valex[3];
                var urll = base_url+"/"+pathArray[1]+"/history/get_sn_mts";
                $.ajax({
                    type: "POST",
                    url: urll,
                    data: {nip: nip, merk_nm: merk_nm, tipe_nm: tipe_nm, seri_nm: seri_nm},
                    dataType : "JSON",
                    success: function(data){
                        console.log("success : " + JSON.stringify(data) );
                        $('#mt-list-sn').find('option').not(':first').remove();
                        $.each(data,function(index,datax){
                            $('#mt-list-sn').append('<option value="'+datax["sn"]+'">'+datax["sn"]+'</option>');
                        });
                    },
                    error: function(data) {
                        alert('kenapa fail');
                    }
                });
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
                // console.log(newField[i].name);
            }
            // console.log(newField.length);
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
                //console.log(newField[i].name);
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



</body>
</html>
