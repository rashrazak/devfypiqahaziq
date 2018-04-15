<?php 
    $this->load->view('templates/headershaz');      
?>
<div id="wrapper">
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">                     
            <li><a href="#" class="active" ><i class="fa fa-dashboard fa-fw" ></i>View Item</a></li>
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
                <h3 class="page-header">View Item</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <a style="color:red">Details</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                    
                                
                                    <div class="col-lg-5">
                                        <label>Item Name</label>
                                        <p><?php echo $item['name']; ?></p>
                                        <br> 
                                        <label>View Image</label>
                                        <br>
                                        <div class="img-zoom-container">
                                            <img id="myimage" src="<?php echo IMAGEX.$item['url']; ?>" width="300" height="200">
                                            <div id="myresult" class="img-zoom-result"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <label>Price</label>
                                        <p>RM <?php echo $item['price']; ?> </p>                                        
                                        <br>
                                        <label>Categories</label>
                                        <p><?php echo $item['categ']; ?></p>
                                        <br>
                                        <label>Description</label>
                                        <p><?php echo $item['description']; ?></p>
                                        <br>                                    
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <a type="button" class="btn pull-left" href="<?php echo site_url('Welcome'); ?>">Back</a>
                                            </div>
                                            <div class="col-xs-3">
                                                <a type="button" onclick="myBuy()" class="btn btn-warning ">Buy</a>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="panel panel-info" id="test">
                                            <div class="panel-heading">
                                                <a style="color:red">Details</a>
                                            </div>
                                            <div class="panel-body">
                                                <form action="<?php echo site_url('Items/cart'); ?>" method="post">
                                                
                                                    <label>Quantity</label>
                                                    <input type="number" class="form-control-sm" name="quantity">
                                                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                                    <br><br>
                                                    <div class="">
                                                        <button type="submit" class="btn btn-warning  ">Add to Cart</button>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                        </div>
                                        <script>
                                            // Initiate zoom effect:
                                            imageZoom("myimage", "myresult");
                                            var x = document.getElementById("test");
                                            x.style.display = "none";
                                            function myBuy(){
                                                if (x.style.display == "none") {
                                                    x.style.display = "block";
                                                }
                                            }
        

                                        </script>
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

          