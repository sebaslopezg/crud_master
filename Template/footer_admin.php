  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
    <!--<strong>ECOSOFT</strong> 2025-->
    </div>
    <div class="credits">
      <p>ADSO 2025</p>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script>
  let base_url = '<?= BASE_URL ?>'
  </script>
  <script src="<?= media() ?>/vendor/jquery/jquery-3.7.1.min.js"></script>
  <script src="<?= media() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <script src="<?= media() ?>/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= media() ?>/vendor/sweetalert/sweetalert2.all.min.js"></script>

  <!-- dataTables-->
  <script src="<?= media() ?>/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= media() ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- CHARTS -->
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
<!--
  <script src="<?= media() ?>/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <script src="assets/vendor/quill/quill.js"></script> 
  
  <script src="/vendor/simple-datatables/simple-datatables.js"></script>
  
  <script src="assets/vendor/php-email-form/validate.js"></script>
  
  
  
  -->

  <!-- Template Main JS File -->
  <script src="<?= media() ?>/js/main.js"></script>
  <?php getScriptSession() ?>
  <script src="<?= media() ?>/js/app.js"></script>
  <?php if(array_key_exists('script',$data)): ?>
    <script type="module" src="<?= media() ?>/js/<?= $data['script'] ?>.js"></script>
  <?php endif; ?>

</body>

</html>