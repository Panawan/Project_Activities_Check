<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    ::รายละเอียดการเช็คชื่อการเข้ากิจกรรม:: ว/ด/ป. <?= date('d/m/Y');?> </h1>
    <h4>
    <i class="fa fa-user"></i> สวัสดีคุณ<?=$rsteacher->teacher_firstname;?> <?=$rsteacher->teacher_lastname;?> ::  
    <font color="red">คุณกำลังเช็คชื่อห้อง : <?= $rssubject->s_name;?></font>
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
               <form action="<?= site_url('teacher/updateCheckIn');?>" method="post">
            <table id="example10" class="table table-bordered table-striped">
              <thead>
                <tr class="danger">
                  <th width="10%">รหัส นศ.</th>
                  <th width="50%">ชื่อ-สกุล</th>
                  <th width="10%" class="text-center">เข้าเรียน</th>
                  <th width="10%" class="text-center">ขาดเรียน</th>
                  <th width="10%" class="text-center">ลากิจ</th>
                  <th width="10%" class="text-center">ลาป่วย</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rsStd as $row) { ?>
                <tr>
                  <td><?= $row->std_id;?></td>
                  <td><?= $row->std_prefix;?> <?= $row->std_firstname;?> <?= $row->std_lastname;?></td>
                  <td class="text-center">

                  	<?php if($row->check_in_status==1){ ?>
                    <input type="radio" name="no[<?= $row->no;?>]" value="1" required checked>
                    <?php }else{ ?>
                    	<input type="radio" name="no[<?= $row->no;?>]" value="1" required>
                    <?php } ?>

                  </td>
                  <td class="text-center">

                  	<?php if($row->check_in_status==0){ ?>
                    <input type="radio" name="no[<?= $row->no;?>]" value="0" checked>
                    <?php }else{ ?>
                    	<input type="radio" name="no[<?= $row->no;?>]" value="0">
                    <?php } ?>

                  </td>

                  <td class="text-center">

                  	<?php if($row->check_in_status==2){ ?>
                    <input type="radio" name="no[<?= $row->no;?>]" value="2" checked>
                    <?php }else{ ?>
                    	<input type="radio" name="no[<?= $row->no;?>]" value="2">
                    <?php } ?>

                  </td>
                  <td class="text-center">

                  	<?php if($row->check_in_status==3){ ?>
                    <input type="radio" name="no[<?= $row->no;?>]" value="3" checked>
                    <?php }else{ ?>
                    	<input type="radio" name="no[<?= $row->no;?>]" value="3">
                    <?php } ?>

                  </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
              <p class="text-right" style="margin-right: 20px;"> 
                <br>
                <input type="hidden" name="s_id" value="<?= $rssubject->s_id;?>">
                <input type="hidden" name="teacher_id" value="<?=$rsteacher->teacher_id;?>">
                <button type="submit" class="btn btn-primary" style="width: 200px;">บันทึก</button></p>
              </form>
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