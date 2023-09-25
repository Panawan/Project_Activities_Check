<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    ::รายละเอียดการเช็คชื่อการเข้ากิจกรรม:: ว/ด/ป. <?= date('d/m/Y', strtotime($rsDate->check_in_date)) ;?> </h1>
    <h4>
    <i class="fa fa-user"></i>  ::  
    <font color="red">คุณกำลังดูประวัติการเช็คชื่อห้อง : <?= $rssubject->s_name;?></font>
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
                  <th width="10%" class="text-center">เข้าเรียน</th>
                  <th width="10%" class="text-center">ขาดเรียน</th>
                  <th width="10%" class="text-center">ลากิจ</th>
                  <th width="10%" class="text-center">ลาป่วย</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $totalStdCome = 0;
                $totalStdMiss = 0;
                 foreach ($rsStd as $row) { 

                  $std = $row->check_in_status;

                  if($std==1){
                    $stdCome = 1;
                    $totalStdCome += $stdCome;
                  }else{
                    $stdMiss = 1;
                    $totalStdMiss += $stdMiss;
                  }
                  ?>
                <tr>
                  <td><?= $row->std_id;?></td>
                  <td><?= $row->std_prefix;?> <?= $row->std_firstname;?> <?= $row->std_lastname;?></td>
                  <td class="text-center">

                  	<?php if($row->check_in_status==1){ ?>
                    <input type="radio" name="no[<?= $row->no;?>]" value="1" required checked>
                    <?php }else{ ?>
                    	<input type="radio" name="no[<?= $row->no;?>]" value="1" required disabled>
                    <?php } ?>

                  </td>
                  <td class="text-center">

                  	<?php if($row->check_in_status==0){ ?>
                    <input type="radio" name="no[<?= $row->no;?>]" value="0" checked>
                    <?php }else{ ?>
                    	<input type="radio" name="no[<?= $row->no;?>]" value="0" disabled>
                    <?php } ?>

                  </td>

                  <td class="text-center">

                  	<?php if($row->check_in_status==2){ ?>
                    <input type="radio" name="no[<?= $row->no;?>]" value="2" checked>
                    <?php }else{ ?>
                    	<input type="radio" name="no[<?= $row->no;?>]" value="2" disabled>
                    <?php } ?>

                  </td>
                  <td class="text-center">

                  	<?php if($row->check_in_status==3){ ?>
                    <input type="radio" name="no[<?= $row->no;?>]" value="3" checked>
                    <?php }else{ ?>
                    	<input type="radio" name="no[<?= $row->no;?>]" value="3" disabled>
                    <?php } ?>

                  </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>

              <h4 style="color: red;">
                <br>
                สรุปจำนวนนักศึกษาทั้งหมด <?= count($rsStd); ?> คน
                มาเรียน <?= $totalStdCome ?> คน
                ขาดเรียน <?= $totalStdMiss ?> คน
                <br><br>
                *เปอร์เซ็นการมาเรียน 
                <?php echo number_format($totalStdCome/count($rsStd)*100,2);
                ?> %
              </h4>

              <hr>
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