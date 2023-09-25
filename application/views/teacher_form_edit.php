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
    <h1> ฟอร์มปรับปรุงโปรไฟล์ </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body table-responsive">
                  <form action="<?php echo site_url('teacher/updateTeacher');?>" method="post" >
                    <div class="form-group">
                      <label for="teacher_prefix">คำนำหน้า:</label>
                      <input type="text" class="form-control" name="teacher_prefix" placeholder="Enter Prefix" value="<?= $rseditProfile->teacher_prefix; ?>">
                    </div>
                    <div class="form-group">
                      <label for="teacher_firstname">ชื่อของอาจารย์:</label>
                      <input type="text" class="form-control" name="teacher_firstname" placeholder="Enter Teacher FirstName" value="<?= $rseditProfile->teacher_firstname; ?>">
                    </div>
                    <div class="form-group">
                      <label for="teacher_lastname">นามสกุลของอาจารย์:</label>
                      <input type="text" class="form-control" name="teacher_lastname" placeholder="Enter Teacher LastName" value="<?= $rseditProfile->teacher_lastname; ?>">
                    </div>
                    <div class="form-group">
                      <label for="username">username:</label>
                      <input type="text" class="form-control" name="username" placeholder="Enter Username" value="<?= $rseditProfile->username; ?>">
                    </div>

                    <span class="fr"><?= form_error('teacher_id'); ?></span>
                    <input type="hidden" name="teacher_id" value="<?= $rseditProfile->teacher_id; ?>">
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
