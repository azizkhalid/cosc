<?php require_once '../app/views/templates/headerPublic.php' ?>
<div >
<h1 align="center">Please Login!</h1>
                <p align="center" class="lead">Date: <?= date("d-m-Y"); ?></p>
    <div  id="banner" align="center">
        <div class="row">
            <div class="col-lg-12" >
                
                <ul style="list-style:none;">
                	<?php if (isset($_GET['message'])) { ?>
                		<li><span class="badge"><?php echo $_GET['message']; ?></span></li>
                    
						
                	<?php } ?>
                	<?php if (isset($message)) { ?>
                		<li><span class="badge"><?php echo $message; ?></span></li>
                	<?php } ?>
            	</ul>
            </div>
        </div>
    </div>
    <!---coemine--->
    
    <div class="row ">
                               <div class="col-sm-4 col-md-4 col-xs-12"></div>
                               <div class="col-sm-4 col-md-4 col-xs-12 w3-border w3-round w3-card">
                               
                               <div class=" w3-border w3-round" style="background:#FFCB42; color:white;"><h2 align="center" style="font-family: 'Orbitron', sans-serif;"><i class="fa fa-mortar-board" ></i> Admin Login!</h2></div>
                                <form class="form-horizontal" action="<?php echo base_url('login/index'); ?>" method="post">
                               <div class="w3-margin-top">
                                      
                                                    <div class="input-group input-group-lg">
                                                      <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                                      <input type="text" class="form-control" name="username" placeholder="Username">
                                                    </div>
                                                    <br />
                                                    <div class="input-group input-group-lg">
                                                      <span class="input-group-addon" id="sizing-addon1"><i class=" fa fa-lock"></i></span>
                                                      <input type="password" class="form-control" name="password" placeholder="Password">
                                                    </div>
                                                    <br />
                                                    <br />
                                                    <div>
                                                    
                                                      <button type="submit" style="background:#FFCB42; border:none" name="login"  class="btn btn-primary form-control w3-margin-bottom"><span class=" fa fa-sign-in"></span> Login</button>
                                                    <a  class="w3-margin-bottom" target="_blank" style="float:right; " href="<?php echo base_url('login/register'); ?>"> Sign up here!</a>
                                                  
                                                      
                                                    </div>
                                        </form>
                                        
                                       
                                        </div>

                                                   
                                                   
                                                          
                                   </div>                 
                                </div>   
                                               
          <br/>
    <br/>                     
   
    <?php require_once '../app/views/templates/footer.php' ?>
