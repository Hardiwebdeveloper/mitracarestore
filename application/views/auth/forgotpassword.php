<style>

  .separator h1{color: red;}
  
</style>
  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form class="user" method="post" action="<?php echo base_url('auth');?>">
              <h2>Form Ubah Password</h2>
              <?php echo $this->session->flashdata('message'); ?>
              <div class=form-group>
                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email"
                value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              
              <div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">&larr;
                  <a href="<?php echo site_url('auth')?>" class="to_register"> Back To Login </a>
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
