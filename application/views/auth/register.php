  <body class="login">
    <div>
      <div class="login_wrapper">
          <div class="animate form login_form">
                    <section class="login_content">
                      <form class="user" method="post" action="<?= base_url('auth/register');?>" >
                        <h1>Create Account</h1>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Username" 
                          value="<?= set_value('name');?>" required="" />
                          
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" > 
                          <?= form_error('email', '<small class="text-danger">, </small>'); ?>
                        </div>
                        <div class=form-group>
                          <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                          <?= form_error('password', '<small class="text-danger">, </small>'); ?>
                        </div>
                        <div class="form-group">
                          <div class="row">
                              <div class="col-md-12">
                                  <button type="submit" class="btn btn-primary btn-user btn-block col-md-6">Register</button>
                                  <a class="reset_pass text-center" href="<?= base_url('auth/forgotpassword');?>">Lupa Password?</a>
                              </div>
                          </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                          <p class="change_link">Already a member ?
                            <a href="<?php echo site_url('auth')?>" class="to_register"> Log in </a>
                          </p>

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