<<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Class</title>
  <!-- Add these lines in the <head> section of your HTML -->
  <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/dist/toastr.min.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>asset/toastr-master/build/toastr.min.js"></script>

</head>
<body>
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> ฟอร์มแก้ไขข้อมูล </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body table-responsive">
                  <form action="<?php echo site_url('teacher/updateSubject');?>" method="post" >
                    <div class="form-group">
                      <label for="s_name">ชื่อห้อง:</label>
                      <input type="text" class="form-control" name="s_name" placeholder="Enter Class Name" value="<?= $rsedit->s_name; ?>">
                    </div>
                    <div class="form-group">
                      <label for="ref_teacher_id">รหัสของอาจารย์ประจำห้อง:</label>
                      <input type="text" class="form-control" name="ref_teacher_id" placeholder="Enter Teacher_id as a reference" value="<?= $rsedit->ref_teacher_id; ?>">
                    </div>

                    <span class="fr"><?= form_error('s_id'); ?></span>
                    <input type="hidden" name="s_id" value="<?= $rsedit->s_id; ?>">
                    <input type="submit" class="btn btn-success"/>
                    <a class="btn btn-danger" href="<?php echo site_url('teacher'); ?>" role="button"><i class="fa fa-fw fa-close"></i>cancle</a>
                  </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</body>
</html>
<!-- Content Wrapper. Contains page content -->
