<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    ::ประวัติการเช็คชื่อเข้ากิจกรรม:: </h1>
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
            <!-- start summary -->
            <h3>ตารางสรุปการมาเรียนห้อง <?=$rssubject->s_name;?></h3>
            <table class="table table-bordered table-striped">
              <thead>
                <tr class="danger">
                  <th>ชื่อ-สกุล</th>

                  <?php  
                  //date chekckin
                  foreach ($data_date as $key => $rowx) {
                   ?>
                      <th class="text-center"><?php  echo date('d/m/Y', strtotime($rowx));?></th>
                <?php }?>
                  <th class="text-center">รวม(มา)</th>
                  <th class="text-center">รวม(ขาด)</th>
                </tr>
              </thead>
              <tbody>
                
            <?php 
            //มา/ ขาด
            foreach ($data_array as $key1 => $std) { ?>
            <tr>
                <td><?php echo $key1;?></td>

                <?php 
                //ประกาศตัวแปรเพื่อเอาไปหาผลรวม
                $totalCamex=0;
                $totalAbsentx=0;
                foreach ($std as $key2 => $checkx) { ?>
                    <td align="center">
                        <?php 
                        
                        //มา
                        if($checkx[0] == 1){
                          $totalCame = $checkx[0] == 1;
                          $totalCame=1;
                          $totalCamex += $totalCame;
                         ?>
                           <font color="green"> มา </font>
                        <?php }elseif($checkx[0] == 0){
                        //ขาด
                          $totalAbsent = $checkx[0] == 0;
                          $totalAbsent=1;
                          $totalAbsentx += $totalAbsent;
                         ?>
                            <font color="red"> ขาด </font>
                        <?php }elseif($checkx[0] == 2){
                        //ขาด
                          $totalAbsent2 = $checkx[0] == 2;
                          $totalAbsent2=1;
                          $totalAbsentx += $totalAbsent2;
                         ?>
                            <font color="red"> ลากิจ </font>
                        <?php }elseif($checkx[0] == 3){
                        //ขาด
                          $totalAbsent3 = $checkx[0] == 3;
                          $totalAbsent3=1;
                          $totalAbsentx += $totalAbsent3;
                         ?>
                            <font color="red"> ลาป่วย </font>
                        <?php } ?>
                    </td>
                <?php } ?>
                <td align="center"><font color="green"><b><?=$totalCamex;?></b></font></td>
                <td align="center"><font color="red"><b><?=$totalAbsentx;?></b></font></td>
            </tr>
        <?php } ?>
        </tr>
        
    </tbody>
 </table><br>

 <!-- end summary -->
            <h4>วัน/เดือน/ปี ที่มีการเช็คชื่อ</h4>
            <table id="example1x" class="table table-bordered table-striped">
              <thead>
                <tr class="danger">
                  <th width="55%">ว/ด/ป</th>
                  <th width="45%">ดูข้อมูล</th>
                </tr>
              </thead>
              <tbody>
              	<?php foreach($rsdate as $row) { ?>
                <tr>
                  <td>
                  	<?= date('d/m/Y',strtotime($row->check_in_date)); ?>
                  </td>
                  <td><a href="<?= site_url('home/checkDetailByDateFornonUser/'.$row->check_in_date.'/'.$row->ref_s_id); ?>" class='btn btn-info' target="_blank">ดูข้อมูล</a></td>
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