<style>
    .row{
   position: fixed;
   top: 50%;
   left: 30%;
   transform: translate(-30%, -50%);
   background: rgba(4, 29, 23, 0.5);
   padding: 50px;
   width: 500px;
   box-shadow: 0px 0px 25px 10px black;
   border-radius: 15px;
    }
     .form-group label{
        color: white;
    }
    .form-control{
        border-radius: 10px;
    }

</style>
<div class="right_col" role="main">
    <div class="container">
        <div class="col-md-12 col-sm-12">
                <div class="container_fluid">
                    <h4><?= $title; ?></h4>
                   <div class="col-md-12" style="background: black;">
                </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?= base_url('user/changepassword');?>" method="post">
                                <?= $this->session->flashdata('message');?>
                                        <div class="form-group">
                                                <label for="current_password">Password Lama</label>
                                                <input type="password" class="form-control" id="current_password" name="current_password" >
                                                <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                                <label for="new_password1">Password Baru</label>
                                                <input type="password" class="form-control" id="new_password1" name="new_password1">
                                                <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                                <label for="new_password2">Ulangi Password</label>
                                                <input type="password" class="form-control" id="new_password2" name="new_password2" >
                                                <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-round btn-primary">Ubah Password</button>
                                        </div>
                            </form>
                        </div>
                    </div> 
                </div>
        </div>
    </div>
</div>
