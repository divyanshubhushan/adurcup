<?PHP

require_once("class.phpmailer.php");
require_once("formvalidator.php");
error_reporting(E_ERROR | E_PARSE);

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

    function updatePassword($get_code,$get_email)
    {

        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
            
        } 

        $newpass1 = $_POST['password'];
        $newpass2 = $_POST['confirmPassword'];

        if($newpass1 == $newpass2){
            $enc_pass = $newpass1;
            $qry = mysql_query("SELECT * FROM adurzone WHERE confirmreg = '".$get_code."'");   
            if(mysql_num_rows($qry)>0)
            {
                mysql_query("UPDATE adurzone SET password='".$enc_pass."', confirmreg='y' WHERE email = '".$get_email."'");
                return 0;
            }
            else{
                return 1;   // code expired
            }
            
        }
        else{
            return 2;     // password mismmatch
        }
        
        
    }

        function RestResetPass(){

        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }  
        $email = $this->SanitizeForSQL($_POST['email']);
        $query = mysql_query("SELECT * FROM adurzone where email='".$email."'");

        if(!$query){
            return false;
        }
        $numrow = mysql_num_rows($query);//tell how many rows are return by query.
        if($numrow>0){

                    $code = rand(10000,1000000);

                    $mail = new PHPMailer;

                    $mail->setFrom('info@adurcup.com', 'Admin Adurcup');
                  
                    $mail->addReplyTo('care@adurcup.com', 'Admin Adurcup');

                    $mail->addAddress($email);
                 
                    $mail->Subject = 'Password Reset Request -'.$email.' at adurcup.com';
                   
                    $mail->Body = "Hi,
                        Click the link below to reset the password.
                        http://www.adurcup.com/resetPassword?code=$code&email=$email";

                    $mail->AltBody = 'This is a plain-text message body';
                
                    if (!$mail->send()) {
                        return false;
                   
                    }
                    if(!mysql_query("UPDATE adurzone SET confirmreg='".$code."' WHERE email='".$email."'")){
                        return false;
                    }
                
                    return true;
                
            }else{
                return false;
            }

    }

    function send_message(){

        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }   
        $formvars = array();
        $formvars['name'] = $this->SanitizeForSQL($_POST['name']);
        $formvars['email'] = $this->SanitizeForSQL($_POST['email']);
        $formvars['subject'] = $this->SanitizeForSQL($_POST['subject']);
        $formvars['message'] = $this->SanitizeForSQL($_POST['message']);
    


        $insert_query = 'insert into contact_message(
                name,
                email,
                subject,
                message
                )
                values
                (
                "' .$formvars['name']. '",
                "' .$formvars['email']. '",
                "' .$formvars['subject']. '",
                "' .$formvars['message']. '"
                )';      
        if(!mysql_query( $insert_query ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        } 
        $this->SendAdminIntimationOnContact($formvars);

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

    
    function create_event(){

        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }   
        $event_name = $this->SanitizeForSQL($_POST['event_name']);
        $description = $this->SanitizeForSQL($_POST['description']);
        $date_from = $this->SanitizeForSQL($_POST['date_from']);
        $date_to = $this->SanitizeForSQL($_POST['date_to']);
        $email = $_SESSION['rest_email'];


        $insert_query = 'insert into rest_events(
                email,
                event_name,
                description,
                date_from,
                date_to
                )
                values
                (
                "' .$email. '",
                "' .$event_name. '",
                "' .$description. '",
                "' .$date_from. '",
                "' .$date_to. '"
                )';      
        if(!mysql_query( $insert_query ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }        
        return true;
        

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

    

































    
    //-------FOR showing items on PRODUCT.PHP  ---------------------

    /**** START ****/

               
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
                
                function product_material()                     
                {
                    if(isset($_GET['id']))
                    {
                        if(!$this->DBLogin())
                        {

                            echo "Database login failed!";
                            return false;
                        } 


                        $item_id = $this->SanitizeForSQL($_GET['id']);
                        
                        $result = mysql_query("SELECT tbl_sizes.size FROM tbl_productsizes LEFT JOIN tbl_sizes ON tbl_productsizes.sizeID = tbl_sizes.id where tbl_productsizes.productID='$item_id'");   
                    
                        if(!$result || mysql_num_rows($result) <= 0)
                        {
                            
                            return false;
                        }
                        $row = mysql_fetch_assoc($result);
                     
                        return $row['size'];
                    }
                    else{
                        return false;
                    }
                        
                }

    





















































    //-------Order Submit from checkout.php  ---------------------

    /**** START ****/
    
    
    
        
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
		    ad_option,
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
		    "' .$final['ad_option']. '",
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

          $mail = new PHPMailer;

            $mail->setFrom('info@adurcup.com', 'Admin Adurcup');
          
            $mail->addReplyTo($email, 'Admin Adurcup');

            $mail->addAddress('adurcup@gmail.com', 'Adurcup');
         
            $mail->Subject = 'New Order Placed -'.$firstname;
           
            $mail->Body = "A new order is placed. <br>"."Order Id: ".$order_id."<br>"."Name: ".$firstname."<br>"."<br>"."Amount: ".$amount."<br>"."<br>"."Email address: ".$email."<br>Contact: ".$phone."<br>Address : ".$address1;

            $mail->AltBody = 'This is a plain-text message body';
        
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
           
            }
          return true; 

        }




    
    
    
    
    
    
    

        function OrderSubmit(){

            if(!isset($_POST['status']))
            {
               return false;
            }
            
            
            if(!$this->DBLogin())
            {
                echo "databse login failed ";
                return false;
            }
            $status = $this->SanitizeForSQL($_POST["status"]);
            $firstname = $this->SanitizeForSQL($_POST["firstname"]);
            $amount = $this->SanitizeForSQL($_POST["amount"]);
            $txnid = $this->SanitizeForSQL($_POST["txnid"]);
            $productinfo = $this->SanitizeForSQL($_POST["productinfo"]);
            $email = $this->SanitizeForSQL($_POST["email"]);
        


            $insert_query = 'insert into payu_orders(
                    firstname,
                    amount,
                    productinfo,
                    email,
                    status
                    )
                    values
                    (
                    "' .$firstname. '",
                    "' .$amount. '",
                    "' .$productinfo. '",
                    "' .$email. '",
                    "' .$status. '"
                    )';      
            if(!mysql_query( $insert_query ,$this->connection))
            {
                $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
                return false;
            }        
            return true;
          

        }


        function get_payu_orders(){

           if(!$this->DBLogin())
        {
            return false;
        } 
        $restaurant_email = $this->rest_email();
       
        $qry = mysql_query("SELECT * FROM payu_orders where email='".$restaurant_email."'");
        
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
            
            $result = mysql_query("SELECT id,firstname, amount,productinfo,email,status FROM payu_orders WHERE id='".$row['id']."' ") ;   
           if(!$result || mysql_num_rows($result) <= 0)
            {
                
                return false;
            }
        
            $ites = mysql_fetch_assoc($result);
             $idd= $ites['id'];
            $firstname= $ites['firstname'];
            $amount= $ites['amount'];
            $productinfo= $ites['productinfo'];
            $status= $ites['status'];


            $product = json_decode($productinfo);
            $image_src = $product->thumbnail;
            $title = $product->title;
            $quantity = $product->qty;






            $email= $ites['email'];
          
            $i = $i + 1;
            $tablee_data =  "<tr class='success'>
                    <td>$i</td>
                    <td><img src='$image_src' style='width:50px;height:50px;padding-right:10px'></td>
                    <td>$title</td>
                    <td>$quantity</td>
                    <td>$amount</td>
                    
                    <td></td>
                    <td>$status</td>
                    <td style='background:#666;color:#fff;' align='center'><a href='#' style='color:#fff'>Repeat</a></td>
                </tr>
                ";

            echo $tablee_data;
          
           
    

        }

        return ;
          

        }
        
	 function get_cod_orders(){

           if(!$this->DBLogin())
        {
            return false;
        } 
        $restaurant_email = $this->rest_email();
       
        $qry = mysql_query("SELECT * FROM cod_orders where email='".$restaurant_email."'  GROUP BY order_id ");
        
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
            
            $result = mysql_query("SELECT * FROM cod_orders WHERE id='".$row['id']."'") ;   
           if(!$result || mysql_num_rows($result) <= 0)
            {
                
                return false;
            }
        
            $ites = mysql_fetch_assoc($result);
             $idd= $ites['id'];
             $order_id= $ites['order_id'];
            $amount= $ites['amount'];
            $order_date= $ites['order_date'];

            $status= $ites['status'];
          
            $i = $i + 1;
            $tablee_data =  "<tr class='success'>
                    <td>$i</td>
                    <td>$order_date</td>
                    <td class='order_id'>$order_id</td>
                    <td>$amount</td>
                    <td>$status</td>
                    <td ><a href='#' class='btn btn-default btn-lg btn-round reorder ' style='border-radius:5px;background:#0099cc;color:#fff;width:160px'><i class='iconfont-undo'></i>Repeat</a>
</td>
                </tr>
                ";

            echo $tablee_data;
          
           
    

        }

        return ;
          

        }
















































     /**** END ****/







