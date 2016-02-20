<div class="modal fade" id="login-modal" tabindex="-1">
    <div class="modal-dialog sign_up_modal" >
                                                <div class="modal-content">
                                                    <div class="modal-header login_modal_header " style="background-color:#F5F5F5">
                                                        

                                                        <h2 class="modal-title" id="myModalLabel" style="font-size:1.5em">Login to your account </h2>
                                                        <?php echo isset($response) ? $response: '';?>
                                                        <!-- CONTACT FORM ALERTS -->
                                                        <div class="alert alert-success" id="mail_sent" style="display: none;">
                                                          <button type="button" class="close" data-dismiss="alert">x</button>
                                                          <div class="alert-inner">
                                                            <strong>Thanks,</strong> Your Password is reset successfully. Check your mail.
                                                          </div>
                                                        </div>
                                                        <!-- /success msg -->
                                                        <!-- CONTACT FORM ALERTS -->
                                                        <div class="alert alert-warning" id="email_not_found" style="display: none;">
                                                          <button type="button" class="close" data-dismiss="alert">x</button>
                                                          <div class="alert-inner">
                                                            <strong>Sorry!</strong> Email not found.
                                                          </div>
                                                        </div>
                                                        <!-- /success msg -->
                                                        <!-- CONTACT FORM ALERTS -->
                                                        <div class="alert alert-danger" id="reset_failure" style="display: none;">
                                                          <button type="button" class="close" data-dismiss="alert">x</button>
                                                          <div class="alert-inner">
                                                            <strong>Error!</strong>Please try again.
                                                          </div>
                                                        </div>
                                                        <!-- /success msg -->
                                                    </div>

                                                    <div class="modal-body login-modal" >
                                                        <div class="tabbable">
                                                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                                                <li class="active"><a href="#pane1" data-toggle="tab" style="font-size:14px;text-transform:none;font-weight:400">I am a Restaurant</a></li>
                                                                <li><a href="#pane2" data-toggle="tab" style="font-size:14px;text-transform:none;font-weight:400">I am an Advertiser</a></li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div id="pane1" class="tab-pane active">
                                                                    <div id='rest_login' style="padding-top:15px">
                                                                         <form action="<?= $fgmembersite->GetSelfScript(); ?>" id="login_forum" method="post" name="login_forum">
                                                                            <input id='rest_logsubmitted' name='rest_logsubmitted' type='hidden' value='1'>

                                                                            <div class='modal-body-center'>
                                                                                <div class="form-group">
                                                                                    <input autocomplete="off" class="form-control login-field" id="username" name="email" placeholder="Email" required="" style="padding-left:20%" type="email"
                                                                                    value=""> <i class="iconfont-envelope login-field-icon"></i>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <input autocomplete="off" class="form-control login-field" id="login-pass" name="password" placeholder="Password" required="" style="padding-left:20%" type=
                                                                                    "password" value=""> <i class="iconfont-lock login-field-icon"></i>
                                                                                </div><button class="btn btn-success modal-login-btn">Log In</button> <a class=" text-center" id="rest_reset_link" style="text-decoration:underline" href="#">Lost your password?</a>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                     <div id='rest_reset'  style="padding-top:15px;display:none">
                                                                             <form action="post_reset.php" id="rest_reset_form" method="post" name="rest_reset_form">
                                                                                <input id='rest_resetsubmitted' name='rest_resetsubmitted' type='hidden' value='1'>

                                                                                <div class='modal-body-center' style="padding:10% 4% 7% 4%">
                                                                                    <div class="form-group" style="margin-bottom:26px">
                                                                                        <input autocomplete="off" class="form-control login-field" id="username" name="email" placeholder="Email" required="" style="padding-left:20%" type="email"
                                                                                        value=""> <i class="iconfont-envelope login-field-icon"></i>
                                                                                    </div>

                                                                                   <button class="btn btn-success modal-login-btn">Reset Password</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                

                                                                    <div class="form-group">
                                                                        <p class="state_info" style="float:left;margin-top:10px;padding-left:30px;font-size:14px">Don't have an account?</p>
                                                                        <a class="btn btn-success  modal-register-btn register-button" style="margin-right:20px;display:none" href="#" id="rest_login_btn">Login</a>
                                                                        <a class="btn btn-success  modal-register-btn register-button" style="margin-right:20px" href="zone" id="rest_register_btn">Register</a>
                                                                    </div>
                                                                </div>
                                                                <div id="pane2" class="tab-pane">
                                                                     
                                                                        <div id='ad_login'  style="padding-top:15px">
                                                                             <form action="<?= $fgmembersite->GetSelfScript(); ?>" id="ad_login_form" method="post" name="ad_login_form">
                                                                                <input id='ad_logsubmitted' name='ad_logsubmitted' type='hidden' value='1'>

                                                                                <div class='modal-body-center'>
                                                                                    <div class="form-group">
                                                                                        <input autocomplete="off" class="form-control login-field" id="username" name="email" placeholder="Email" required="" style="padding-left:20%" type="email"
                                                                                        value=""> <i class="iconfont-envelope login-field-icon"></i>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <input autocomplete="off" class="form-control login-field" id="login-pass" name="password" placeholder="Password" required="" style="padding-left:20%" type=
                                                                                        "password" value=""> <i class="iconfont-lock login-field-icon"></i>
                                                                                    </div><button class="btn btn-success modal-login-btn">Log In</button> <a class=" text-center" id="ad_reset_link" style="text-decoration:underline" href="#">Lost your password?</a>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                         <div id='ad_reset'  style="padding-top:15px;display:none">
                                                                             <form action="<?= $fgmembersite->GetSelfScript(); ?>" id="ad_reset_form" method="post" name="ad_reset_form">
                                                                                <input id='ad_resetsubmitted' name='ad_resetsubmitted' type='hidden' value='1'>

                                                                                <div class='modal-body-center' style="padding:10% 4% 7% 4%">
                                                                                    <div class="form-group" style="margin-bottom:26px">
                                                                                        <input autocomplete="off" class="form-control login-field" id="username" name="email" placeholder="Email" required="" style="padding-left:20%" type="email"
                                                                                        value=""> <i class="iconfont-envelope login-field-icon"></i>
                                                                                    </div>

                                                                                   <button class="btn btn-success modal-login-btn">Reset Password</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div id='ad_register'  style="padding-top:15px;display:none">
                                                                             <form action="<?= $fgmembersite->GetSelfScript(); ?>" id="ad_reg_form" method="post" name="ad_reg_form">
                                                                                <input id='ad_regsubmitted' name='ad_regsubmitted' type='hidden' value='1'>

                                                                                <div class='modal-body-center'>

                                                                                    <div class="form-group">
                                                                                        <input autocomplete="off" class="form-control login-field" id="name" name="name" placeholder="Full Name" required="" style="padding-left:20%" type="text"
                                                                                        value=""> <i class="iconfont-user login-field-icon"></i>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <input autocomplete="off" class="form-control login-field" id="email" name="email" placeholder="Email" required="" style="padding-left:20%" type="email"
                                                                                        value=""> <i class="iconfont-envelope login-field-icon"></i>
                                                                                    </div>

                                                                                
                                                                                 
                                                                                        <div class="form-group">
                                                                                           <input autocomplete="off" class="form-control login-field" id="contact" name="contact" placeholder="Mobile no." required="" style="padding-left:20%" type="number"
                                                                                            value=""> <i class="iconfont-mobile login-field-icon"></i>
                                                                                        
                                                                                        </div>
                                                                                    
                                                                                        <div class="form-group">
                                                                                           <input autocomplete="off" class="form-control login-field" id="password" name="password" placeholder="Password" type="password" required="" style="padding-left:20%"
                                                                                            value=""> <i class="iconfont-lock login-field-icon"></i>
                                                                                        
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                           <input autocomplete="off" class="form-control login-field" id="confirmpassword" name="confirmpass" type="password" placeholder="Confirm Password" required="" style="padding-left:20%" type="text"
                                                                                            value=""> <i class="iconfont-lock login-field-icon"></i>
                                                                                        
                                                                                        </div>

                                                                                    


                                                                                    <button class="btn btn-success modal-login-btn button_info" type="submit">Log In</button> <a class="login-link register_forgot text-center" style="text-decoration:underline" href="#">Lost your password?</a>
                                                                                </div>
                                                                            </form>
                                                                        </div>


                                                                     <div class="form-group">
                                                                        <p class="state_info" style="float:left;margin-top:10px;padding-left:30px;font-size:14px">Don't have an account?</p>
                                                                        <a class="btn btn-success  modal-register-btn register-button" style="margin-right:20px;display:none" href="#" id="ad_login_btn">Login</a>
                                                                        <a class="btn btn-success  modal-register-btn register-button" style="margin-right:20px" href="#" id="ad_register_btn">Register</a>
                                                                    </div>

                                                                </div>
                                                               
                                                            </div>
                                                           
                                                        </div>
                                                       

                                                        
                                                       
                                                    </div>

                                                    <div class="clearfix"></div>

                                                    <div class="modal-footer login_modal_footer"></div>
                                                </div>
                                            </div>         
</div>
