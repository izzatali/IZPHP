<?php
$response_message = "";

		/*********************************************************************************
		*	Author		: Izzat Ali
		*	E-mail		: shaheen_singer@yahoo.com
		*	Website		: http://www.jafariasa.com
		*	Name		: IZPHP file upload core class
		*	Start		: 21-03-2014 11:30:pm
		*	Update		: 22-03-2014 06:30:am
		*	Available	: http://www.jafariasa.com/?izphp=fileupload
		*	License		: GPL
		*	Copyright	: - Strictly should not be used in adult content environment!
		*				: Other than that, all else rights reserved.
		*	Copyright	: Url if available...
		*	Version		: 0.01
		*/
		
		/*********************************************************************************
		*	IZPHPcore Constants
		*/
		
		define('IZPHP_VERSION', '0.01');
		define('OBJECT', 'OBJECT', true);
		define('ARRAY_A', 'ARRAY_A', true);
		define('ARRAY_N', 'ARRAY_N', true);
		define('ALL', 'ALL', true);
		
class IZPHPcore
{

		/*********************************************************************************
		*	IZPHPcore vars
		*/
		
		var $return_value		= "";
		var $errors				= array();
		var $last_error			= "";
		var $cache				= array();
		var $display_errors		= true; // true=all, 1=last, 0=false, 
		var $display_error		= true;
		var $log_file			= 'error_log.txt';
		
		public function IZPHPcore()
		{
				// constructor...
		}
		
		public function err_msg( $message, $level )
		{
				
		}
		
		public function logger( $str )
		{
				if( ! file_exists( $this->log_file ) )
				{
						$c = fopen( $this->log_file, "w" );
						fclose( $c );
				}
				
				
				$current = date("D, d-M-Y- H:i:s a");
				$current .= " - ";
				$current .= $str . "\n";
				$current .= file_get_contents( $this->log_file );
				
				file_put_contents( $this->log_file, $current );
		}
		
		public function set_errmsg_display( $bool = false )
		{
				$this->display_errors = $bool;
		}
		
		public function formatBytes($size, $precision = 2)
		{
    			$base = log($size) / log(1024);
    			$suffixes = array('', 'KB', 'MB', 'GB', 'TB');   
				
			    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
			    /*USAGE
			    *	echo formatBytes(24962496);		23.81M
				*
				*	echo formatBytes(24962496, 0);	24M
				*
				*	echo formatBytes(24962496, 4);	23.8061M
				*/
		}
		
		public function grnstr()
		{
				$name = "";
				$date = date("DdMYHis");
				$rand = rand(1000000000,0000000000);
				$name = $date.$rand;
				$exp = explode("//",$name);
				$name = ($name."_".(COUNT($exp)));
				return $name;
				
		}
		
}