/*
    * AFTER ZONE.PHP IS FILLED, USER DETAILES IS SAVED AND PROFILE IS GENERATED
    *
    *
    *
*/

    /**** Start ****/


    function cover_pic(){

        if(!$this->DBLogin())
        {
            echo "Database login failed!";
            return false;
        }          
        $emailll = $_SESSION['rest_email'];
        $qry = "SELECT image_path from images where rest_email='$emailll' ";
        
        $result = mysql_query($qry,$this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
            
             $uppl = "
                            <div id = 'hoho' style='margin:auto; width:130px;padding-top:80px;padding-bottom:220px'>
                                <img style='display:none' id='loader' src='loader.gif' alt='Loading....'' title='Loading....' />
                                <form id='cover_form' action='includes/ajaxupload.php' method='post' >

                                    <div style='height:0px;overflow:hidden'>
                                        <input id='uploadImage' type='file' accept='image/*' name='image'  onchange='submitForm();' />
                                        <input id='button' type='submit' value='Upload' style='display:none'>
                                    </div>
                                    <a id='uplload' onclick='chooseFile();' data-toggle='tooltip' data-placement='right' title='Click to Upload Photo'>
                                     <i class='iconfont-camera round-icon' style='font-size:65px;'></i>
                                 </a>
                                </form>
                            </div>
                            

                            

                    " ;
                echo $uppl;
                return ;

        }
        

        
        
        $row = mysql_fetch_assoc($result);
        
        
        $cover_url = 'uploads/users/cover'.$row['image_path'];
        $original_url = 'uploads/users/original'.$row['image_path'];

         echo "

                             

                                            
                                                <div class='cover-wrapper'>
                                                    <img src='$cover_url' class='img-responsive' alt='Cropped Image'>
                                                    <div class='cover-progress'>
                                                    </div>
                                                </div>
                                
                                                <div class='cover-resize-wrapper'>
                                                    <img class='img-responsive' src='$original_url' alt='Original Image'>
                                                    <div class='drag-div' align='center'>Drag to reposition</div>
                                                    <div class='cover-progress'></div>
                                                </div>

                                            
                                                    <div class='float-right span35'>
                                                        <div class='timeline-buttons cover-resize-buttons'>
                                                           
                                                            <table border='0' width='200' cellspacing='0' cellpadding='0' class='float-right' >
                                                                    <tr>
                                                                    <br>
                                                                <td align='center' valign='middle'>
                                                                    <a onclick='saveReposition();'>Save</a>
                                                                </td>
                                                                <td align='center' valign='middle'>
                                                                    <a onclick='cancelReposition();'>Cancel</a>
                                                                </td>
                                                                </tr>
                                                            </table>
                                                            <form class='cover-position-form hidden' method='post'>
                                                                <input class='cover-position' name='pos' value='0' type='hidden'>
                                                            </form>
                                                        </div>
                                                        
                                                        <div class='timeline-buttons default-buttons'>
                                                            
                                                            <table border='0' width='200' cellspacing='0' cellpadding='0' class='float-right' >
                                                                <tr>
                                                                    <br>
                                                                    <img style='display:none' id='loader' src='loader.gif' alt='Loading....'' title='Loading....' />
                                                                    <form id='form2' action='includes/ajaxupload.php' method='post' enctype='multipart/form-data'>
                                                                        <div style='height:0px;overflow:hidden'>
                                                                            <input id='uploadImage2' type='file' accept='image/*' name='image'  onchange='submitForm2();' />
                                                                            <input id='button2' type='submit' value='Upload' style='display:none'>
                                                                        </div>
                                                                        <td align='center' valign='middle'>
                                                                            <a onclick='chooseFile2();'>Change</a>
                                                                        </td>
                                                                    </form>
                                                                    <td >
                                                                        <a onclick='repositionCover();'>Reposition</a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                            
                                    

                             ";
        
        return ;

    }


 function public_cover_pic(){

        if(!$this->DBLogin())
        {
            echo "Database login failed!";
            return false;
        }          
        $rest_id = $_GET['rest_id'];
        $qry = "SELECT image_path from images where rest_id='$rest_id' ";
        
        $result = mysql_query($qry,$this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
            
             $uppl = "images/thumbs/5.jpg" ;
                echo $uppl;
                return ;

        }
        

        
        
        $row = mysql_fetch_assoc($result);
        
        
        $cover_url = 'uploads/users/cover'.$row['image_path'];
        $original_url = 'uploads/users/original'.$row['image_path'];

         echo $cover_url;
        
        return ;

    }



    /*  ADVERTISER */


    function AdRegister()
    {
        if(!isset($_POST['ad_regsubmitted']))
        {
           return false;
        }
        
        $formvars = array();
       
        $this->CollectAdSubmission($formvars);
        
        if(!$this->SaveAdToDatabase($formvars))
        {
           echo "save to database failed";              // need to edit to return proper error statement
            return false;
        }
      /*   if(!$this->build_profile($formvars))
        {
           echo "profile build failed";
            return false;
        }*/
        $this->SendAdvertiserUserConfirmationEmail($formvars);
     
        $this->SendAdminIntimationOnAdRegComplete($formvars);

        return true;
    }

    function SendAdvertiserUserConfirmationEmail(&$formvars)
    {
         $mail = new PHPMailer;

        $mail->setFrom('care@adurcup.com', 'Team Adurcup');
      
        $mail->addReplyTo('care@adurcup.com', 'Team Adurcup');

        $mail->addAddress($formvars['email'],$formvars['name']);
        
        $mail->Subject = 'Welcome to Adurcup';
       
        $mail->Body = "Hello ".$formvars['name']."<br>You are successfully registered with adurcup.com<br>"."Your account will be activated soon!<br>"."Regards<br>Team Adurcup";

        $mail->AltBody = 'This is a plain-text message body';
    
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
       
        }
    }
    function SendAdminIntimationOnAdRegComplete(&$formvars)
    {
        $mail = new PHPMailer;

        $mail->setFrom('info@adurcup.com', 'Admin Adurcup');
      
        $mail->addReplyTo('info@adurcup.com', 'Admin Adurcup');

        $mail->addAddress('adurcup@gmail.com', 'Adurcup');
     
        $mail->Subject = 'New Advertiser Signup -'.$formvars['name'];
       
        $mail->Body = "A new user registered at ".$this->sitename."<br>"."Name: ".$formvars['name']."<br>"."Company Name: ".$formvars['company_name']."<br>"."<br>"."Nature of business: ".$formvars['nature_of_biz']."<br>"."<br>"."Designation: ".$formvars['designation']."<br>"."Email address: ".$formvars['email']."<br>Contact: ".$formvars['contact'];

        $mail->AltBody = 'This is a plain-text message body';
    
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
       
        }
    }


    function SendAdminIntimationOnZoneRegComplete(&$formvars)
    {
      
        $mail = new PHPMailer;

        $mail->setFrom('info@adurcup.com', 'Admin Adurcup');
      
        $mail->addReplyTo('info@adurcup.com', 'Admin Adurcup');

        $mail->addAddress('adurcup@gmail.com', 'Adurcup');
     
        $mail->Subject = 'New Restaurant Signup -'.$formvars['restaurant_name'];
       
        $mail->Body = "A new user registered at ".$this->sitename."<br>"."Restaurant Name: ".$formvars['restaurant_name']."<br>Owner Name: ".$formvars['owner_name']."<br>"."Email address: ".$formvars['email']."<br>"."Address: ".$formvars['address']."<br>"."Contact: ".$formvars['contact'];

        $mail->AltBody = 'This is a plain-text message body';
    
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
       
        } 
        
    }

    
     function SendZoneUserConfirmationEmail(&$formvars)
    {
        if("" == trim($formvars['email']))
        {
            return;
        }
         $mail = new PHPMailer;

        $mail->setFrom('care@adurcup.com', 'Team Adurcup');
      
        $mail->addReplyTo('care@adurcup.com', 'Team Adurcup');

        $mail->addAddress($formvars['email'],$formvars['restaurant_name']);
     
        $mail->Subject = 'Welcome to Adurcup.com';
       
        $mail->Body = "Hello ".$formvars['owner_name']."<br>".$formvars['restaurant_name']." is successfully registered with adurcup.com<br>"."Your account will be activated soon!<br>"."Cheers!<br>Team Adurcup";

        $mail->AltBody = 'This is a plain-text message body';
    
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
       
        }
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
        
        $_SESSION['ad_id']  = $row['id'];
        $_SESSION['ad_name']  = $row['name'];
        $_SESSION['ad_contact'] = $row['contact'];
        $_SESSION['ad_email'] = $row['email'];

        return true;
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

 

   function CollectAdSubmission(&$formvars)
    {
         
        $formvars['name'] = $this->Sanitize($_POST['name']);
        $formvars['email'] = $this->Sanitize($_POST['email']);
        $formvars['password'] = $this->Sanitize($_POST['password']);
        $formvars['contact'] = $this->Sanitize($_POST['contact']);
        $formvars['company_name'] = $this->Sanitize($_POST['company_name']);
        $formvars['nature_of_biz'] = $this->Sanitize($_POST['nature_of_biz']);
        $formvars['designation'] = $this->Sanitize($_POST['designation']);

        
    }


    function SaveAdToDatabase(&$formvars)
    {
        if(!$this->DBLogin())
        {
            echo "databse login failed";
            return false;
        }
        /*if(!$this->IsZoneUnique($formvars,'email'))
        {
            $this->HandleError("This email is already registered");
            return false;
        }   */
        if(!$this->InsertAdIntoDB($formvars))
        {
            echo "inserting falied";
            return false;
        }
        return true;
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
    

   function InsertAdIntoDB(&$formvars)
    {
    
       
        
        
       
        
        $insert_query = 'INSERT INTO advertisers(
                name,
                company_name,
                nature_of_biz,
                designation,
                email,
                password,
                contact,
                confirmreg
                )
                values
                (
                "' . $this->SanitizeForSQL($formvars['name']) . '",
                "' . $this->SanitizeForSQL($formvars['company_name']) . '",
                "' . $this->SanitizeForSQL($formvars['nature_of_biz']) . '",
                "' . $this->SanitizeForSQL($formvars['designation']) . '",
                "' . $this->SanitizeForSQL($formvars['email']) . '",
                "' . md5($formvars['password']) . '",
                "' . $this->SanitizeForSQL($formvars['contact']) . '",
                "n"
                )';      
        if(!mysql_query($insert_query))
        {
            die(mysql_error());
            return false;
        }    

                
        return true;
    }




    /* ADVERTISER */


    function get_rest_details(){
        if(!$this->DBLogin())
        {
            echo "Database login failed!";
            return false;
        } 
        $email = $_SESSION['rest_email'];
        $result = mysql_query("SELECT * FROM adurzone where email='$email'");   
        if(!$result || mysql_num_rows($result) <= 0)
        {
            return false;
        }
            $row = mysql_fetch_assoc($result);
            return $row;
        }
                    


    function Addzone()
    {
        if(!isset($_POST['zone_submitted']))
        {
           return false;
        }
        
        $formvars = array();
       
        $this->CollectZoneSubmission($formvars);
        
        if(!$this->SaveZoneToDatabase($formvars))
        {
           echo "save to database failed";              // need to edit to return proper error statement
            return false;
        }
        /* if(!$this->build_profile($formvars))
        {
           echo "profile build failed";
            return false;
        }*/
        /*if(!$this->SendZoneUserConfirmationEmail($formvars))
        {
            return false;
        }*/
        $this->SendZoneUserConfirmationEmail($formvars);
  
        $this->SendAdminIntimationOnZoneRegComplete($formvars);
        
        
       
        
        return true;
    }

    function RestLogin()
    {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if(!isset($_SESSION)){ session_start(); }
        if(!$this->CheckRestLoginInDB($email,$password))
        {
            return false;
        }
        
        $_SESSION[$this->GetRestLoginSessionVar()] = $email;

        
        return true;
    }
     function CheckRestLoginInDB($emaill,$passwordd)
    {
        if(!$this->DBLogin())
        {
            echo "Database login failed!";
            return false;
        }          
        $email = $this->SanitizeForSQL($emaill);
        $pwdmd5 = $this->SanitizeForSQL($passwordd);
        $qry = "SELECT id,restaurant_name,owner_name,contact, email from adurzone where email='$email' and password='$pwdmd5' and confirmreg='y' ";
        
        $result = mysql_query($qry,$this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("Error logging in. The username or password does not match");
            return false;
        }
        
        $row = mysql_fetch_assoc($result);
        
        
        $_SESSION['restaurant_name']  = $row['restaurant_name'];
        $_SESSION['owner_name'] = $row['owner_name'];
        $_SESSION['contact'] = $row['contact'];
        $_SESSION['rest_email'] = $row['email'];

        return true;
    }

    

 

   function CollectZoneSubmission(&$formvars)
    {
         
        $formvars['restaurant_name'] = $this->Sanitize($_POST['restaurant_name']);
        $formvars['owner_name'] = $this->Sanitize($_POST['owner_name']);
        $formvars['email'] = $this->Sanitize($_POST['email']);
        $formvars['password'] = $this->Sanitize($_POST['password']);
        $formvars['contact'] = $this->Sanitize($_POST['contact']);
        $formvars['pincode'] = $this->Sanitize($_POST['pincode']);
        $formvars['zomato'] = $this->Sanitize($_POST['zomato']);
        $formvars['facebook'] = $this->Sanitize($_POST['facebook']);
        $formvars['location'] = $this->Sanitize($_POST['location']);
        $formvars['sub_location'] = $this->Sanitize($_POST['sub_location']);
        $formvars['address'] = $this->Sanitize($_POST['address']);
        $taste_string = implode(' , ', $_POST['taste']);
        $formvars['taste'] = $this->Sanitize($taste_string);
         $service_string = implode(' , ', $_POST['service']);
        $formvars['service'] = $this->Sanitize($service_string);

     /*   $formvars['space'] = $this->Sanitize($_POST['space']);*/
        $formvars['cost_for_2'] = $this->Sanitize($_POST['cost_for_2']);
        $formvars['year'] = $this->Sanitize($_POST['year']);

        $formvars['outlets'] = $this->Sanitize($_POST['outlets']);

        $age_group_string = implode(' , ', $_POST['age_group']);
        $formvars['age_group'] = $this->Sanitize($age_group_string);

        $section_string = implode(' , ', $_POST['section']);
        $formvars['section'] = $this->Sanitize($section_string);

        $formvars['sale_type'] = $this->Sanitize($_POST['sale_type']);

        $max_sale_string = implode(' , ', $_POST['max_sale']);
        $formvars['max_sale'] = $this->Sanitize($max_sale_string);

        $busy_hours_string = implode(' , ', $_POST['busy_hours']);
        $formvars['busy_hours'] = $this->Sanitize($busy_hours_string);

        $formvars['new_services'] = $this->Sanitize($_POST['new_services']);
        /*$formvars['paper_cups'] = $this->Sanitize($_POST['paper_cups']);
        $formvars['paper_plates'] = $this->Sanitize($_POST['paper_plates']);
        $formvars['napkins'] = $this->Sanitize($_POST['napkins']);
        $formvars['spoons'] = $this->Sanitize($_POST['spoons']);
        $formvars['carrybags'] = $this->Sanitize($_POST['carrybags']);
        $formvars['plastic_cups'] = $this->Sanitize($_POST['plastic_cups']);
        
        $disposable_string = implode(', ', $_POST['disposable']);
        $formvars['disposable'] = $this->Sanitize($disposable_string);*/

        $print_string = implode(' , ', $_POST['print']);
        $formvars['print'] = $this->Sanitize($print_string);

        $electronic_string = implode(' , ', $_POST['electronic']);
        $formvars['electronic'] = $this->Sanitize($electronic_string);

       $gaming_string = implode(' , ', $_POST['entertainment']);
        $formvars['entertainment'] = $this->Sanitize($gaming_string);

         $formvars['other'] = $this->Sanitize($_POST['other']);


    }
    


    function SaveZoneToDatabase(&$formvars)
    {
        if(!$this->DBLogin())
        {
            echo "databse login failed";
            return false;
        }
        /*if(!$this->IsZoneUnique($formvars,'email'))
        {
            $this->HandleError("This email is already registered");
            return false;
        }   */
        if(!$this->InsertZoneIntoDB($formvars))
        {
            echo "inserting falied";
            return false;
        }
        return true;
    }

    function build_profile(&$formvars)
    {      
         if(!$this->DBLogin())
        {
            echo "databse login failed ";
            return false;
        }
        
        $insert_query = 'INSERT INTO restaurants(
                
                restaurant_name,
                owner_name,
                email,
                password,
                contact
                )
                values
                (
                "' . $this->SanitizeForSQL($formvars['restaurant_name']) . '",
                "' . $this->SanitizeForSQL($formvars['owner_name']) . '",
                "' . $this->SanitizeForSQL($formvars['email']) . '",
                "' . $this->SanitizeForSQL($formvars['password']) . '",
                "' . $this->SanitizeForSQL($formvars['contact']) . '"
                )';      
        if(!mysql_query($insert_query))
        {
            die(mysql_error());
            return false;
        }
         
        if(!isset($_SESSION)){ session_start(); }

        $_SESSION[$this->GetRestLoginSessionVar()] = $formvars['email'];
            $_SESSION['restaurant_name']  = $formvars['restaurant_name'];
        $_SESSION['owner_name'] = $formvars['owner_name'];
        $_SESSION['contact'] = $formvars['contact'];
        $_SESSION['rest_email'] = $formvars['email'];
        
        
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
      function GetLoginSessionVar()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'usr_'.substr($retvar,0,10);
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
     function rest_uploaded_images(){

        if(!$this->DBLogin()){

            echo "Database login failed!";
            return false;
        }          
        $emailll = $_SESSION['rest_email'];
      /*  $emailll = "tpot@gmail.com";*/
        $qry = "SELECT * from user_uploads where email='$emailll' ORDER BY created_at ASC ";
        
             $results = mysql_query($qry,$this->connection);

                $count = 0;
                $total = mysql_num_rows($results);
                if ($total == 0) {
                   echo "<div class='alert alert-warning col-md-6 col-md-offset-3' align='center' >
   
                                   No images found.
                                </div>";
                                return;
                }
                
                    while($result = mysql_fetch_array($results)) {
                        /*if ($count++ > 4)
                        {
                            $remaining = $total - $count +1 ;
                            echo "  <a href='myzone.php/photos' > 
                                        <div class='preview more' style='display:inline'
                                        
                                        <span>+$remaining</span>
                                        
                                    </div>
                                    </a>
                                    ";
                            
                            break;
                        } */

                        $image_url = $result['image_name'];
                        $final_url = "uploads/".$image_url;
                        $array = "<div class='blowup' style='display:inline-block;'><a href='".$final_url."' data-toggle='lightbox'><img src='".$final_url."' class='previeww thumb' ></a></div>";
                        echo $array;
                    }
                


    }
  


    /*function CheckLoginInDB($email,$password)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }  
            
        $email = $this->SanitizeForSQL($email);
        $pwdmd5 = md5($password);
     
        $qry = "Select id, name, email, college from $this->tablename where email='$email' and password='$pwdmd5' and confirmcode='y'";
       
        $result = mysql_query($qry,$this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("Error logging in. The username or password does not match");
            return false;
        }
        
        $row = mysql_fetch_assoc($result);
        
        $_SESSION['id_of_user']  = $row['id'];
        $_SESSION['name_of_user']  = $row['name'];
        $_SESSION['email_of_user'] = $row['email'];
        $_SESSION['college_of_user'] = $row['college'];
        
        return true;
    }
*/



    function IsZoneUnique($formvars,$fieldname)
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
    

    function InsertZoneIntoDB(&$formvars)
    {
    
        
      
       
        
        $insert_query = 'INSERT INTO adurzone(
                restaurant_name,
                owner_name,
                email,
                password,
                contact,
                pincode,
                outlets,
                zomato,
                facebook,
                location,
                sub_location,
                address,
                taste,
                service,
                cost_for_2,
                year,
                age_group,
                section,
                print,
                sale_type,
                max_sale,
                busy_hours,
                new_services,
                electronic,
                entertainment,
                other,
                confirmreg

                )
                values
                (
                "' . $this->SanitizeForSQL($formvars['restaurant_name']) . '",
                "' . $this->SanitizeForSQL($formvars['owner_name']) . '",
                "' . $this->SanitizeForSQL($formvars['email']) . '",
                "' . $this->SanitizeForSQL($formvars['password']) . '",
                "' . $this->SanitizeForSQL($formvars['contact']) . '",
                "' . $this->SanitizeForSQL($formvars['pincode']) . '",
                "' . $this->SanitizeForSQL($formvars['outlets']) . '",
                "' . $this->SanitizeForSQL($formvars['zomato']) . '",
                "' . $this->SanitizeForSQL($formvars['facebook']) . '",
                "' . $this->SanitizeForSQL($formvars['location']) . '",
                "' . $this->SanitizeForSQL($formvars['sub_location']) . '",
                "' . $this->SanitizeForSQL($formvars['address']) . '",
                "' . $this->SanitizeForSQL($formvars['taste']) . '",
                "' . $this->SanitizeForSQL($formvars['service']) . '",
                "' . $this->SanitizeForSQL($formvars['cost_for_2']) . '",
                "' . $this->SanitizeForSQL($formvars['year']) . '",
                "' . $this->SanitizeForSQL($formvars['age_group']) . '",
                "' . $this->SanitizeForSQL($formvars['section']) . '",
                "' . $this->SanitizeForSQL($formvars['print']) . '",
                "' . $this->SanitizeForSQL($formvars['sale_type']) . '",
                "' . $this->SanitizeForSQL($formvars['max_sale']) . '",
                "' . $this->SanitizeForSQL($formvars['busy_hours']) . '",
                "' . $this->SanitizeForSQL($formvars['new_services']) . '",
                "' . $this->SanitizeForSQL($formvars['electronic']) . '",
                "' . $this->SanitizeForSQL($formvars['entertainment']) . '",
                "' . $this->SanitizeForSQL($formvars['other']) . '",
                "y"
                )';      
        if(!mysql_query($insert_query))
        {
            die(mysql_error());
            return false;
        }    

                
        return true;
    }
    
    function ConfirmUser()
    {
        if(empty($_GET['code'])||strlen($_GET['code'])<=10)
        {
            $this->HandleError("Please provide the confirm code");
            return false;
        }
        $user_rec = array();
        if(!$this->UpdateDBRecForConfirmation($user_rec))
        {
            return false;
        }
        
        $this->SendUserWelcomeEmail($user_rec);
        
        $this->SendAdminIntimationOnRegComplete($user_rec);
        
        return true;
    }    

    function UpdateDBRecForConfirmation(&$user_rec)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }   
        $confirmcode = $this->SanitizeForSQL($_GET['code']);
        
        $result = mysql_query("SELECT * FROM $this->tablename where confirmcode='$confirmcode'");   
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("Wrong confirm code.");
            return false;
        }
        $row = mysql_fetch_assoc($result);
        $user_rec['applicant_name'] = $row['applicant_name'];
        $user_rec['email']= $row['email'];
         $user_rec['company_name']= $row['company_name'];
          $user_rec['location']= $row['location'];
           $user_rec['sublocation']= $row['sublocation'];
            $user_rec['address']= $row['address'];
             $user_rec['type']= $row['type'];
              $user_rec['dimension']= $row['dimension'];
               $user_rec['cost']= $row['cost'];
                $user_rec['branding_high']= $row['branding_high'];
                 $user_rec['branding_medium']= $row['branding_medium'];
                  $user_rec['branding_low']= $row['branding_low'];
                   $user_rec['consumer_type']= $row['consumer_type'];
                   $user_rec['peak_seasons']= $row['peak_seasons'];
                   $user_rec['peak_hours']= $row['peak_hours'];
                   $user_rec['phone']= $row['phone'];
                    $user_rec['confirmcode']= $row['confirmcode'];
                     $user_rec['adminconfirmcode']= $row['adminconfirmcode'];


        
        $qry = "Update $this->tablename Set confirmcode='y' Where  confirmcode='$confirmcode'";
        
        if(!mysql_query( $qry ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$qry");
            return false;
        }      
        return true;
    }
        
    function storename()
    {
        return isset($_SESSION['restaurant_name'])?$_SESSION['restaurant_name']:'';
    }

   function ownername()
    {
        return isset($_SESSION['owner_name'])?$_SESSION['owner_name']:'';
    }

  
    function rest_email()
    {
        return isset($_SESSION['rest_email'])?$_SESSION['rest_email']:'';
    }
    function contact()
    {
        return isset($_SESSION['contact'])?$_SESSION['contact']:'';
    }
    function pincode()
    {
         if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } $emailll = $_SESSION['rest_email'];
        
        $qry = "SELECT pincode from adurzone where email='$emailll' ";
        
        $result = mysql_query($qry,$this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
           return ;
        }
        $row = mysql_fetch_assoc($result);
        return $row['pincode'];
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
    function sub_location()
    {
         if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 
        $emailll = $_SESSION['rest_email'];
        $qry = "SELECT sub_location from adurzone where email='$emailll' ";
        
        $result = mysql_query($qry,$this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
           return ;
        }
        $row = mysql_fetch_assoc($result);
        return $row['sub_location'];
    }

    function address()
    {
         if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        } 
        $emailll = $_SESSION['rest_email'];
        $qry = "SELECT address from adurzone where email='$emailll' ";
        
        $result = mysql_query($qry,$this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
           echo "string";
           return ;
        }
        $row = mysql_fetch_assoc($result);
        return $row['address'];
    }

   
 
    

    function SendUserWelcomeEmail(&$user_rec)
    {
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($user_rec['email'],$user_rec['name']);
        
        $mailer->Subject = "Welcome to ".$this->sitename;

        $mailer->From = $this->GetFromAddress();        
        
        $mailer->Body ="Hello ".$user_rec['name']."\r\n\r\n".
        "Welcome! Your registration  with ".$this->sitename." is completed.\r\n".
        "\r\n".
        "Regards,\r\n".
        "Webmaster\r\n".
        $this->sitename;

        if(!$mailer->Send())
        {
            $this->HandleError("Failed sending user welcome email.");
            return false;
        }
        return true;
    }


    function ConfirmUserbyAdmin()
    {
        if(empty($_GET['admincode'])||strlen($_GET['admincode'])<=10)
        {
            $this->HandleError("Please provide the confirm code");
            return false;
        }
        $user_rec = array();
        if(!$this->UpdateDBRecForbyAdmin($user_rec))
        {
            return false;
        }
        
        $this->SendUserIntimationOnRegComplete($user_rec);
        
        return true;
    }    
    
    function UpdateDBRecForbyAdmin(&$user_rec)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }   
        $adminconfirmcode = $this->SanitizeForSQL($_GET['admincode']);
        
        $result = mysql_query("Select applicant_name, email from $this->tablename where adminconfirmcode='$adminconfirmcode'",$this->connection);   
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("Wrong confirm code.");
            return false;
        }
        $row = mysql_fetch_assoc($result);
        $user_rec['applicant_name'] = $row['applicant_name'];
        $user_rec['email']= $row['email'];
        
        $qry = "Update $this->tablename Set adminconfirmcode='y' Where  adminconfirmcode='$adminconfirmcode'";
        
        if(!mysql_query( $qry ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$qry");
            return false;
        }      
        return true;
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
    
    
    
    
    

    
    
    

    function SendUserConfirmationEmail(&$formvars)
    {
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($formvars['email'],$formvars['name']);
        
        $mailer->Subject = "Your registration with ".$this->sitename;

        $mailer->From = $this->GetFromAddress();        
        
        $confirmcode = $formvars['confirmcode'];
        
        $confirm_url = $this->GetAbsoluteURLFolder().'/confirmreg.php?code='.$confirmcode;
        
        $mailer->Body ="Hello ".$formvars['name']."\r\n\r\n".
        "Thanks for your registration with ".$this->sitename."\r\n".
        "Please click the link below to confirm your registration.\r\n".
        "$confirm_url\r\n".
        "\r\n".
        "Regards,\r\n".
        "Webmaster\r\n".
        $this->sitename;

        if(!$mailer->Send())
        {
            $this->HandleError("Failed sending registration confirmation email.");
            return false;
        }
        return true;
    }
    function GetAbsoluteURLFolder()
    {
        $scriptFolder = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
        $scriptFolder .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);
        return $scriptFolder;
    }
    

    function ValidateZoneSubmission()
    {
        //This is a hidden input field. Humans won't fill this field.
        if(!empty($_POST[$this->GetSpamTrapInputName()]) )
        {
            //The proper error is not given intentionally
            $this->HandleError("Automated submission prevention: case 2 failed");
            return false;
        }
        
        $validator = new FormValidator();
        $validator->addValidation("name","req","Please fill in Name");
        $validator->addValidation("email","email","The input for Email should be a valid email value");
        $validator->addValidation("email","req","Please fill in Email");
        $validator->addValidation("username","req","Please fill in UserName");
        $validator->addValidation("password","req","Please fill in Password");

        
        if(!$validator->ValidateForm())
        {
            $error='';
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error .= $inpname.':'.$inp_err."\n";
            }
            $this->HandleError($error);
            return false;
        }        
        return true;
    }
    
    



















        //           MANUFACTURER OPERATIONS





























         //-------Main Operations ----------------------
