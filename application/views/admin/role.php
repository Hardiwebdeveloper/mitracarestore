<div class="right_col" role="main">
    <div class="container_fluid">
        <h4><?= $title; ?></h4>
       
        <div class="row">
            <div class="col-md-6 col-sm-6">
            <?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>'); ?>

            <?= $this->session->flashdata('message');?>


             <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>
                <div class="x_panel">
                
                    
                        <!-- <strong style="color: red;">Daftar Menu</strong>
                   -->
                        <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                        
                                        </tr>
                                    </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($role as $r) :?>
                                <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $r['role']?></td>
                                <td>
                                    <a href="<?= base_url('admin/roleaccess/') . $r['id'];?>" class="badge badge-primary">Access</a>
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
             <!-- Modal -->
                          
        </div>
    </div>
</div>
    <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newRoleModalLabel">Add Role Modal</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                            <form action="<?= base_url('admin/role');?>" method="post">
                                <div class="modal-body">
                                <input type="text" class="form-control" name="role" id="role" placeholder="role name">
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                </div>
            </div>
        </div>