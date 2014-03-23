<?php session_start();

function droot( $v = 'last' )
{
		$d = $_SERVER['DOCUMENT_ROOT'];
		$exp = explode("/",$d);
		if( $v == 'last' )
		{
				return end( $exp );
		}
		elseif( $v == 'script_path' )
		{
		//Applications/MAMP/htdocs/izphp/file_upload/documentations/index.php"
				$exp = explode( droot( 'last' ) . "/", $_SERVER["SCRIPT_FILENAME"] );
				return end( $exp );
		}
}

if( ! defined( "HOSTNAME" ) ) define( "HOSTNAME", gethostname() );
if( ! defined( "DROOT_DIR" ) ) define( "DROOT_DIR", droot( 'last' ) );
if( ! defined( "DROOT_PATH" ) ) define( "DROOT_PATH", droot( 'script_path' ) );
if( ! defined( "DOMAINNAME" ) ) define( "DOMAINNAME", gethostname() );


$hostname		= gethostname();

$p_title		= "IZPHP file upload documentation";
$p_content		= "";


$g				= "p";
$gstr			= "IZPHPcore";
$gpath			= "documents/".$gstr.".php";

if( isset( $_GET[$g] ) && $_GET[$g] != "" )
{
		if( file_exists( "documents/".$_GET[$g].".txt" ) )
		{
				$gstr		= $_GET[$g];
				$gpath		= "documents/".$_GET[$g].".php";
				$p_title	= $gstr;
		}
}

$p_content		= file_get_contents( $gpath );

?>
<!DOCTYPE html>
<html>
<head>
<style>
body{background:#000;color:#FFF;margin:0;padding:0;font:14px Times New Romane;}
div.wrap{width:1000px;min-height:600px;color:#000;background:#FFF;margin:0px auto;}
div.rmenu{width:265px;border-right:1px solid #666;min-height:600px;float:left;margin:0;padding:0;}
ul.links{width:98%;margin:0;padding:0;}
ul.links > li > a{color:#5555C9;font:14px Times New Romane;display:block;background:#DCDCDC;margin:5px 0px;padding:5px 5px;text-decoration: none;}
ul.links > li > ol > li > a{color:#5555C9;text-decoration:none;display:block;}
ul.links > li > ol{margin:4px 25px; padding:0;}

div.content{width:720px;min-height:600px;margin-left:270px;font-family:Arial;line-height:18px;overflow-x:hidden;overflow-y:overlay;}
div.content > h3.content_title{color:#5555C9;font-family:fantasy;margin:5px 0px;padding:15px 0px 0px;}
div.nav{height:36px;background:#5555C9;color:#FFF;overflow:hidden;}
div.nav > h3.pn{margin:0;padding:12px 5px 0px;font-family:fantasy;}
div.body{padding:0px 5px;overflow-y:overlay;overflow-x:hidden;}
div.footer{}
</style>
<script>

</script>
<title><?php echo $p_title; ?></title>
</head>
<body>
<div class="wrap">
	<div class="nav">
		<h3 class="pn">IZPHP fileupload</h3>
	</div>
	<div class="body">
		<div class="rmenu">
			<ul class="links">
				<li><a href="<?php print DROOT_PATH; ?>?p=IZPHPcore">Introduction</a>
					<ol>
						<li><a href="<?php print DROOT_PATH; ?>?p=IZPHPcore">Introduction</a></li>
					</ol>
				</li>
				<li><a href="<?php print DROOT_PATH; ?>?p=IZPHPcore">Class IZPHPcore</a>
					<ol>
						<li><a href="<?php print DROOT_PATH; ?>?p=__construct">__construct()</a></li>
						<li><a href="<?php print DROOT_PATH; ?>?p=set_errmsg_display">set_errmsg_display()</a></li>
						<li><a href="<?php print DROOT_PATH; ?>?p=set_file_types">set_file_types()</a></li>
						<li><a href="<?php print DROOT_PATH; ?>?p=set_file_extensions">set_file_extensions()</a></li>
						<li><a href="<?php print DROOT_PATH; ?>?p=set_max_upload_size">set_max_upload_size()</a></li>
						<li><a href="<?php print DROOT_PATH; ?>?p=set_input_name">set_input_name()</a></li>
						<li><a href="<?php print DROOT_PATH; ?>?p=set_prefix">set_prefix()</a></li>
						<li><a href="<?php print DROOT_PATH; ?>?p=set_target_path">set_target_path()</a></li>
						<li><a href="<?php print DROOT_PATH; ?>?p=upload">upload()</a></li>
						<li><a href="<?php print DROOT_PATH; ?>?p=response_message">response_message - variable</a></li>
						<li><a href="<?php print DROOT_PATH; ?>?p=__construct">...0</a></li>
						<li><a href="<?php print DROOT_PATH; ?>?p=__construct">...1</a></li>
					</ol>
				</li>
				<li><a href="#">Class IZPHPupload</a>
					<ol>
						<li><a href="#">Introduction</a></li>
					</ol>
				</li>
			</ul>
		</div>
		<div class="content">
			<?php printf( $p_content ); ?>
			<?php  echo $hostname . "<br />";
			echo DROOT_DIR . "<br />";
			echo droot( 'script_path' ) . "<br />";
			var_dump( $_SERVER );
			 ?>
		</div>
	</div>
	<div class="footer">
	
	</div>
</div>
</body>
</html>