/*    function RegisterManufacturer()
    {
        if(!isset($_POST['regsubmitted']))
        {
           return false;
        }
        
        $formvars = array();
        
        $this->CollectManufacturerSubmission($formvars);

       
        if(!$this->SaveManuToDatabase($formvars))
        {
            echo "saved faileddfas";
            return false;
        }
        
        if(!$this->SendManufacturerConfirmationEmail($formvars))
        {
            echo "confirmation sending failed";
            return false;
        }

        $this->SendManuAdminIntimationEmail($formvars);
        
        return true;
    }



     function CollectManufacturerSubmission(&$formvars)
    {
        $formvars['username'] = $this->Sanitize($_POST['username']);
        $formvars['email'] = $this->Sanitize($_POST['email']);
        $formvars['password'] = $this->Sanitize($_POST['password']);
    }

    function SaveManuToDatabase(&$formvars)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
      
        
        if(!$this->InsertManuIntoDB($formvars))
        {
            echo "Inserting to Database failed!";
            return false;
        }
        return true;
    }

     function IsManuUnique($formvars,$fieldname)
    {
        $field_val = $this->SanitizeForSQL($formvars[$fieldname]);
        $qry = "SELECT email from manufacturer where email='".$field_val."'";
        $result = mysql_query($qry,$this->connection);   
        if($result && mysql_num_rows($result) > 0)
        {
            return false;
        }
        return true;
    }
    function InsertManuIntoDB(&$formvars)
    {
    
        $confirmcode = $this->MakeConfirmationMd5($formvars['email']);
        
        $formvars['confirmcode'] = $confirmcode;
        
        $insert_query = 'INSERT INTO manufacturer(
                username,
                email,
               
                password,
                confirmcode
                )
                values
                (
                "' . $this->SanitizeForSQL($formvars['username']) . '",
                "' . $this->SanitizeForSQL($formvars['email']) . '",
           
                "' . md5($formvars['password']) . '",
                "' . $confirmcode . '"
                )';      
        if(!mysql_query( $insert_query ,$this->connection))
        {
            echo "Error inserting data to the table\nquery:$insert_query";
            return false;
        }        
        return true;
    }

     function SendManufacturerConfirmationEmail(&$formvars)
    {
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($formvars['email'],$formvars['username']);
        
        $mailer->Subject = "Your registration with ".$this->sitename;

        $mailer->From = $this->GetFromAddress();        
        
        $confirmcode = $formvars['confirmcode'];
        
        $confirm_url = $this->GetAbsoluteURLFolder().'/confirmreg.php?code='.$confirmcode;
        
        $mailer->Body ="Hello ".$formvars['username']."\r\n\r\n".
        "Thanks for your registration with ".$this->sitename."\r\n".
        "Please click the link below to confirm your registration.\r\n".
        "$confirm_url\r\n".
        "\r\n".
        "Regards,\r\n".
        "Webmaster\r\n".
        $this->sitename;

        if(!$mailer->Send())
        {
            $this->HandleError("Failed sending registration confirmation email.");
            return false;
        }
        return true;
    }
    function SendManuAdminIntimationEmail(&$formvars)
    {
        if(empty($this->admin_email))
        {
            return false;
        }
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($this->admin_email);
        
        $mailer->Subject = "New registration: ".$formvars['username'];

        $mailer->From = $this->GetFromAddress();         
        
        $mailer->Body ="A new user registered at ".$this->sitename."\r\n".
        "Name: ".$formvars['username']."\r\n".
        "Email address: ".$formvars['email']."\r\n".
        "UserName: ".$formvars['username'];
        
        if(!$mailer->Send())
        {
            return false;
        }
        return true;
    }
    function ManuLogin()
    {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if(!isset($_SESSION)){ session_start(); }
        if(!$this->CheckManuLoginInDB($email,$password))
        {
            return false;
        }
        
        $_SESSION[$this->GetLoginSessionVar()] = $email;
        
        return true;
    }
     function CheckManuLoginInDB($emaill,$passwordd)
    {
        if(!$this->DBLogin())
        {
            echo "Database login failed!";
            return false;
        }          
        $email = $this->SanitizeForSQL($emaill);
        $pwdmd5 = md5($passwordd);
        $qry = "Select id,username, email from manufacturer where email='$email' and password='$pwdmd5' and confirmcode='y'";
        
        $result = mysql_query($qry,$this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("Error logging in. The username or password does not match");
            return false;
        }
        
        $row = mysql_fetch_assoc($result);
        
        
        $_SESSION['name_of_manu']  = $row['username'];
        $_SESSION['email_of_manu'] = $row['email'];
        $_SESSION['id_of_manu'] = $row['id'];
        
        return true;
    }

    function CheckManuLogin()
    {
         if(!isset($_SESSION)){ session_start(); }

         $sessionvar = $this->GetLoginSessionVar();
         
         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
         return true;
    }
    
    function ManuFullName()
    {
        return isset($_SESSION['name_of_manu'])?$_SESSION['name_of_manu']:'';
    }

      
    function ManuEmail()
    {
        return isset($_SESSION['email_of_manu'])?$_SESSION['email_of_manu']:'';

    }

    function ManuId()
    {
        return isset($_SESSION['id_of_manu'])?$_SESSION['id_of_manu']:'';
    }
    
   




*/





















































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
    
    function Ensuretable()
    {
        $result = mysql_query("SHOW COLUMNS FROM $this->tablename");   
        if(!$result || mysql_num_rows($result) <= 0)
        {
            return $this->CreateTable();
        }
        return true;
    }
    
    function CreateTable()
    {
        $qry = "Create Table $this->tablename (".
                "id_user INT NOT NULL AUTO_INCREMENT ,".
                "name VARCHAR( 128 ) NOT NULL ,".
                "email VARCHAR( 64 ) NOT NULL ,".
                "phone_number VARCHAR( 16 ) NOT NULL ,".
                "username VARCHAR( 16 ) NOT NULL ,".
                "password VARCHAR( 32 ) NOT NULL ,".
                "confirmcode VARCHAR(32) ,".
                "PRIMARY KEY ( id_user )".
                ")";
                
        if(!mysql_query($qry,$this->connection))
        {
            $this->HandleDBError("Error creating the table \nquery was\n $qry");
            return false;
        }
        return true;
    }

          function CheckLoginInDB($username,$password)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }          
        $username = $this->SanitizeForSQL($username);
        $pwdmd5 = md5($password);
        $qry = "Select name, email from $this->tablename where username='$username' and password='$pwdmd5' and confirmcode='y'";
        
        $result = mysql_query($qry,$this->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("Error logging in. The username or password does not match");
            return false;
        }
        
        $row = mysql_fetch_assoc($result);
        
        
        $_SESSION['name_of_user']  = $row['name'];
        $_SESSION['email_of_user'] = $row['email'];
        
        return true;
    }

    function ResetUserPasswordInDB($user_rec)
    {
        $new_password = substr(md5(uniqid()),0,10);
        
        if(false == $this->ChangePasswordInDB($user_rec,$new_password))
        {
            return false;
        }
        return $new_password;
    }
    
    function ChangePasswordInDB($user_rec, $newpwd)
    {
        $newpwd = $this->SanitizeForSQL($newpwd);
        
        $qry = "Update $this->tablename Set password='".md5($newpwd)."' Where  id_user=".$user_rec['id_user']."";
        
        if(!mysql_query( $qry ,$this->connection))
        {
            $this->HandleDBError("Error updating the password \nquery:$qry");
            return false;
        }     
        return true;
    }
    
    function GetUserFromEmail($email,&$user_rec)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }   
        $email = $this->SanitizeForSQL($email);
        
        $result = mysql_query("Select * from $this->tablename where email='$email'",$this->connection);  

        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("There is no user with email: $email");
            return false;
        }
        $user_rec = mysql_fetch_assoc($result);

        
        return true;
    }
    
    
    function GetResetPasswordCode($email)
    {
       return substr(md5($email.$this->sitename.$this->rand_key),0,10);
    }
    
    function SendResetPasswordLink($user_rec)
    {
        $email = $user_rec['email'];
        
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($email,$user_rec['name']);
        
        $mailer->Subject = "Your reset password request at ".$this->sitename;

        $mailer->From = $this->GetFromAddress();
        
        $link = $this->GetAbsoluteURLFolder().
                '/resetpwd.php?email='.
                urlencode($email).'&code='.
                urlencode($this->GetResetPasswordCode($email));

        $mailer->Body ="Hello ".$user_rec['name']."\r\n\r\n".
        "There was a request to reset your password at ".$this->sitename."\r\n".
        "Please click the link below to complete the request: \r\n".$link."\r\n".
        "Regards,\r\n".
        "Webmaster\r\n".
        $this->sitename;
        
        if(!$mailer->Send())
        {
            return false;
        }
        return true;
    }
    
    function SendNewPassword($user_rec, $new_password)
    {
        $email = $user_rec['email'];
        
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($email,$user_rec['name']);
        
        $mailer->Subject = "Your new password for ".$this->sitename;

        $mailer->From = $this->GetFromAddress();
        
        $mailer->Body ="Hello ".$user_rec['name']."\r\n\r\n".
        "Your password is reset successfully. ".
        "Here is your updated login:\r\n".
        "username:".$user_rec['username']."\r\n".
        "password:$new_password\r\n".
        "\r\n".
        "Login here: ".$this->GetAbsoluteURLFolder()."/login.php\r\n".
        "\r\n".
        "Regards,\r\n".
        "Webmaster\r\n".
        $this->sitename;
        
        if(!$mailer->Send())
        {
            return false;
        }
        return true;
    }    
    
    function ValidateRegistrationSubmission()
    {
        //This is a hidden input field. Humans won't fill this field.
        if(!empty($_POST[$this->GetSpamTrapInputName()]) )
        {
            //The proper error is not given intentionally
            $this->HandleError("Automated submission prevention: case 2 failed");
            return false;
        }
        
        $validator = new FormValidator();
        $validator->addValidation("name","req","Please fill in Name");
        $validator->addValidation("email","email","The input for Email should be a valid email value");
        $validator->addValidation("email","req","Please fill in Email");
        $validator->addValidation("username","req","Please fill in UserName");
        $validator->addValidation("password","req","Please fill in Password");

        
        if(!$validator->ValidateForm())
        {
            $error='';
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error .= $inpname.':'.$inp_err."\n";
            }
            $this->HandleError($error);
            return false;
        }        
        return true;
    }
    
    function CollectRegistrationSubmission(&$formvars)
    {
        $formvars['name'] = $this->Sanitize($_POST['name']);
        $formvars['email'] = $this->Sanitize($_POST['email']);
        $formvars['username'] = $this->Sanitize($_POST['username']);
        $formvars['password'] = $this->Sanitize($_POST['password']);
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
