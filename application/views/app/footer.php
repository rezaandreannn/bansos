   <!--**********************************
            Footer start
        ***********************************-->
   <div class="footer">
       <div class="copyright">
           <p>Copyright &copy; <?= date('Y'); ?></p>
       </div>
   </div>
   <!--**********************************
            Footer end
        ***********************************-->
   </div>
   <!--**********************************
        Main wrapper end
    ***********************************-->

   <!--**********************************
        Scripts
    ***********************************-->
   <script src="<?= base_url('assets'); ?>/plugins/common/common.min.js"></script>
   <script src="<?= base_url('assets'); ?>/js/custom.min.js"></script>
   <script src="<?= base_url('assets'); ?>/js/settings.js"></script>
   <script src="<?= base_url('assets'); ?>/js/gleek.js"></script>
   <script src="<?= base_url('assets'); ?>/js/styleSwitcher.js"></script>

   <!-- Chartjs -->
   <script src="<?= base_url('assets'); ?>/plugins/chart.js/Chart.bundle.min.js"></script>
   <script src="<?= base_url('assets'); ?>/plugins/chartist/js/chartist.min.js"></script>
   <script src="<?= base_url('assets'); ?>/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
   <script src="<?= base_url('assets'); ?>/js/dashboard/dashboard-1.js"></script>
   <!-- Circle progress -->
   <script src="<?= base_url('assets'); ?>/plugins/circle-progress/circle-progress.min.js"></script>
   <!-- Morrisjs -->
   <script src="<?= base_url('assets'); ?>/plugins/raphael/raphael.min.js"></script>
   <script src="<?= base_url('assets'); ?>/plugins/morris/morris.min.js"></script>

   <!-- Pignose Calender -->
   <script src="<?= base_url('assets'); ?>/plugins/moment/moment.min.js"></script>
   <script src="<?= base_url('assets'); ?>/plugins/pg-calendar/js/pignose.calendar.min.js"></script>

   <!-- data table -->
   <script src="<?= base_url('assets'); ?>/plugins/tables/js/jquery.dataTables.min.js"></script>
   <script src="<?= base_url('assets'); ?>/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
   <script src="<?= base_url('assets'); ?>/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>



   <!-- script input kpm bermasalah -->
   <script>
       $(document).ready(function() {
           $(document).on('click', '#select', function() {
               var id = $(this).data('id');
               var ktp = $(this).data('ktp');
               var nama = $(this).data('nama');


               $('#id_input').val(id);
               $('#ktp_input').val(ktp);
               $('#nama_input').val(nama);
               $('#tambahKpmBermasalah').modal('hide');
           })
       })
   </script>

   </body>

   </html>