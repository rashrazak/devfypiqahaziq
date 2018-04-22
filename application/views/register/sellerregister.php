<?php 
	$this->load->view('templates/headershaz');
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
                       
                         <li>
                           <a href="#" class="active" ><i class="fa fa-dashboard fa-fw" ></i> Seller Registration</a>
                           
                
                        </li>
                        <li class="disabled">
                            <a href="#"><i class="fa fa-table fa-fw"></i> Registration Complete</a>
                        </li>
                       
                       
                      
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header">Register Seller</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <a style="color:red">Please Fill Up the Forms</a>
                        </div>
                         <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    
                                        <div class="form-group">
                                              <?php
                                                  	if($this->session->flashdata('register')):
                                        
                                        		echo $this->session->flashdata('register');
                                        		
                                        		 endif;
                                        	$attributes = array('id'=>'login_form','class'=>'form_horizontal'); 
                      
                                        	echo form_open('Register/seller2',$attributes); //form location ke controller,,
                                        ?>
                                        
                                       
                                         
                                        
                                           <div class="col-lg-4">
                                                 <label>Full Name / Company Name</label>


                                    			<?php //echo form_label('Username');
                                    				$data = array('class' => 'form-control' , 
                                    						'placeholder' => 'Insert Fullname', 
                                    						'name'=>'fname',
                                    						'type' => 'text', 
                                    						'autofocus' 
                                    					);
                                    
                                    			 ?>	
                                    			<?php echo form_input($data); ?>
                                    
                                    
                                    
                                 
                                    </div>
                                          <div class="col-lg-4">
                
                                                 <label>Company Address</label>

                                    			<?php //echo form_label('Username');
                                    				$data1 = array('class' => 'form-control' , 
                                    						'placeholder' => 'Insert Address ', 
                                    						'name'=>'address',
                                                            'type' => 'textarea',
                                                            'rows' => '3',
                                                            'cols' => '20', 
                                    						'autofocus' 
                                    					);
                                    
                                    			 ?>	
                                    			<?php echo form_textarea($data1); ?>
                                                 <label>City</label>
                                            
                                                <?php //echo form_label('Username');
                                                    $data2 = array('class' => 'form-control' , 
                                                            'placeholder' => 'Insert City ', 
                                                            'name'=>'city',
                                                            'type' => 'text', 
                                                            'autofocus' 
                                                        );
                                    
                                                 ?> 
                                                <?php echo form_input($data2); ?> 
                                    
                                    
                                    
                                    
                                    
                                    </div>  


                                        <div class="col-lg-4">

                                            <label>IC Peribadi / Company Registration</label>
                                            
                                            	<?php //echo form_label('Username');
                                    				$data2 = array('class' => 'form-control' , 
                                    						'placeholder' => 'Insert id ', 
                                    						'name'=>'icpp',
                                    						'type' => 'text', 
                                    						'autofocus' 
                                    					);
                                    
                                    			 ?>	
                                    			<?php echo form_input($data2); ?> 
                                    
                                        </div>

                                  
                                       
                                       
                                         
                                       
                                        
                                         
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <br>
                                            <label>Phone number</label>
                                            
                                            	<?php //echo form_label('Username');
                                    				$data4 = array('class' => 'form-control' , 
                                    						'name'=>'hp',
                                    						'placeholder'=>' Cth: 0192112345',
                                    						'autofocus' 
                                    					);
                                    
                                    			 ?>	
                                    			<?php echo form_input($data4); ?>
                                    		
                                        
                                        </div></div>
                                         <div class="col-lg-4">
                                         <div class="form-group">
                                            <br>
                                            <label>Maybank Account</label>
                                            
                                             <input class="form-control" placeholder="Maybank Account" type="text" name="account">
                                    		
                                        </div>
                                 </div>
                                        
                                      <div class="col-lg-4"><br>
                                        <div class="form-group">
                                            <label>Emel</label>
                                            <input class="form-control" placeholder="User Email" type="email" name="email">
                                           
                                        </div></div>
                               
                                        <div class="col-lg-4"><br>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password1" type="password" placeholder="**********">
                                            
                                        </div></div>
                                        <div class="col-lg-4"><br>
                                           <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="form-control" type="password" name="password" placeholder="***********">
                                            
                                        </div></div>
                                           
                                        
                                       <div class="col-lg-3"><br><button type="reset" class="btn btn-warning pull-left">Reset </button></div>
                                  
                                </div> 
                                      <div class="col-lg-8">
                                                <br><br>
                                                <div class="form-groups">
                                                <input type="button" class="btn" value="Back" onClick="history.go(-1);return true; "/>
                                                
                                        	<?php //echo form_label('Username');
                            				$data3 = array('class' => 'btn btn-danger' , 						
                            						'name'=>'submit',
                            						'value' => 'Daftar'
                            
                            					);
                            
                            			 ?>	
                            			<?php echo form_submit($data3); ?>
                                               <?php echo form_close(); ?>  
                                             
                                    			
                                            
                                          
                                        
                                      </div>
                                      </div>
                                      
                                 
                                        
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                
                            
                                   
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
























<?php 
	$this->load->view('templates/footershaz');
?>

          