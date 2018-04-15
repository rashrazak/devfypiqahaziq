<?php 
	$this->load->view('templates/headershaz'); //shoppingtemplate
?>
<?php  foreach ($results as $object):                 
                                         
                                        
                                        	?>
         <div id="wrapper">

        

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                
                               
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li class="disabled">
                            <a href="" class="active"><i class="fa fa-male fa-fw"></i> Update Profile</a>
                        </li>
                       
                        <li >
                            <a href="../"  value="Back"><i class="fa fa-chevron-left fa-fw"></i> Back</a>
                        </li>
                       
                       
                      
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

            <?php 
                
                	$attributes = array('id'=>'login_form','class'=>'form_horizontal'); 
                      
                                        	echo form_open('Seller/update_process',$attributes);
                
            ?>
            
            
         <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row"><br><br>
                    <div class="col-md-8 col-md-offset-1">
                            <div class="panel panel-primary">
                                <?php 
                                    if ($this->session->flashdata('upd8')): 
                                        $upd8 = $this->session->flashdata('upd8');
                                        echo  '<font color="red">'.$upd8.'</font>';
                                    endif;
                                    if ($this->session->flashdata('errors')): 
                                        $error = $this->session->flashdata('errors');
                                        echo  '<font color="red">'.$error.'</font>';
                                    endif;
                                
                                ?>
                              <div class="panel-heading"><i class="fa fa-th-list fa-fw"></i> Update your profile here <?php   echo $object->fname;?>!</div>
                              <div class="panel-body">
                                
                                <div class="col-md-10 col-md-offset-1 ">
                                     <label>Full Name /Company Name</label>
                                    <input class="form-control" value="<?php echo $object->fname; ?>" type="text" name="fname">
                                    
                                    <br><label>IC / Company Id</label>
                                        <input class="form-control" value="<?php echo $object->icpp; ?>" type="text" name="icpp">
                             
                                    <br><label>Phone number</label>
                                        <input class="form-control" value="<?php echo $object->hp; ?>" type="text" name="hp">
                             
                                    <br><label>Maybank Account</label>
                                        <input class="form-control" value="<?php echo $object->maybankaccount; ?>" type="text" name="maybankaccount">
                                    
                                    <br><label>Shop Name</label>
                                        <input class="form-control" value="<?php echo $object->shopname; ?>" type="text" name="shopname">      
                                    
                                    <br><label>Company Name</label>
                                    <input class="form-control" value="<?php echo $object->companyname; ?>" type="text" name="companyname">

                                    <br><label>Email</label>
                                    <input class="form-control" value="<?php echo $object->emel; ?>" type="email" name="email" >     
                              
                                    <br> <label>Confirm Password</label>
                                    <input class="form-control" type="text" name="password" value="<?php echo $object->password; ?>" ><br>
                                    <input type="hidden" name="id" value="<?php echo $object->id; ?>" />
                                    </div>
                                   
                              </div>
                               <div class="panel-footer">
                               
                                    	<?php //echo form_label('Username');
                            				$data3 = array('class' => 'btn-lg btn-danger' , 						
                            						'name'=>'submit',
                            						'value' => 'Update',
                            					
                            
                            					);
                            
                            			 ?>	
                            			 
                            			<?php echo form_submit($data3); ?>
                                               <?php echo form_close(); ?>  
                               
                               </div>
                            </div>
                       
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>


    <?php endforeach; ?>
                     













<?php 
	$this->load->view('templates/footershaz');
?>
