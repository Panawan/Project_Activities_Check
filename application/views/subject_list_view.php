<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    ::ระบบเช็คชื่อเข้ากิจกรรมออนไลน์:: </h1>
    <h4>
    <i class="fa fa-user"></i> สวัสดีคุณ<?=$rsteacher->teacher_firstname;?> <?=$rsteacher->teacher_lastname;?>
    </h4>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <h4>รายการห้อง 
              <a class="btn btn-primary" href="<?= site_url('InsertClass'); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูล</a>

            </h4>
            <table id="example1x" class="table table-bordered table-striped">
              <thead>
                <tr class="danger">
                  <th width="5%">No.</th>
                  <th width="55%">ชื่อห้อง</th>
                  <th width="10%" class="text-center">จำนวน นศ.</th>
                  <th width="10%" class="text-center">เช็คชื่อ</th>
                  <th width="10%" class="text-center">ดูประวัติ</th>
                  <th width="5%" class="text-center">แก้ไข</th>
                  <th width="5%" class="text-center">ลบ</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rs as $row) { ?>
                <tr>
                  <td><?= $row->s_id;?></td>
                  <td><?= $row->s_name;?></td>
                  <td class="text-center"><?= $row->totalstd;?> คน</td>
                  <td class="text-center">
                    <?php if($row->totalstd > 0){ ?>
                    <a href="<?= site_url('teacher/checkInForm/'.$row->s_id);?>" class="btn btn-success btn-xs">+เช็คชื่อ</a>
                  <?php }else{
                    echo '-';
                    } ?>
                  </td>
                  <td class="text-center">
                    <?php if($row->totalstd > 0){ ?>
                    <a href="<?= site_url('teacher/checkInHistory/'.$row->s_id);?>" class="btn btn-info btn-xs">ดูประวัติ</a>
                  <?php }else{
                    echo '-';
                    } ?>
                  </td>
                  <td class="text-center"> 
                    <a href="<?php echo site_url('teacher/EditSubjectForm/'.$row->s_id); ?>" class="btn btn-warning btn-xs">แก้ไข</a></td>

                  <td class="text-center"><a class="btn btn-danger btn-xs" href="<?php echo site_url('teacher/del/'.$row->s_id); ?>" role="button" onclick="return confirm('ยืนยันการลบข้อมูล??');"><i class="fa fa-fw fa-trash" ></i> ลบ</a>
                  </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
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