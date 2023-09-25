<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    :: รายชื่อนักศึกษาของห้อง <font color="blue"><?= $rssubject->s_name;?></font></h1>
    <h4>
    </h4>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body table-responsive">
               <h4>รายชื่อนักศึกษา</h4>
               <table id="example10" class="table table-bordered table-striped">
              <thead>
                <tr class="danger">
                  <th width="10%">รหัส นศ.</th>
                  <th width="50%">ชื่อ-สกุล</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rsStd2 as $row) { ?>
                <tr>
                  <td><?= $row->std_id;?></td>
                  <td><?= $row->std_prefix;?> <?= $row->std_firstname;?> <?= $row->std_lastname;?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
              <p class="text-right" style="margin-right: 20px;"> 
                <br>
              <hr>
              <!-- <b>คลิปสอนเพิ่มเติม</b> <br>
              Basic CodeIgniter : <a href="https://www.youtube.com/playlist?list=PLEA4F1w-xYVaY4qvlDOhiJAGE2QxdABK6" target="_blank">Click</a> <br>
              CodeIgniter สอนทำระบบแจ้งซ่อม :   <a href="https://www.youtube.com/playlist?list=PLEA4F1w-xYVarivBHQzqEymGfyAMWY1uj" target="_blank">Click</a> <br> -->
            </div>
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