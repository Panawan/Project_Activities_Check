<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    ::ระบบเช็คชื่อเข้ากิจกรรมออนไลน์:: </h1>
    
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <h4>รายการห้อง</h4>
            <table id="example1x" class="table table-bordered table-striped">
              <thead>
                <tr class="danger">
                  <th width="5%">No.</th>
                  <th width="55%">ชื่อห้อง</th>
                  <th width="10%" class="text-center">จำนวน นศ.</th>
                  <th width="10%" class="text-center">รายชื่อนักศึกษา</th>
                  <th width="10%" class="text-center">ประวัติการเช็คชื่อ</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rs as $row) { ?>
                <tr>
                  <td><?= $row->s_id;?></td>
                  <td><?= $row->s_name;?></td>
                  <td class="text-center"><?= $row->totalstd;?> คน</td>
                  <td class="text-center">
                    <a href="<?php echo site_url('home/detail/'.$row->s_id);?>" class="btn btn-primary btn-xs">ดูรายชื่อนักศึกษา</a>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo site_url('home/checkInHistory/'.$row->s_id);?>" class="btn btn-info btn-xs">ดูประวัติการเช็คชื่อ</a>
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