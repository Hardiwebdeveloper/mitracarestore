<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">

                <hr class="sidebar-divider">
                <!-- QUERY MENU -->
                  <?php

                  $role_id = $this->session->userdata('role_id');
                    $queryMenu = "SELECT `user_menu`.`id`,`menu`
                                FROM `user_menu` JOIN `user_access_menu`
                                  ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                               WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC ";

                  $menu = $this->db->query($queryMenu)->result_array();
                  
                  ?>

                  <!-- LOOPING MENU -->

                  <?php foreach ($menu as $m) : ?> 
                          <div class="sidebar-heading pl-3">
                            <?php echo $m['menu'];?>
                          </div>
                              <?php 
                                $menuId = $m['id'];
                                $querySubMenu = "SELECT *
                                                  FROM `user_sub_menu` JOIN `user_menu`
                                                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                                  WHERE `user_sub_menu`.`menu_id` = $menuId
                                                    AND `user_sub_menu`.`is_active` = 1
                                                    ";
                                  $subMenu = $this->db->query($querySubMenu)->result_array();
                              ?>

                              <?php foreach($subMenu as $sm): ?>
                              
                            <ul class="nav side-menu">
                              <a class="nav-link active" href="<?= base_url($sm['url']);?>">
                                  <li><i class="<?= $sm['icon'];?>"></i>
                                 <strong style = "color: white";><?= $sm['title']?></strong>
                                  </li>
                                
                                </a>
                            </ul>
                                <?php endforeach; ?>
                                <hr class="sidebar-divider my-0">
                  <?php endforeach; ?>
              </div>
              <hr class="sidebar-divider my-0">
                  <div class="menu_section">
                    <div class="sidebar-heading pl-3">
                      
                    </div>
                  
                  </div>
            
            </div>