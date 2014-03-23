<?php
class IZPHPupload extends IZPHPcore
{
		
		function IZPHPupload()
		{
				// constructor
				
		}
		
		
		/*********************************************************************************
		*	public function upload( $a = 'files' )
		*	is a function that uploads files from the client's machine to the server.
		*	It needs one parameter. This parameter is assinged to local scope variable
		*	$fa. When this function is called, the parameter should be passed so that
		*	php's global $_FILES[] array can be accessed. Otherwise, no file will be
		*	uploaded!
		*
		*/
		
		var $allowed_file_types 		= array("image/jpg");
		var $allowed_file_extensions 	= array("jpg");
		var $max_upload_size			= 10002400;
		var $file_name					= array();
		var $file_new_name				= array();
		var $file_type					= array();
		var $file_size					= array();
		var $file_tmp					= array();
		var $file_ext					= array();
		var $FILES_NAME					= null;
		var $file_moved					= array();
		var $file_prefix				= "image_";
		var $file_target_folder			= null;
		
		public function set_file_types( $types = "image/jpg|iamge/gif" )
		{		
		
				if( $types == '' || is_numeric( $types ) || $types == null )
				{
						$this->logger( "\$types parameter of set_file_types in ".__FILE__." on line ".__LINE__." is not correct or sent empty." );
						trigger_error("Function set_file_types arguemnet 1 is not accepted.".E_USER_WARNING);
				}
				
				$exp = @explode( "|", $types );
				
				for( $i = 0; $i < COUNT( $exp ); $i++ )
				{
						$this->allowed_file_types[$i] = $exp[$i];
				}
				return $this->allowed_file_types;
		}
		
		public function set_file_extensions( $exts = "jpg|gif" )
		{
				$exp = explode( "|", $exts );
				
				for( $i = 0; $i < COUNT( $exp ); $i++ )
				{
						$this->allowed_file_extensions[$i] = $exp[$i];
				}
				return $this->allowed_file_extensions;
		}
		
		public function set_max_upload_size( $size = 10002400 )
		{
				$this->max_upload_size = $size;
				return $this->formatBytes( $this->max_upload_size, 2 );
		}
		
		public function set_input_name( $name = 'files' )
		{
				$this->FILES_NAME = $name;
				return $this->FILES_NAME;
		}
		
		public function set_prefix( $prefix = 'image_' )
		{
				$this->file_prefix = $prefix;
				return $this-file_prefix;
		}
		
		public function set_target_path( $path = 'uploads/' )
		{
				$this->file_target_folder = $path;
				return $this->file_target_folder;
		}
		
		public function upload( $dir = 'uploads/', $fa = 'files', $msize = 1024 )
		{
				
				global $response_message;
				
				$this->FILES_NAME = $fa;
				$this->file_target_folder = $dir;
				$this->max_upload_size = $msize;
				
				if( isset($_FILES[$this->FILES_NAME]["name"]) )
				{
						for( $i = 0; $i < COUNT( $_FILES[$this->FILES_NAME]["name"] ); $i++ )
						{
							
								$this->file_name[$i]		= $_FILES[$this->FILES_NAME]["name"][$i];
								$this->file_type[$i]		= $_FILES[$this->FILES_NAME]["type"][$i];
								$this->file_size[$i]		= $_FILES[$this->FILES_NAME]["size"][$i];
								$this->file_tmp[$i]			= $_FILES[$this->FILES_NAME]["tmp_name"][$i];
								$exp = explode( ".", $this->file_name[$i] );
								$this->file_ext[$i]			= end( $exp );
								
								if( $this->file_size[$i] > $this->max_upload_size )
								{
										$response_message .= "Allowed file size is ".$this->formatBytes($this->max_upload_size).". The file you are trying to upload is ".$this->formatBytes($this->file_size[$i])."<br />";
								}
								elseif( ! in_array( $this->file_type[$i], $this->allowed_file_types ) )
								{
										$response_message .= "We do not allow upload of ".$this->file_type[$i].".<br />";
								}
								elseif( ! in_array( $this->file_ext[$i], $this->allowed_file_extensions ) )
								{
										$response_message .= "The file you are trying to upload is of ".$this->file_ext[$i]." extension with we do not allow.<br />";
								}
								
								else
								{
								
										$this->file_new_name[$i]	= $this->file_prefix . $this->grnstr() . "." . $this->file_ext[$i];
										
										$this->file_moved[$i]		= move_uploaded_file( $this->file_tmp[$i], $this->file_target_folder . $this->file_new_name[$i] );
										
										if( $this->file_moved[$i] )
										{
												$response_message .= $this->file_name[$i] . " moved to " . $this->file_target_folder . $this->file_new_name[$i] . "<br />";
										}
										else
										{
												$response_message .= $this->file_name[$i] . " not uploaded!<br />";
										}
								}
						}
				}
		}
		
}
