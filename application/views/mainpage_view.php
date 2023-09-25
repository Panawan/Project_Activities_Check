<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    รายการสายตรงผู้บริหาร/คณบดี/อธิการบดี
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr class="danger">
                  <th width="5%">ID</th>
                  <th width="45%">รายละเอียด</th>
                  <th width="20%">ชื่อ-สกุล</th>
                  <th width="15%">อีเมล</th>
                  <th width="15%">ว/ด/ป</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rs as $row) { ?>
                <tr>
                  <td><?= $row->id;?></td>
                  <td><?= $row->dm_detail;?></td>
                  <td><?= $row->dm_name;?></td>
                  <td><?= $row->dm_email;?></td>
                  <td><?= date('d/m/Y H:i:s',strtotime($row->date_save));?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
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