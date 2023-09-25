<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12" style="background-color: #2375fa;">
      <h3 style="margin:50px; color:#FFFFFF">
      ::สายตรงผู้บริหาร/คณบดี/อธิการบดี::
      </h3>
    </div>
    <div class="col-sm-3 col-md-3" style="margin-top: 30px"></div>
    <div class="col col-sm-9 col-md-9" style="margin-top: 30px">
      <form action="<?= site_url('form/adding');?>" method="post" class="form-horizontal">
        <div class="form-group col col-md-7">
          <label>รายละเอียด</label>
          <textarea name="dm_detail" class="form-control" required minlength="5" rows="5" placeholder="*ต้องการข้อมูล"><?php echo set_value('dm_detail'); ?></textarea>
          <span class="fr"><?php  echo form_error('dm_detail'); ?></span>
        </div>
        <div class="form-group col col-md-5">
          <label>ชื่อ-สกุล</label>
          <input type="text" name="dm_name" class="form-control" required minlength="5" placeholder="*ต้องการข้อมูล" value="<?php echo set_value('dm_name'); ?>">
          <span class="fr"><?php  echo form_error('dm_name'); ?></span>
        </div>
        <div class="form-group col col-md-5">
          <label>อีเมล</label>
          <input type="email" name="dm_email" class="form-control" required  placeholder="*ต้องการข้อมูล" value="<?php echo set_value('dm_email'); ?>">
          <span class="fr"><?php  echo form_error('dm_email'); ?></span>
        </div>
        <div class="form-group col col-md-5">
          <button type="submit" class="btn btn-primary" style="width: 100%">ส่งข้อมูล</button>
        </div>
      </form>
    </div>
  </div>
</div>