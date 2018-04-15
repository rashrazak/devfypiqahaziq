<?php 
	$this->load->view('templates/headershaz');
?>
<?php  foreach ($item as $object):  ?>
    <div id="wrapper">
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">                     
                <li><a href="#" class="active" ><i class="fa fa-dashboard fa-fw" ></i> Seller Update Item</a></li>
                <li class="disabled"><a href="#"><i class="fa fa-table fa-fw"></i> Update Item Complete</a></li>
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
                    <h3 class="page-header">Update Item</h3>
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
                                        if($this->session->flashdata('updateitem')):

                                        echo $this->session->flashdata('updateitem');

                                        endif;
                                    

                                        echo form_open_multipart('Register/updateitem'); //form location ke controller,,
                                        ?>
                                        <div class="col-lg-5">
                                            <label>Item Name</label>
                                            <?php //echo form_label('Username');
                                            $data = array('class' => 'form-control' , 
                                            'placeholder' => 'Insert Item Name', 
                                            'name'=>'itemname',
                                            'value'=> $object['name'],
                                            'type' => 'text', 
                                            'autofocus' 
                                            );
                                            ?>	
                                            <?php echo form_input($data); ?>
                                            <br>
                                            <input type="hidden" name="id" value="<?php echo $object['id']; ?>">
                                            <input type="hidden" name="url" value="<?php echo $object['url']; ?>">
                                            <img src="<?php echo IMAGEX.$object['url']; ?>" height="260" width="300"> 
                                            <label>Current Image</label> 
                                            <input type="file" name="userfile"class="form-control" size="20" /> 
                                            <br>
                                            <label>Price RM</label>                                        
                                            <?php //echo form_label('Username');
                                            $data2 = array('class' => 'form-control' , 
                                            'placeholder' => 'Insert price ', 
                                            'name'=>'price',
                                            'value'=> $object['price'],
                                            'type' => 'number', 
                                            'autofocus' 
                                            );
                                            ?>	
                                            <?php echo form_input($data2); ?> 
                                            <br>
                                        </div>
                                        <div class="col-lg-5">
                                            <label>Categories</label>
                                            <label>Current: <?php echo $object['categ']; ?></label>
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
                                            'value'=> $object['description'],
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
                                                    $data3 = array('class' => 'btn btn-danger pull-right' ,'name'=>'submit','value' => 'Update Item');
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



<?php endforeach; ?>
<?php 
	$this->load->view('templates/footershaz');
?>

          