<?PHP

require_once("class.phpmailer.php");
require_once("formvalidator.php");

class FGMembersite
{
    var $admin_email;
    var $from_address;
    
    var $username;
    var $pwd;
    var $database;
    var $tablename;
    var $connection;    
    var $rand_key;
    
    var $error_message;
    
    //-----Initialization -------
    function FGMembersite()
    {
        $this->sitename = 'adurcup.com';
        $this->rand_key = '87T4Hm3aJEincT4m';
    }
    
    function InitDB($host,$uname,$pwd,$database,$tablename)
    {
        $this->db_host  = $host;
        $this->username = $uname;
        $this->pwd  = $pwd;
        $this->database  = $database;
        $this->tablename = $tablename;
        
    }
    function SetAdminEmail($email)
    {
        $this->admin_email = $email;
    }
    
    function SetWebsiteName($sitename)
    {
        $this->sitename = $sitename;
    }
    
    function SetRandomKey($key)
    {
        $this->rand_key = $key;
    }

    function personal_edit(){

        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }   
        $restaurant_name = $this->SanitizeForSQL($_POST['restaurant_name']);
        $owner_name = $this->SanitizeForSQL($_POST['owner_name']);
        $location = $this->SanitizeForSQL($_POST['location']);
        $address = $this->SanitizeForSQL($_POST['address']);
        $contact = $this->SanitizeForSQL($_POST['contact']);
        $pincode = $this->SanitizeForSQL($_POST['pincode']);
        $year = $this->SanitizeForSQL($_POST['year']);

        $email = $_SESSION['rest_email'];

        $qry = "Update adurzone Set restaurant_name='$restaurant_name',owner_name='$owner_name',location='$location',address='$address',contact='$contact',pincode='$pincode',year='$year' Where  email='$email'";
        
        if(!mysql_query( $qry ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$qry");
            return false;
        }      
        return true;
        
        

    }

