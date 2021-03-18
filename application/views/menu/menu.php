<div class="right_col" role="main">
    <div class="container_fluid">
        <h4><?= $title; ?></h4>
       
        <div class="row">
            <div class="col-md-6 col-sm-6">
            <?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>'); ?>

            <?= $this->session->flashdata('message');?>


             <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
                <div class="x_panel">
                
                    <div class="x_title">
                        <strong style="color: red;">Daftar Menu</strong>
                  
                        <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Action</th>
                                        
                                        </tr>
                                    </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($menu as $m) :?>
                                <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $m['menu']?></td>
                                <td>
                                    <a href="" class="badge badge-success">Edit</a>
                                    <a href="" class="badge badge-danger">Delete</a>
                                
                                </td>
                                
                                </tr>
                        <?php $i++; ?>
                            <?php endforeach;?>
                            </tbody>
                            </table>
                    </div> 
                </div>
            </div>
             <!-- Modal -->
                          
        </div>
    </div>
</div>
    <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newMenuModalLabel">Add Menu Modal</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                            <form action="<?= base_url('menu');?>" method="post">
                                <div class="modal-body">
                                <input type="text" class="form-control" name="menu" id="menu" placeholder="menu name">
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                </div>
            </div>
        </div>