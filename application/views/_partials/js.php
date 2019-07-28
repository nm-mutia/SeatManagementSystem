<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<!--
<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script> -->



<!--  Chart js -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script> -->

<!--Chartist Chart-->
<!-- <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script> -->
<!-- <script src="assets/js/init/weather-init.js"></script> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/js/lib/data-table/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/init/datatables-init.js"></script>

<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/jquery-3.3.1.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/dataTables.fixedColumns.min.js"></script>




<!--Local Stuff-->
<script>

    $("#main-menu ul li a").on("click", function(e){
      // alert( "kok manggil teris" );
        $("#main-menu li.active").removeClass("active");
        var $parent = $(this).parent();
        $parent.addClass('active');
         // e.preventDefault();
         // return false;
    });
</script> 
