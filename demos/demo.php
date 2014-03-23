<!DOCTYPE html><head><?php
	include_once("../shared/IZPHPcore.php");
	include_once("../IZPHPupload.php");

$obj = new IZPHPupload;

// config $obj
$obj->set_file_types( "image/jpg|image/jpeg|image/pjpeg|image/gif|image/png" );
$obj->set_file_extensions( "jpg|jpeg|pjpeg|gif|png" );



$obj->upload( '../uploads/', 'files', 10002400 );


//$divisor = 0;
//if ($divisor == 0) {
//    trigger_error("Cannot divide by zero", E_USER_ERROR);
//}
?>

<style>
div.wrap{width:800px;min-height:400px;border:1px solid grey;border-radius:3px;box-shadow:0px 0px 12px;margin:80px auto;padding:10px;}
div.wrap > div.fl{height:200px;border:1px solid #666;border-radius:3px;}
div.wrap > div.fl > form.multipart0{width:100%;color:#666;font:15px Times New Romane;}
</style>
<div class="wrap">
	<h3>IZ_PHP php multiple file upload system - a very light weight.</h3>
	<div class="fl">
			
			
			<form enctype="multipart/form-data" id="multipart0" class="multipart0" name="multipart0" enctype="multipart" method="POST">
					<div class="upload_msg"><?php printf( $response_message ); ?></div>
					<br /><hr />
					<input type="file" name="files[]" multiple="true" />
					<br />
					<input type="submit" value=" Upload " />
			</form>
			
			
	</div>
</div>


</head>
<body>

</body>
</html>