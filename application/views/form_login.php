  <div class="content-wrapper">
  <section class="content-header">
    <h1>Login</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body table-responsive">
                  <form action="<?= site_url('login/authen'); ?>" method="post">
                    <div class="form-group">
                      <label for="username">Username :</label>
                      <input type="text" class="form-control" name="username" placeholder="Enter your Username" value="<?=set_value('username'); ?>">
                      <span class="fr"><?= form_error('username'); ?></span>
                    </div>
                    <div class="form-group">
                      <label for="password">Password :</label>
                      <input type="password" class="form-control" name="password" placeholder="Enter your Password" value="<?=set_value('password'); ?>">
                      <span class="fr"><?= form_error('password'); ?></span>
                    </div>
                    <h4><font color="gray">:: Username และ Password ตั้งต้นของอาจารย์เป็นตัวเดียวกันกับอีเมลที่ทางเราลงทะเบียนไว้ให้ ::</h4>

                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>
          </div>
        </div>
      </div>
    </section>
  </div>