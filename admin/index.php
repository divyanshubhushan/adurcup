<?PHP
require_once("include/membersite_config.php");
if($fgmembersite->CheckLogin())
   {
        $fgmembersite->RedirectToURL("dashboard.php");
   }
if(isset($_POST['submitted']))
{
   if($fgmembersite->Login())
   {
        $fgmembersite->RedirectToURL("dashboard.php");
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Adurcup Admin panel</title>
	<meta name="description" content="Adurcup Database Dashboard">
	<meta name="author" content="Harshit Mittal">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->

	<style type="text/css">
		body {
	background: #eee !important;	
}

.wrapper{
	margin-top: 50px;
}


.form-signin {
  max-width: 420px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1); 
  } 

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;

	
	}


	input[type="text"] {
	  margin-bottom: 10px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	  border-radius: 8px;
	  width: 96% !important;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	  border-radius: 8px;
	  width: 96% !important;
	}

	</style>
	
		
		
		
</head>

<body>
		
	<a class="logo" align="center" href="http://www.adurcup.com" style="padding-left:100px" ><img  src="img/logo.png" alt="Adurcup home" ></a>
			<div class="wrapper">
				<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
			    <form class="form-signin" id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>  
			    	<input type='hidden' name='submitted' id='submitted' value='1'/>    
			      <h2 align="center" class="form-signin-heading">Adurcup Admin Panel</h2>
			      <input type="text" class="col-md-12 form-control" name="username" placeholder="Username" required="" autofocus="" />
			      <input type="password" class="col-md-12 form-control" name="password" placeholder="Password" required=""/>      
			      
			      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
			    </form>
			  </div>
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		
</body>
</html>
