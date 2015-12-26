<!doctype html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Ajax Image Upload with jQuery - w3bees.com</title>
	<!-- scripts -->
	<script type="text/javascript" src="js/jquery.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript">
    function submitForm() {
        // However you need to submit the form

        document.getElementById("button").click(); // Or whatever
    }
	</script>
	<style>
	

	.wrap{
		width: 700px;
		margin: 10px auto;
		padding: 10px 15px;
		background: white;
		border: 2px solid #DBDBDB;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		text-align: center;
		overflow: hidden;
	}
	#preview {
		color: red;
	}
	#preview img{
		margin-top: 30px;
		max-width: 100%;
		border: 0;
		border-radius: 3px;
		-webkit-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
		box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
		overflow: hidden;
	}
	input[type="submit"]{
		border-radius: 10px;
		background-color: #61B3DE;
		border: 0;
		color: white;
		font-weight: bold;
		font-style: italic;
		padding: 6px 15px 5px;
		cursor: pointer;
	}
	</style>
</head>
<body>
<div class="wrap">
	<h1><a href="">Ajax Image Upload with jQuery</a></h1>
	<p>Valid formats: jpeg, gif, png, Max upload: 200kb</p>
	<!-- loader.gif -->
	
	<!-- simple file uploading form -->
	<form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data">


		<input id="uploadImage" type="file" accept="image/*" name="image"  onchange="submitForm();" />
		<input id="button" type="submit" value="Upload" style="display:none">
	</form>
	<!-- preview action or error msgs -->
	<div id="preview" style="display:none"></div>
	
</div><!--wrap-->
</body>
</html>