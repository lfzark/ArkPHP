
<!-- jQuery 2.2.3 -->
<script src="<!--{PUBLIC_PATH}-->/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<!--{PUBLIC_PATH}-->/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<!--{PUBLIC_PATH}-->/dist/js/app.min.js"></script>
<!-- PACE -->
<script src="<!--{PUBLIC_PATH}-->/plugins/pace/pace.min.js"></script>
<!-- bootstrap-select -->
<script src="<!--{PUBLIC_PATH}-->/plugins/bootstrap-select/bootstrap-select.js"></script>
<!-- ChartJS -->
<script src="<!--{PUBLIC_PATH}-->/plugins/chartjs/Chart.min.js"></script>
<script src="<!--{PUBLIC_PATH}-->/plugins/fastclick/fastclick.js"></script>

<!-- Datatables -->
<script src="<!--{PUBLIC_PATH}-->/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<!--{PUBLIC_PATH}-->/plugins/datatables/jquery.dataTables.js"></script>

<!-- Toastr -->
<script src="<!--{PUBLIC_PATH}-->/plugins/toastr/toastr.min.js"></script>
<!-- MyPluginModalJS -->
<script src="<!--{PUBLIC_PATH}-->/action_js/modal_j.js"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

<script type="text/javascript">
$(document).ajaxStart(function() { Pace.restart(); });
var action_url = '<!--{ACTION_URL}-->';
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "rtl": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 2000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>