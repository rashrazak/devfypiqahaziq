<?php 
	$this->load->view('templates/headershaz');
?>
<div id="wrapper">
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">                     
            <li><a href="#" class="active" ><i class="fa fa-dashboard fa-fw" ></i> Seller Add Item</a></li>
            <li class="disabled"><a href="#"><i class="fa fa-table fa-fw"></i> Add Item Complete</a></li>
            </ul>
        </div>
    </div>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-10">
            <script type="text/javascript" charset="utf-8">
                setTimeout(fade_out, 2000);                   
                function fade_out() {
                    $("#mydiv").fadeOut().empty();
                }
            </script>
            <?php
                if($this->session->flashdata('success')):
                    $success = $this->session->flashdata('success');
                    echo ' <div id="mydiv"><font size="3" color="red">'.$success.'</font></div>';
                endif;
            ?>
                <h3 class="page-header">Add Item</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <a style="color:red">Please Fill Up the Forms</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <?php
                                    if($this->session->flashdata('additem')):

                                    echo $this->session->flashdata('additem');

                                    endif;
                                   

                                    echo form_open_multipart('Register/registeritem'); //form location ke controller,,
                                    ?>
                                    <div class="col-lg-5">
                                        <label>Item Name</label>
                                        <?php //echo form_label('Username');
                                        $data = array('class' => 'form-control' , 
                                        'placeholder' => 'Insert Item Name', 
                                        'name'=>'itemname',
                                        'type' => 'text', 
                                        'autofocus' 
                                        );
                                        ?>	
                                        <?php echo form_input($data); ?>
                                        <br> 
                                        <label>Upload Image</label>
                                        <input type="file" name="userfile"class="form-control" size="20" /> 
                                        <br>
                                        <label>Price</label>                                        
                                        <?php //echo form_label('Username');
                                        $data2 = array('class' => 'form-control' , 
                                        'placeholder' => 'Insert price ', 
                                        'name'=>'price',
                                        'type' => 'number', 
                                        'autofocus' 
                                        );
                                        ?>	
                                        <?php echo form_input($data2); ?> 
                                        <br>
                                    </div>
                                    <div class="col-lg-5">
                                        <label>Categories</label>
                                        <select name="categories" class="form-control" id="sel1">
                                            <option value="A">1</option>
                                            <option value="B">2</option>
                                            <option value="C">3</option>
                                            <option value="D">4</option>
                                        </select>
                                        <br>
                                        <label>Description</label>
                                        <?php //echo form_label('Username');
                                        $data1 = array('class' => 'form-control' , 
                                        'placeholder' => 'Insert Description ', 
                                        'name'=>'description',
                                        'type' => 'textarea',
                                        'rows' => '6',
                                        'cols' => '20', 
                                        'autofocus' 
                                        );
                                        ?>	
                                        <?php echo form_textarea($data1); ?>
                                        <br>                                    
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <a type="button" class="btn pull-left" href="<?php echo site_url('Seller/items'); ?>">Back</a>
                                            </div>
                                            <div class="col-xs-3">
                                                <button type="reset" class="btn btn-warning  ">Reset </button>
                                            </div>
                                            <div class="col-xs-4">
                                                <?php 
                                                $data3 = array('class' => 'btn btn-danger pull-right' ,'name'=>'submit','value' => 'Add Item');
                                                ?>
                                                <?php echo form_submit($data3); ?>
                                            </div>
                                        </div>
                                    </div> 
                                    <?php echo form_close(); ?> 
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

          