    function SendAdminIntimationOnContact(&$formvars)
    {
      
        $mail = new PHPMailer;

        $mail->setFrom('info@adurcup.com', 'Admin Adurcup');
      
        $mail->addReplyTo('info@adurcup.com', 'Admin Adurcup');

        $mail->addAddress('adurcup@gmail.com', 'Adurcup');
     
        $mail->Subject = 'New Contact Message from -'.$formvars['name'];
       
        $mail->Body = "A new contact message at ".$this->sitename."<br>"."Name: ".$formvars['name']."<br>Email: ".$formvars['email']."<br>"."Subject: ".$formvars['subject']."<br>"."Message: ".$formvars['message'];

        $mail->AltBody = 'This is a plain-text message body';
    
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
       
        } 
        
    }


    function get_past_events(){

        if(!$this->DBLogin())
        {
            return false;
        } 
        $restaurant_email = $this->rest_email();
       
        $qry = mysql_query("SELECT * FROM rest_events where email='".$restaurant_email."'");
        
        $tablee_com =  "<div class='alert alert-warning col-md-6 col-md-offset-3' align='center' >
   
                                   No past events found. 
                                </div>
                                ";

        $total = mysql_num_rows($qry);
                if ($total == 0) {
                   echo $tablee_com;
                return ;
        }

        $i = 0;
         while( $row = mysql_fetch_array($qry) )
        {   
            
            $result = mysql_query("SELECT event_name, description, date_from, date_to FROM rest_events WHERE id='".$row['id']."' ") ;   
           if(!$result || mysql_num_rows($result) <= 0)
            {
                return false;
            }
        
            $ites = mysql_fetch_assoc($result);
            $event_name= $ites['event_name'];
            $description= $ites['description'];
            $date_from= $ites['date_from'];
            $date_to= $ites['date_to'];
           
            $i = $i + 1;
            $tablee_data =  "<div class='col-sm-4 col-md-4'>
                <img src='images/tpot_small.png' style='border-radius:50% 50% 50% 50%;height:70px;width:70px;background:#fff;border:1px solid #0086d4;position:absolute;top:25%;right:10%'>
                <div style='height:70px'>
                    <h3 class='well' style='background:#0086d4;color:#fff;margin-bottom:0px;border-radius:7px 7px 0 0;border:none;'>$event_name</h3>
                </div>
                <p style='padding:10px;background:#fff;color:#666;border-radius:0 0 7px 7px;border:2px solid #ccc;border-top:none'>
                    <i class='iconfont-calendar'></i> From : $date_from<br>
                    <i class='iconfont-calendar'></i> To : $date_to<br>
  
                </p>
            </div>
                ";

            echo $tablee_data;
          
           
    

        }

        return ;
    }



               
                function product()                     
                {
                    if(isset($_GET['id']))
                    {
                        if(!$this->DBLogin())
                        {

                            echo "Database login failed!";
                            return false;
                        } 


                        $item_id = $this->SanitizeForSQL($_GET['id']);
                        
                        $result = mysql_query("SELECT * FROM disposables_details where id='$item_id'");   
                        if(!$result || mysql_num_rows($result) <= 0)
                        {
                            
                            return false;
                        }
                        $row = mysql_fetch_assoc($result);
                     
                        return $row;
                    }
                    else{
                        return false;
                    }
                        
                }

    

    
    
        
        function CODOrderSubmit(){

            
            if(!$this->DBLogin())
            {
                echo "databse login failed ";
                return false;
            }
            $sql = mysql_query("SELECT `order_id` FROM cod_orders ORDER BY `order_id` DESC LIMIT 1") or die(mysql_error());
            if ($sql && mysql_num_rows($sql) > 0) {
                $row = mysql_fetch_assoc($sql);   
                $order_id = $row['order_id'] + 1;
            }
            else{
                $order_id = 1001;
            }    
            $firstname = $this->SanitizeForSQL($_POST["firstname"]);
            $amount = $this->SanitizeForSQL($_POST["amount"]);
            $productinfo = $this->SanitizeForSQL($_POST["productinfo"]);
            $email = $this->SanitizeForSQL($_POST["email"]);
            $phone= $this->SanitizeForSQL($_POST["phone"]);
            $address1= $this->SanitizeForSQL($_POST["address1"]);
            $zipcode= $this->SanitizeForSQL($_POST["zipcode"]);
  
            $tmpArr = array();
            $result_info = explode('##', $productinfo); 
            foreach ($result_info as $item) {
                $hello =  stripslashes($item);
                $final = json_decode($hello, true);
                

            $insert_query = 'insert into cod_orders(
                    order_id,
                    firstname,
                    amount,
                    item_id,
                    title,
                    thumbnail,
                    price,
                    qty,
                    email,
                    phone,
                    address1,
                    zipcode
                    )
                    values
                    (
                    "' .$order_id. '",
                    "' .$firstname. '",
                    "' .$amount. '",
                    "' .$final['id']. '",
                    "' .$final['title']. '",
                    "' .$final['thumbnail']. '",
                    "' .$final['price']. '",
                    "' .$final['qty']. '",
                    "' .$email. '",
                    "' .$phone. '",
                    "' .$address1. '",
                    "' .$zipcode. '"
                    )';      
            if(!mysql_query( $insert_query ,$this->connection))
            {
                $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
                return false;
            }        
               
          }
          return true; 

        }




    
    
    
    
    
    
    

    

    /*  ADVERTISER */


    function pending()
    {
        if(!$this->DBLogin())
        {
            return false;
        } 
        $id = $this->ad_id();
       
        $qry = mysql_query("SELECT * FROM interest_showed where advertiser_id='".$id."' AND status = 1 ORDER BY time_val DESC ");
        
        $tablee_com =  "<div class='alert alert-warning col-md-6 col-md-offset-3' align='center' >
   
                                   No results found . <a href='book.php'> Create a new Campaign now. </a>
                                </div>
                                ";

        $total = mysql_num_rows($qry);
                if ($total == 0) {
                   echo $tablee_com;
                return ;
        }

        $i = 0;
         while( $row = mysql_fetch_array($qry) )
        {   
            
            $result = mysql_query("SELECT * FROM rest_details_ad WHERE id='".$row['outlet_id']."'") ;   
            if(!$result || mysql_num_rows($result) <= 0)
            {
                return;
            }
            $item = mysql_fetch_assoc($result);
            $rest_id = $item['rest_id'];
            $advertiser_id = $_SESSION['ad_id'];
            $btn_text = "<button id='outlet_id_".$item['id']."' class='col-sm-10 col-sm-offset-1' style='padding:4px 0;margin-top:0px;font-size:16px;color:#fff;background:#dc6767;border:none;border-radius:4px;' onclick='delete_interest(".$item['id'].",".$item['rest_id'].")'>Cancel Request</button>" ;   // Click to Cancel
            

            $qry2 = "SELECT image_src from adurzone_images where rest_id='$rest_id' ";
             $result2 = mysql_query($qry2);
            if(!$result2 || mysql_num_rows($result2) <= 0)
            {
               $logo_src = 'no_image.png';     // no interset showed
       
            } 
            else{
                   $row2 = mysql_fetch_assoc($result2);
                   $logo_src = $row2['image_src'];

            }

            $html = "";

            $html .= "<div class='list-item box col-lg-4' style='padding:5px 10px'>";
            $html .= "  <div class='panel' style='border:1px solid #e5e5e5'>";
            $html .= "      <div class='panel-body' style='padding:8px 15px'>";
            $html .= "          <div class='profile'>";
            $html .= "              <div style='margin-bottom: 15px' class='row'>";


            $html .= "                  <div class='col-xs-12 col-sm-3 text-center' style='padding:0 2px;margin-bottom:5px'>";
            $html .= "                      <img src='images/avatar/$logo_src' alt='' style='display: inline-block;max-width:75px' class='img-responsive img-circle'/>";
            $html .= "                  </div>";
            $html .= "                  <div class='col-xs-12 col-sm-9'>";
            $html .= "                      <h2 style='padding:5px 0;font-size:25px;margin:0;color:#666'>" . $item['restaurant_name'] . "</h2>";
            $html .= "                          <p style='padding:0;margin:0;font-size:14px;color:#999'>" . $item['sub_location'] . "</p>";
/*          $html .= "                          <p style='padding:0;margin:0'><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star-o'></span></a></p>";*/
            $html .= "                  </div>";

            $html .= "                  <div class='col-xs-12 col-sm-12' style='float:left;border-top:1px solid #f5f5f5;padding:0px;font-size:14px'>";
            $html .= "                  <ul class='nav nav-tabs nav-justified'>";
            $html .= "                      <li class='active'><a data-toggle='tab' href='#".$item['id'].'-info'."'>Info</a></li>";
            $html .= "                      <li><a data-toggle='tab' href='#".$item['id'].'-advertisement'."'>Ad Options</a></li>";
            $html .= "                  </ul>";
            $html .= "                  <div class='tab-content'style='border:none;margin:0;padding-top:'>";
            $html .= "                      <div class='tab-pane active' id='".$item['id'].'-info'."'>";
            $html .= "                  <div class='col-xs-12 col-sm-3' style='padding:0 2px;margin-bottom:10px'>";
            $html .= "                      <p style='padding:0;margin:0;color:#de7047'>Service: </p>
                                            <p style='padding:0;margin:0;color:#de7047'>Profession:</p>
                                            <p style='padding:0;margin:0;color:#de7047'>Age:</p>";
            $html .= "                  </div>";
            $html .= "                  <div class='col-xs-12 col-sm-9'>";
            $html .= "                      <p style='padding:0;margin:0'>" . $item['service'] . "</p>";
            $html .= "                      <p style='padding:0;margin:0'>" . $item['section'] . "</p>";
            $html .= "                      <p style='padding:0;margin:0'>" . $item['age_group'] . "</p>";
            $html .= "                  </div>";
            $html .= "                      </div>";
            $html .= "                      <div class='tab-pane' id='".$item['id'].'-advertisement'."'>
                                    <ul class='social-icons list-unstyled list-inline mbl mtl' style='margin:0 !important'>";

        $qry3 = "SELECT * FROM ad_options INNER JOIN ad_items ON ad_options.ad_item_id=ad_items.item_id WHERE ad_options.rest_id = '$rest_id' ";

        $result3 = mysql_query($qry3);
         while( $row3 = mysql_fetch_array($result3, MYSQL_ASSOC) )
        {  
            $html .= "<li><kbd>".$row3['name']. "</kbd></li>";
          

        }
                                                       
            $html .= "  </ul></div>";
            $html .= "                  </div>";
            $html .= "                  </div>";
            
            $html .= "              </div>";
            $html .= "              <div class='row text-center' style='border-top:1px solid #f5f5f5'>";
            $html .= "                  <div class='col-xs-12 col-sm-6' style='padding-top:10px'>";
            $html .= "                      <h2>".$item['footfalls']."</h2>";
            $html .= "                      <p><small>Footfalls</small></p>";
            $html .= "                  </div>";
            $html .= "                  <div class='col-xs-12 col-sm-6' style='padding-top:10px'>";
            $html .= "                      <h2>".$item['coupons_distributed']."</h2>";
            $html .= "                      <p><small>Coupons Distributed</small></p>";
            $html .= "                  </div>";
            $html .= "              </div>";
            $html .= "              <div class='row text-center'>";
            $html .= $btn_text;
            $html .= "              </div>";
            $html .= "          </div>";
            $html .= "      </div>";
            $html .= "  </div>";
            $html .= "</div>";



            echo $html;
          
           
    

        }
        return;
    }

    function approved()
    {
        if(!$this->DBLogin())
        {
            return false;
        } 
        $id = $this->ad_id();
       
        $qry = mysql_query("SELECT * FROM interest_showed where advertiser_id='".$id."' AND status = 2 ORDER BY time_val DESC ");
        
        $tablee_com =  "<div class='alert alert-warning col-md-6 col-md-offset-3' align='center' >
   
                                   No results found . Please Wait for the approval or start a <a href='book.php'>new Campaign now. </a>
                                </div>
                                ";

        $total = mysql_num_rows($qry);
                if ($total == 0) {
                   echo $tablee_com;
                return ;
        }

         while( $row = mysql_fetch_array($qry) )
        {   
            
             $result = mysql_query("SELECT * FROM rest_details_ad WHERE id='".$row['outlet_id']."'") ;  
            if(!$result || mysql_num_rows($result) <= 0)
            {
                return;
            }
            $item = mysql_fetch_assoc($result);
            $rest_id = $item['rest_id'];
            $advertiser_id = $_SESSION['ad_id'];
            $btn_text = "<button id='rest_id_".$item['id']."' class='col-sm-10 col-sm-offset-1' style='padding:4px 0;margin-top:0px;font-size:16px;color:#fff;background:#33CC33;border:none;border-radius:4px;' disabled >Approved</button>" ; 
                

            $qry2 = "SELECT image_src from adurzone_images where rest_id='$rest_id' ";
             $result2 = mysql_query($qry2);
            if(!$result2 || mysql_num_rows($result2) <= 0)
            {
               $logo_src = 'no_image.png';     // no interset showed
       
            } 
            else{
                   $row2 = mysql_fetch_assoc($result2);
                   $logo_src = $row2['image_src'];

            }

            $html = "";
            $html .= "<div class='list-item box col-lg-4' style='padding:5px 10px'>";
            $html .= "  <div class='panel' style='border:1px solid #e5e5e5'>";
            $html .= "      <div class='panel-body' style='padding:8px 15px'>";
            $html .= "          <div class='profile'>";
            $html .= "              <div style='margin-bottom: 15px' class='row'>";


            $html .= "                  <div class='col-xs-12 col-sm-3 text-center' style='padding:0 2px;margin-bottom:5px'>";
            $html .= "                      <img src='images/avatar/$logo_src' alt='' style='display: inline-block;max-width:75px' class='img-responsive img-circle'/>";
            $html .= "                  </div>";
            $html .= "                  <div class='col-xs-12 col-sm-9'>";
            $html .= "                      <h2 style='padding:5px 0;font-size:25px;margin:0;color:#666'>" . $item['restaurant_name'] . "</h2>";
            $html .= "                          <p style='padding:0;margin:0;font-size:14px;color:#999'>" . $item['sub_location'] . "</p>";
/*          $html .= "                          <p style='padding:0;margin:0'><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star-o'></span></a></p>";*/
            $html .= "                  </div>";

            $html .= "                  <div class='col-xs-12 col-sm-12' style='float:left;border-top:1px solid #f5f5f5;padding:0px;font-size:14px'>";
            $html .= "                  <ul class='nav nav-tabs nav-justified'>";
            $html .= "                      <li class='active'><a data-toggle='tab' href='#".$item['id'].'-info'."'>Info</a></li>";
            $html .= "                      <li><a data-toggle='tab' href='#".$item['id'].'-advertisement'."'>Ad Options</a></li>";
            $html .= "                  </ul>";
            $html .= "                  <div class='tab-content'style='border:none;margin:0;padding-top:'>";
            $html .= "                      <div class='tab-pane active' id='".$item['id'].'-info'."'>";
            $html .= "                  <div class='col-xs-12 col-sm-3' style='padding:0 2px;margin-bottom:10px'>";
            $html .= "                      <p style='padding:0;margin:0;color:#de7047'>Service: </p>
                                            <p style='padding:0;margin:0;color:#de7047'>Profession:</p>
                                            <p style='padding:0;margin:0;color:#de7047'>Age:</p>";
            $html .= "                  </div>";
            $html .= "                  <div class='col-xs-12 col-sm-9'>";
            $html .= "                      <p style='padding:0;margin:0'>" . $item['service'] . "</p>";
            $html .= "                      <p style='padding:0;margin:0'>" . $item['section'] . "</p>";
            $html .= "                      <p style='padding:0;margin:0'>" . $item['age_group'] . "</p>";
            $html .= "                  </div>";
            $html .= "                      </div>";
            $html .= "                      <div class='tab-pane' id='".$item['id'].'-advertisement'."'>
                                    <ul class='social-icons list-unstyled list-inline mbl mtl' style='margin:0 !important'>";

        $qry3 = "SELECT * FROM ad_options INNER JOIN ad_items ON ad_options.ad_item_id=ad_items.item_id WHERE ad_options.rest_id = '$rest_id' ";

        $result3 = mysql_query($qry3);
         while( $row3 = mysql_fetch_array($result3, MYSQL_ASSOC) )
        {  
            $html .= "<li><kbd>".$row3['name']. "</kbd></li>";
          

        }
                                                       
            $html .= "  </ul></div>";
            $html .= "                  </div>";
            $html .= "                  </div>";
            
            $html .= "              </div>";
            $html .= "              <div class='row text-center' style='border-top:1px solid #f5f5f5'>";
            $html .= "                  <div class='col-xs-12 col-sm-6' style='padding-top:10px'>";
            $html .= "                      <h2>".$item['footfalls']."</h2>";
            $html .= "                      <p><small>Footfalls</small></p>";
            $html .= "                  </div>";
            $html .= "                  <div class='col-xs-12 col-sm-6' style='padding-top:10px'>";
            $html .= "                      <h2>".$item['coupons_distributed']."</h2>";
            $html .= "                      <p><small>Coupons Distributed</small></p>";
            $html .= "                  </div>";
            $html .= "              </div>";
            $html .= "              <div class='row text-center'>";
            $html .= $btn_text;
            $html .= "              </div>";
            $html .= "          </div>";
            $html .= "      </div>";
            $html .= "  </div>";
            $html .= "</div>";



            echo $html;

          
           
    

        }
        return;
    }
    
    function not_approved()
    {
        if(!$this->DBLogin())
        {
            return false;
        } 
        $id = $this->ad_id();
       
        $qry = mysql_query("SELECT * FROM interest_showed where advertiser_id='".$id."' AND status = 3 ORDER BY time_val DESC ");
        
        $tablee_com =  "<div class='alert alert-warning col-md-6 col-md-offset-3' align='center' >
   
                                   No results found . </a>
                                </div>
                                ";

        $total = mysql_num_rows($qry);
                if ($total == 0) {
                   echo $tablee_com;
                return ;
        }

        while( $row = mysql_fetch_array($qry) )
        {   
            
             $result = mysql_query("SELECT * FROM rest_details_ad WHERE WHERE id='".$row['outlet_id']."'") ;   
            if(!$result || mysql_num_rows($result) <= 0)
            {
                return;
            }
            $item = mysql_fetch_assoc($result);
            $rest_id = $item['rest_id'];
            $advertiser_id = $_SESSION['ad_id'];
            $btn_text = "<button id='rest_id_".$item['id']."' class='col-sm-10 col-sm-offset-1' style='padding:4px 0;margin-top:0px;font-size:16px;color:#fff;background:#7F7F7F;border:none;border-radius:4px;' disabled >Not Approved</button>" ; 
                

            $qry2 = "SELECT image_src from adurzone_images where rest_id='$rest_id' ";
             $result2 = mysql_query($qry2);
            if(!$result2 || mysql_num_rows($result2) <= 0)
            {
               $logo_src = 'no_image.png';     // no interset showed
       
            } 
            else{
                   $row2 = mysql_fetch_assoc($result2);
                   $logo_src = $row2['image_src'];

            }

            $html = "";
            $html .= "<div class='list-item box col-lg-4' style='padding:5px 10px'>";
            $html .= "  <div class='panel' style='border:1px solid #e5e5e5'>";
            $html .= "      <div class='panel-body' style='padding:8px 15px'>";
            $html .= "          <div class='profile'>";
            $html .= "              <div style='margin-bottom: 15px' class='row'>";


            $html .= "                  <div class='col-xs-12 col-sm-3 text-center' style='padding:0 2px;margin-bottom:5px'>";
            $html .= "                      <img src='images/avatar/$logo_src' alt='' style='display: inline-block;max-width:75px' class='img-responsive img-circle'/>";
            $html .= "                  </div>";
            $html .= "                  <div class='col-xs-12 col-sm-9'>";
            $html .= "                      <h2 style='padding:5px 0;font-size:25px;margin:0;color:#666'>" . $item['restaurant_name'] . "</h2>";
            $html .= "                          <p style='padding:0;margin:0;font-size:14px;color:#999'>" . $item['sub_location'] . "</p>";
/*          $html .= "                          <p style='padding:0;margin:0'><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star-o'></span></a></p>";*/
            $html .= "                  </div>";

            $html .= "                  <div class='col-xs-12 col-sm-12' style='float:left;border-top:1px solid #f5f5f5;padding:0px;font-size:14px'>";
            $html .= "                  <ul class='nav nav-tabs nav-justified'>";
            $html .= "                      <li class='active'><a data-toggle='tab' href='#".$item['id'].'-info'."'>Info</a></li>";
            $html .= "                      <li><a data-toggle='tab' href='#".$item['id'].'-advertisement'."'>Ad Options</a></li>";
            $html .= "                  </ul>";
            $html .= "                  <div class='tab-content'style='border:none;margin:0;padding-top:'>";
            $html .= "                      <div class='tab-pane active' id='".$item['id'].'-info'."'>";
            $html .= "                  <div class='col-xs-12 col-sm-3' style='padding:0 2px;margin-bottom:10px'>";
            $html .= "                      <p style='padding:0;margin:0;color:#de7047'>Service: </p>
                                            <p style='padding:0;margin:0;color:#de7047'>Profession:</p>
                                            <p style='padding:0;margin:0;color:#de7047'>Age:</p>";
            $html .= "                  </div>";
            $html .= "                  <div class='col-xs-12 col-sm-9'>";
            $html .= "                      <p style='padding:0;margin:0'>" . $item['service'] . "</p>";
            $html .= "                      <p style='padding:0;margin:0'>" . $item['section'] . "</p>";
            $html .= "                      <p style='padding:0;margin:0'>" . $item['age_group'] . "</p>";
            $html .= "                  </div>";
            $html .= "                      </div>";
            $html .= "                      <div class='tab-pane' id='".$item['id'].'-advertisement'."'>
                                    <ul class='social-icons list-unstyled list-inline mbl mtl' style='margin:0 !important'>";

        $qry3 = "SELECT * FROM ad_options INNER JOIN ad_items ON ad_options.ad_item_id=ad_items.item_id WHERE ad_options.rest_id = '$rest_id' ";

        $result3 = mysql_query($qry3);
         while( $row3 = mysql_fetch_array($result3, MYSQL_ASSOC) )
        {  
            $html .= "<li><kbd>".$row3['name']. "</kbd></li>";
          

        }
                                                       
            $html .= "  </ul></div>";
            $html .= "                  </div>";
            $html .= "                  </div>";
            
            $html .= "              </div>";
            $html .= "              <div class='row text-center' style='border-top:1px solid #f5f5f5'>";
            $html .= "                  <div class='col-xs-12 col-sm-6' style='padding-top:10px'>";
            $html .= "                      <h2>".$item['footfalls']."</h2>";
            $html .= "                      <p><small>Footfalls</small></p>";
            $html .= "                  </div>";
            $html .= "                  <div class='col-xs-12 col-sm-6' style='padding-top:10px'>";
            $html .= "                      <h2>".$item['coupons_distributed']."</h2>";
            $html .= "                      <p><small>Coupons Distributed</small></p>";
            $html .= "                  </div>";
            $html .= "              </div>";
            $html .= "              <div class='row text-center'>";
            $html .= $btn_text;
            $html .= "              </div>";
            $html .= "          </div>";
            $html .= "      </div>";
            $html .= "  </div>";
            $html .= "</div>";



            echo $html;
          
           
    

        }
        return;
    }
    
    function aduser_edit_pass()
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }   
        $password = $this->SanitizeForSQL($_POST['password']);
        $pwdmd5 = md5($password);
        $email = $_SESSION['ad_email'];

        $qry = "Update advertisers Set password='$pwdmd5' Where  email='$email'";
        
        if(!mysql_query( $qry ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$qry");
            return false;
        }    
        return true;
    }
    function aduser_edit_name()
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }   
        $name = $this->SanitizeForSQL($_POST['name']);
        $company_name = $this->SanitizeForSQL($_POST['company_name']);
        $contact = $this->SanitizeForSQL($_POST['contact']);
        $designation = $this->SanitizeForSQL($_POST['designation']);
        $nature_of_biz = $this->SanitizeForSQL($_POST['nature_of_biz']);
        $email = $_SESSION['ad_email'];
        $qry = "Update advertisers Set name='$name',company_name='$company_name',nature_of_biz='$nature_of_biz',designation='$designation',contact='$contact' Where  email='$email'";
        
        if(!mysql_query( $qry ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$qry");
            return false;
        }
        return true;
    }
    
    function AdLogin()
    {
        if(!isset($_POST['ad_logsubmitted']))
        {
           return false;
        }
        
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if(!isset($_SESSION)){ session_start(); }
        if(!$this->CheckAdLoginInDB($email,$password))
        {
         
            return false;


        }
        
        $_SESSION[$this->GetAdLoginSessionVar()] = $email;

        
        return true;
    }
     function CheckAdLoginInDB($emaill,$passwordd)
    {
        if(!$this->DBLogin())
        {
            echo "Database login failed!";
            return false;
        }          
        $email = $this->SanitizeForSQL($emaill);
        $pwd= $this->SanitizeForSQL($passwordd);
        $pwdmd5 = md5($pwd);
       
        $qry = "Select id,name,email,contact from advertisers where email='$email' and password='$pwdmd5' and confirmreg='y' ";
        
        $result = mysql_query($qry,$this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("Error logging in. The username or password does not match");
            return false;
        }
            
        
        $row = mysql_fetch_assoc($result);
        
        
        $_SESSION['ad_name']  = $row['name'];
        $_SESSION['ad_contact'] = $row['contact'];
        $_SESSION['ad_email'] = $row['email'];
        $_SESSION['ad_id'] = $row['id'];

        return true;
    }
   
    function ad_details(){
        if(!$this->DBLogin())
        {
            echo "Database login failed!";
            return false;
        } 
        $email = $_SESSION['ad_email'];
        $result = mysql_query("SELECT * FROM advertisers where email='$email'");   
        if(!$result || mysql_num_rows($result) <= 0)
        {
            return false;
        }
            $row = mysql_fetch_assoc($result);
            return $row;
    }
                    
    function ad_name()
    {
        return isset($_SESSION['ad_name'])?$_SESSION['ad_name']:'';
    }
    function ad_id()
    {
        return isset($_SESSION['ad_id'])?$_SESSION['ad_id']:'';
    }

   function ad_email()
    {
        return isset($_SESSION['ad_email'])?$_SESSION['ad_email']:'';
    }  

    function IsAdUnique($formvars,$fieldname)
    {
        $field_val = $this->SanitizeForSQL($formvars[$fieldname]);
        $qry = "select email from adurzone where $fieldname='".$field_val."'";
        $result = mysql_query($qry);   
        if($result && mysql_num_rows($result) > 0)
        {
            return false;
        }
        return true;
    }
    


    function CheckAdLogin()
    {
         if(!isset($_SESSION)){ session_start(); }

         $sessionvar = $this->GetAdLoginSessionVar();
         
         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
         return true;
    }
     function CheckRestLogin()
    {
         if(!isset($_SESSION)){ session_start(); }

         $sessionvar = $this->GetRestLoginSessionVar();
         
         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
         return true;
    }
    

    function LogOut()
    {
        session_start();
        
        $ad_sessionvar = $this->GetAdLoginSessionVar();
        $rest_sessionvar = $this->GetRestLoginSessionVar();
        $_SESSION[$ad_sessionvar]=NULL;
        $_SESSION[$rest_sessionvar]=NULL;
        unset($_SESSION[$ad_sessionvar]);
        unset($_SESSION[$rest_sessionvar]);
    }


    function GetAdLoginSessionVar()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'adver_'.substr($retvar,2,10);
        return $retvar;
    }
    function GetRestLoginSessionVar()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'rest_'.substr($retvar,1,10);
        return $retvar;
    }
   
    function previous_orders()
    {
        if(!$this->DBLogin())
        {
            return false;
        } 
        $restaurant_email = $this->rest_email();
       
        $qry = mysql_query("SELECT * FROM restaurant_orders where rest_email='".$restaurant_email."'");
        
        $tablee_com =  "<div class='alert alert-warning col-md-6 col-md-offset-3' align='center' >
   
                                   No previous orders found. 
                                </div>
                                ";

        $total = mysql_num_rows($qry);
                if ($total == 0) {
                   echo $tablee_com;
                return;
        }

        $i = 0;
         while( $row = mysql_fetch_array($qry) )
        {   
            
            $result = mysql_query("SELECT id,item,specification,quantity,advertisement,cost_per_unit,net_price,advertiser_price,type_print,order_time,status,image_src FROM restaurant_orders WHERE id='".$row['id']."' ") ;   
           if(!$result || mysql_num_rows($result) <= 0)
            {
                
                return false;
            }
        
            $ites = mysql_fetch_assoc($result);
             $idd= $ites['id'];
            $item= $ites['item'];
            $specification= $ites['specification'];
            $quantity= $ites['quantity'];
            $advertisement= $ites['advertisement'];
            $cost_per_unit= $ites['cost_per_unit'];
            $net_price= $ites['net_price'];
            $advertiser_price= $ites['advertiser_price'];
            $type_print= $ites['type_print'];
            $order_time= $ites['order_time'];
            $status= $ites['status'];
            $image_src= $ites['image_src'];
            $progress = "";
            if ($status=='In Progress') {
                $progress = "info";
            }
            if ($status=='Completed') {
                $progress = "success";
            }
            
            $i = $i + 1;
            $tablee_data =  "<tr class='$progress'>
                    <td>$i</td>
                    <td><img src='$image_src' style='width:50px;height:50px;padding-right:10px'></td>
                    <td>$item</td>
                    <td>$specification</td>
                    <td>$quantity</td>
                    <td>$net_price</td>
                    <td>$advertiser_price</td>
                    <td>$status</td>
                    <td style='background:#666;color:#fff;' align='center'><a href='#' style='color:#fff'>Repeat</a></td>
                </tr>
                ";

            echo $tablee_data;
          
           
    

        }

        return ;

    }
  
 


    function location()
    {
         if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } $emailll = $_SESSION['rest_email'];

        $qry = "SELECT location from adurzone where email='$emailll' ";
        
        $result = mysql_query($qry,$this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
           return ;
        }
        $row = mysql_fetch_assoc($result);
        return $row['location'];
    }


    
    //-------Public Helper functions -------------
    function GetSelfScript()
    {
        return htmlentities($_SERVER['PHP_SELF']);
    }    
    
    function SafeDisplay($value_name)
    {
        if(empty($_POST[$value_name]))
        {
            return'';
        }
        return htmlentities($_POST[$value_name]);
    }
    
    function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }
    
    function GetSpamTrapInputName()
    {
        return 'sp'.md5('KHGdnbvsgst'.$this->rand_key);
    }
    
    function GetErrorMessage()
    {
        if(empty($this->error_message))
        {
            return '';
        }
        $errormsg = nl2br(htmlentities($this->error_message));
        return $errormsg;
    }    
    //-------Private Helper functions-----------
    
    function HandleError($err)
    {
        $this->error_message .= $err."\r\n";
    }
    
    function HandleDBError($err)
    {
        $this->HandleError($err."\r\n mysqlerror:".mysql_error());
    }
    
    
    function GetFromAddress()
    {
        if(!empty($this->from_address))
        {
            return $this->from_address;
        }

        $host = $_SERVER['SERVER_NAME'];

        $from ="nobody@$host";
        return $from;
    } 

    function GetAbsoluteURLFolder()
    {
        $scriptFolder = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
        $scriptFolder .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);
        return $scriptFolder;
    }
    





















































    function SaveToDatabase(&$formvars)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        if(!$this->Ensuretable())
        {
            return false;
        }
        if(!$this->IsFieldUnique($formvars,'email'))
        {
            $this->HandleError("This email is already registered");
            return false;
        }
        
        if(!$this->IsFieldUnique($formvars,'username'))
        {
            $this->HandleError("This UserName is already used. Please try another username");
            return false;
        }        
        if(!$this->InsertIntoDB($formvars))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
        return true;
    }
    
    function IsFieldUnique($formvars,$fieldname)
    {
        $field_val = $this->SanitizeForSQL($formvars[$fieldname]);
        $qry = "select username from $this->tablename where $fieldname='".$field_val."'";
        $result = mysql_query($qry,$this->connection);   
        if($result && mysql_num_rows($result) > 0)
        {
            return false;
        }
        return true;
    }
    
    function DBLogin()
    {

        $this->connection = mysql_connect($this->db_host,$this->username,$this->pwd);

        if(!$this->connection)
        {  
            echo "Database Login failed! Please make sure that the DB login credentials provided are correct"; 
            $this->HandleDBError("Database Login failed! Please make sure that the DB login credentials provided are correct");
            return false;
        }
        if(!mysql_select_db($this->database, $this->connection))
        {
            echo "failed to select databse";
            $this->HandleDBError('Failed to select database: '.$this->database.' Please make sure that the database name provided is correct');
            return false;
        }
        
        return true;
    }    
    

    
    function InsertIntoDB(&$formvars)
    {
    
        $confirmcode = $this->MakeConfirmationMd5($formvars['email']);
        
        $formvars['confirmcode'] = $confirmcode;
        
        $insert_query = 'insert into '.$this->tablename.'(
                name,
                email,
                username,
                password,
                confirmcode
                )
                values
                (
                "' . $this->SanitizeForSQL($formvars['name']) . '",
                "' . $this->SanitizeForSQL($formvars['email']) . '",
                "' . $this->SanitizeForSQL($formvars['username']) . '",
                "' . md5($formvars['password']) . '",
                "' . $confirmcode . '"
                )';      
        if(!mysql_query( $insert_query ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }        
        return true;
    }
    function MakeConfirmationMd5($email)
    {
        $randno1 = rand();
        $randno2 = rand();
        return md5($email.$this->rand_key.$randno1.''.$randno2);
    }
    
    function SanitizeForSQL($str)
    {
        if( function_exists( "mysql_real_escape_string" ) )
        {
              $ret_str = mysql_real_escape_string( $str );
        }
        else
        {
              $ret_str = addslashes( $str );
        }
        return $ret_str;
    }
    
 /*
    Sanitize() function removes any potential threat from the
    data submitted. Prevents email injections or any other hacker attempts.
    if $remove_nl is true, newline chracters are removed from the input.
    */
    function Sanitize($str,$remove_nl=true)
    {
        $str = $this->StripSlashes($str);

        if($remove_nl)
        {
            $injections = array('/(\n+)/i',
                '/(\r+)/i',
                '/(\t+)/i',
                '/(%0A+)/i',
                '/(%0D+)/i',
                '/(%08+)/i',
                '/(%09+)/i'
                );
            $str = preg_replace($injections,'',$str);
        }

        return $str;
    }    
    function StripSlashes($str)
    {
        if(get_magic_quotes_gpc())
        {
            $str = stripslashes($str);
        }
        return $str;
    }    
}
?>