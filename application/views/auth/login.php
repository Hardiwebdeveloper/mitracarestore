<style>
 
  .separator h1{color: red;}
</style>
  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form class="user" method="post" action="<?php echo base_url('auth');?>">
              <h1>Login Form</h1>
              <?php echo $this->session->flashdata('message'); ?>
              <div class=form-group>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div>
                <button type="submit" class="btn btn-primary btn-user">Submit</button>
                <a class="reset_pass text-center" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="<?php echo site_url('auth/register')?>" class="to_register"> Create Account </a>
                </p>
                <h1>WELCOME TO MitraCARE Store</h1>
                <div class="clearfix"></div>
                <br />
              </div>
            </form>
          </section>
        </div>

       
      </div>
    </div>
  </body>
</html>
