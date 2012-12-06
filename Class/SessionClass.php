<?php
class SessionClass
{
	//fields
	private $user_id;
	private $user_name;
	private $user_role;
	private $logged_in = false;
	//clonstructor
	public function __construct()
	{
		session_start();
		$this->checklogin();
		
	}
	
	public function checklogin()
	{
		if (isset($_SESSION['User_id']))
		{
			$this->user_id = $_SESSIOn['user_id'];
			$this->user_name = $_SESSIOn['user_name'];
			$this->user_role = $_SESSIOn['user_role'];
			$this->logged_in = true;
		}
		else
		{
			unset($this->user_id);
			unset($this->user_name);
			unset($this->user_role);
			$this->logged_in = false;
		}
	}
	
	public function login($user)
	{
		$this->user_id=$_SESSION['user_is'] = $user->getID();
		$this->user_id=$_SESSION['user_name'] = $user->getUsername();
		$this->user_id=$_SESSION['user_role'] = $user->getUserrole();
		$this->logged_in=true;
	}
	
	public function logout($user)
	{
		session_destroy();
		$this->logged_in = false;
	}
}
$session = new SessionClass();
?>