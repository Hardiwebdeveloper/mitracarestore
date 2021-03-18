<div class="right_col" role="main">
    <div class="container_fluid">
        <h4><?= $title; ?></h4>
       
        <div class="row">
            <div class="col-md-12 col-sm-12">
            <?= $this->session->flashdata('message');?>
            <div class="row">
                <div class="col-md-6 col sm-6">
                <?php if (validation_errors()) :?>
                    <div class="alert alert-danger" role="alert">
                         <?= validation_errors();?>
                    </div>
                <?php endif;?>
                </div>
            </div>
            
             <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newSubMenuModal">Add New SubMenu</a>
               
                        <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Action</th>
                                        
                                        </tr>
                                    </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($subMenu as $sm) :?>
                                <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $sm['title']?></td>
                                <td><?= $sm['menu']?></td>
                                <td><?= $sm['url']?></td>
                                <td><?= $sm['icon']?></td>
                                <td><?= $sm['is_active']?></td>
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
             <!-- Modal -->
                          
        </div>
    </div>
</div>
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newSubMenuModalLabel">Add Sub Menu Modal</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                            <form action="<?= base_url('menu/submenu');?>" method="post">
                                <div class="modal-body">
                                <input type="text" class="form-control" name="title" id="title" placeholder="submenu title">
                                </div>
                                <div class="modal-body">
                                        <select name="menu_id" id="menu_id" class="form-control">
                                            <option value="">Select Menu</option>
                                            <?php foreach($menu as $m): ?>
                                                <option value="<?= $m['id'];?>"><?= $m['menu'];?></option> 
                                                <?php endforeach;?>
                                        </select>
                                </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control" name="url" id="url" placeholder="Submenu Url">
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control" name="icon" id="icon" placeholder="Submenu icon">
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-check ml-1">
                                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                            <label class="form-check-label" for="is_active">
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                </div>
            </div>
        </div>