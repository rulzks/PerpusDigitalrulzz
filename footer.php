<footer class="main-footer">
  <strong>Copyright Rekayasa Perangkat Lunak &COPY; <?= date('Y'); ?></strong>
  All Rights Reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>M.Syahrul26</b> 1.0.0
    <div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control siebar -->
</div>
<!-- ./wrapper -->

<!-- jquery -->
  <script src=<?=base_url("assets/plugins/jquery/jquery.min.js");?>></script>
  <!-- jquery UI 1.11.4 -->
  <script src=<?=base_url("assets/plugins/jquery-ui/jquery-ui.min.js");?>></script>
  <!-- resolve conflict in jquery UI tooltip with boostrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Booststrap 4 -->
  <script src=<?=base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js");?>></script>
  <!-- Booststrap 4 -->
  <script src=<?=base_url("assets/plugins/chart.js/Chart.min.js");?>></script>
  <!-- Booststrap 4 -->
  <script src=<?=base_url("assets/plugins/sparklines/sparkline.js");?>></script>
  <!-- Booststrap 4 -->
  <script src=<?=base_url("assets/plugins/jqvmap/jquery.vmap.min.js");?>></script>
  <script src=<?=base_url("assets/plugins/jqvmap/maps/jquery.vmap.usa.js");?>></script>
   <!-- Booststrap 4 -->
  <script src=<?=base_url("assets/plugins/jquery-knob/jquery.knob.min.js");?>></script>
   <!-- Booststrap 4 -->
  <script src=<?=base_url("assets/plugins/moment/moment.min.js");?>></script>
  <script src=<?=base_url("assets/plugins/daterangepicker/daterangepicker.js");?>></script>
   <!-- Booststrap 4 -->
  <script src=<?=base_url("assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js");?>></script>
   <!-- Booststrap 4 -->
  <script src=<?=base_url("assets/plugins/summernote/summernote-bs4.min.js");?>></script>
   <!-- Booststrap 4 -->
  <script src=<?=base_url("assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js");?>></script>
   <!-- AdminTE App -->
  <script src=<?=base_url("assets/template/backend/dist/js/adminlte.js");?>></script>
   <!-- AdminTE Dashboard demo (This is only for demo purposes) -->
  <script src=<?=base_url("assets/template/backend/dist/js/pages/dashboard.js");?>></script>

   <script src=<?=base_url("assets/plugins/datatables/jquery.dataTables.min.js");?>></script>
   <script src=<?=base_url("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js");?>></script>
   <script src=<?=base_url("assets/plugins/datatables-responsive/js/datatables.responsive.min.js");?>></script>
   <script src=<?=base_url("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js");?>></script>
   <script src=<?=base_url("assets/plugins/datatables-buttons/js/dataTables.buttons.min.js");?>></script>
   <script src=<?=base_url("assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js");?>></script>

   <script src=<?=base_url("assets/plugins/select2/js/select2.full.min.js");?>></script>

   <script>
    $(function () {
      $("#tabel").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv","excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      });
      $(function () {

        //initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
      }):
   </script>
 </body>
</html>
