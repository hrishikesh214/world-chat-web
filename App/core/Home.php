<?php 

defined('BASEPATH')
OR exit('ERROR: NO DIRECT SCRIPT ALLOWED!');

class Home extends CodeRunner {
	public function index(){
		if(isset($_SESSION['user'])){
			$_SESSION['login'] = 1;
		}
		else{
			$_SESSION['login'] = 0;
		}
		redirect(base_url('Home/app'));
	}

	public function app(){
		$this->load->view('home_view', $_SESSION);
	}

	public function send(){

		$webhookurl = "https://discord.com/api/webhooks/799532350899748874/e155BKESRmauPE62A4JHm3MZSLcve_tKIITPxX8irUIVmvDeKk9pFyWtArSGNBjCede2";

		$webhookurl = "https://discord.com/api/webhooks/786108405373861898/sI1QiqzhRTcW3ugMBHXZARDp6MtHB5TDFzS9kelDYDBxLDbkUpmlocRXyCF7fIJdUWQI";

		$timestamp = date("c", strtotime("now"));

		$json_data = json_encode([
			"content" => $_POST['msg'],

			"username" => $_POST['username'],
    		"avatar_url" => $_POST['avatar_url'],

			"tts" => false

		], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


		$ch = curl_init( $webhookurl );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
		curl_setopt( $ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec( $ch );
		// echo $response;
		curl_close( $ch );
	}

	public function login(){
		redirect(base_url('redirect.php?action=login'));
	}

	public function logout(){
		// $_SESSION['user']['id'] == 0;
		unset($_SESSION['user']);
		// debug($_SESSION);
		// die();
		
		$ch = curl_init( base_url('redirect.php?action=logout') );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
		curl_setopt( $ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec( $ch );
		echo $response;
		curl_close( $ch );
		// die();
		redirect(base_url());
	}
}