    </div> <!-- layout-container -->
</div> <!-- layout-inner -->

<script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/popper/popper.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/js/layout-helpers.js') ?>"></script>
<script src="<?= base_url('assets/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
<script src="<?= base_url('assets/js/sidenav.js') ?>"></script>
<script src="<?= base_url('assets/js/pace.js') ?>"></script>
<script src="<?= base_url('assets/js/material-ripple.js') ?>"></script>
<script src="<?= base_url('assets/js/demo.js') ?>"></script>
<script src="<?= base_url('assets/js/pages/forms_input-groups.js') ?>"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

  

<!-- Aktifkan DataTables -->
<script>
  $(document).ready(function() {
    $('#datatable').DataTable({
      "pageLength": 10,
      "lengthChange": true,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
