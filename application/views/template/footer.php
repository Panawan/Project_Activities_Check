<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2019 <!-- <a href="https://adminlte.io">AdminLTE</a> -->.</strong> <!-- All rights
    reserved.  ||
    <a href="https://devbanban.com/" target="_blank"> devbanban.com </a>
      || <a href="https://devbanban.com/?p=2867" target="_blank"> คอร์ส codeigniter </a> -->
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
       <!-- devbanban.com -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>asset/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>asset/toastr-master/build/toastr.min.js"></script>
</body>
</html>

<script>
$(document).ready(function() {
$('#example1').DataTable( {
"aaSorting" :[[0,'asc']],
//"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
});
} );

</script>
<script>
$(function () {
$('#example1').DataTable()
$('#example2').DataTable({
'paging'      : true,
'lengthChange': false,
'searching'   : false,
'ordering'    : true,
'info'        : true,
'autoWidth'   : false
})
})
</script>

<!-- <script type="text/javascript">
  <?php if ($this->session->flashdata('save_success')): ?>
  swal("", "บันทึกข้อมูลเรียบร้อยแล้ว", "success");
   <?php endif; ?>

   <?php if ($this->session->flashdata('warning_duplicate')): ?>
  swal("", "ข้อมูลซ้ำ!!! คุณได้เช็คชื่อของวันนี้เรียบร้อยแล้ว", "warning");
   <?php endif; ?>

   <?php if ($this->session->flashdata('wrong_alert')): ?>
  swal("", "เกิดข้อผิดพลาด!!!", "warning");
   <?php endif; ?>

   <?php if ($this->session->flashdata('del_success')): ?>
  swal("", "ลบข้อมูลเรียบร้อยแล้ว", "success");
   <?php endif; ?>

   <?php if ($this->session->flashdata('check_duplicate')): ?>
  swal("", "ข้อมูลซ้ำ!!!", "warning");
   <?php endif; ?>


   <?php if ($this->session->flashdata('login_error')): ?>
  swal("", "Username หรือ Password ไม่ถูกต้อง", "warning");
   <?php endif; ?>


   <?php if ($this->session->flashdata('logout_success')): ?>
  swal("", "Logout สำเร็จ", "success");
   <?php endif; ?>

</script> -->




