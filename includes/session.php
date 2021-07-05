<?php

class Session 
	{
		
		private $logged_in;
		public $auth_id;
		public $mode;
		private static $idkey = '89967f6b501e15b4ee4c0e7346d4d845_auth_id';
		private static $modekey = '89967f6b501e15b4ee4c0e7346d4d845_mode';
		public $message;
		function __construct()
		{
			session_start();
			$this->check_login();
			$this->check_message();
			
		}
		
		public function is_logged_in()
		{
		
			if($this->logged_in)
			{
				return true; 	
			}
			else
			{
				return false;	
			}
		}

		
		public function login($user)
		{
			// database should find user based on username/password
			if ($user)
			{
				
				$this->auth_id = $_SESSION[self::$idkey] = $user->id;
				$this->mode = $_SESSION[self::$modekey] = $user->mode;
				//echo $this->auth_id; exit;
				$this->logged_in = true;
			}
		}
		
		public function logout()
		{
			
			unset ($_SESSION[self::$idkey]);
			unset ($this->auth_id);
			unset ($_SESSION[self::$modekey]);
			unset ($this->mode);
			$this->logged_in = false;
		}
		
		private function check_login()
		{
			
			if (isset($_SESSION[self::$idkey]))
			{
				$this->logged_in = true;
				
			}
			else 
			{
				unset ($_SESSION[self::$idkey]);
				unset ($_SESSION[self::$modekey]);
				
				$this->logged_in = false;
			}
		}
		public function message($msg = "")
		{
			if(!empty($msg))
			{
				// then this is "set message"
				// make sure you understand why $this->message= $msg wouldn't work
				$_SESSION['message'] = $msg;
			}
			else
			{
				// then this is "get message"
				return '<span style="color:red">'.$this->message.'</span>';
			}
		}
		private function check_message()
		{
			// Is there a message stored in the session
			if (isset($_SESSION['message']))
			{
				// Add it as an attribute and erase the stored version
				$this->message = $_SESSION['message'];

				// echo "<p style= 'text-align:center;''>".$_SESSION['message']."</p>";   //this line is added by satyam
				unset($_SESSION['message']);
			}
			else
			{
				$this->message = "";
			}
		}
	}
	$session = new Session();	
	$message = $session->message();
	
	
?>