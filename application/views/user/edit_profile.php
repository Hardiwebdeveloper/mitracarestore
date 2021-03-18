<div class="right_col" role="main">
  <div class="container_fluid">
        <h4><?= $title; ?></h4>

        <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <?= form_open_multipart('user/edit');?>
                            <div class="col-md-12 col-sm-12 ">
							    <div class="x_panel">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="email ">email <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="email" name="email" class="form-control" value="<?= $user['email'];?>" 
                                                readonly>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Full Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="name" name="name" required="required" class="form-control"
                                                value="<?= $user['name'];?>">
											</div>
										</div>
										<div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Picture <span>*</span>
											</label>
											<div class="col-md-12 col-sm-12">
                                                    <div class="row col-md-6 col-sm-6">
                                                        <div class="col-md-3">
                                                            <img src="<?= base_url('image/profile/') . $user['image'];?>" class="img-thumbnail">
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                                <label class="custom-file-label" for="image">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                            </div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Edit</button>
											</div>
								

									
								</div>
							</div>
						</div>
                            </form>   
                        </div>
                  <div class="col-md-8 col-sm-8">
                    <!-- <div class="x_panel">
                      hehe
                    </div> -->
                  </div>
          </div>

    </div>
</div>

 <!-- <div class="card" style="width: 18rem;">
                                                <img src="<?= site_url('image/profile/') . $user['image'];?>" class="card-img-top" alt="...">
                                                <!-- <div class="card-body">
                                                    <h5 class="card-title"><?= $user['name'];?></h5>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                </div> -->
                                                <!-- <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><strong><?= $user['email'];?></strong></li>
                                                    <li class="list-group-item"><strong>Member since<?= date('d F Y', $user['date_created']);?></strong></li>
                                                    
                                                </ul> -->
                                                <!-- <div class="card-body">
                                                    <a href="#" class="card-link">Card link</a>
                                                    <a href="#" class="card-link">Another link</a>
                                                </div> -->
                                        <!-- </div>  -->