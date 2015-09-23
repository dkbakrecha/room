<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP ApiController
 * @author Dharmendra Bagrecha
 */
class ApiController extends AppController
{

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow();
	}
        
	public function login()
	{
		$Result['Error'] = '200';
		if ($this->request->isPost())
		{
			$postdata = $this->request->data;

			if ((!empty($postdata['email']) && !empty($postdata['password'])))
			{
				$this->loadModel('User');

				$login_condition = array(
					'email' => $postdata['email'],
					'password' => AuthComponent::password($postdata['password'])
				);

				$login = $this->User->find('first', array(
					'fields' => array('User.*'),
					'conditions' => $login_condition,
				));

				if (!empty($login))
				{
					/* Save user general statics */
					$userData = array();
					$userData['User']['id'] = $login['User']['id'];

					if (isset($postdata['device_id']))
					{
						$userData['User']['device_id'] = $postdata['device_id'];
					}

					if (isset($postdata['device_type']))
					{
						$userData['User']['device_type'] = $postdata['device_type'];
					}

					$userData['User']['last_login'] = date("Y-m-d H:i");

					if (!empty($userData))
					{
						$updateUser = $this->User->save($userData);
						$login['User']['last_login'] = $updateUser['User']['last_login'];
					}

					unset($login['User']['password']);

					$Result['UserDetails'] = $login['User'];
					//prd($login);
				}
				else
				{
					$Result['Error'] = '506';
					$Result['Msg'] = $this->ErrorMessages($Result['Error']);
				}
			}
			else
			{
				$Result['Error'] = '400';
				$Result['Msg'] = $this->ErrorMessages($Result['Error']);
			}
		}
		else
		{
			$Result['Error'] = '405';
			$Result['Msg'] = $this->ErrorMessages($Result['Error']);
		}
		echo json_encode($Result);
		exit;
	}

	public function register()
	{
		$Result['Error'] = '200';
		$Results['Error_code'] = '507';
		if ($this->request->isPost())
		{
			$postdata = $this->request->data;

			if ((!empty($postdata['name']) && !empty($postdata['email']) && !empty($postdata['password'])))
			{
				$this->loadModel('User');

				$login_condition = array(
					'email' => $postdata['email'],
				);

				$userInfo = $this->User->find('first', array(
					'fields' => array('User.*'),
					'conditions' => $login_condition,
				));

				if (empty($userInfo))
				{
					$user = array();
					if (isset($postdata['name'])){
						$user['User']['name'] = $postdata['name'];
					}
						
					if (isset($postdata['email'])){
						$user['User']['email'] = $postdata['email'];
					}
						
					if (isset($postdata['password'])){
						$user['User']['password'] = $postdata['password'];
					}
						
					if (isset($postdata['device_id'])){
						$user['User']['device_id'] = $postdata['device_id'];
					}
						
					if (isset($postdata['device_type'])){
						$user['User']['device_type'] = $postdata['device_type'];
					}
						

					$verification_code = $this->generateUniqueToken(6);
					$user['User']['verification_code'] = $verification_code;

					//prd($user);

					$saveUser = $this->User->save($user);
					if ($saveUser)
					{

						$user_id = $saveUser['User']['id'];
						/*
						$link = FULL_BASE_URL . $this->webroot . "user/verifyaccount?verificationcode=" . $verification_code . "&email=" . $postdata['Email'];
					
						$text = "Welcome to CoffeeW;nk " . $postdata['Name'] . ".";
						$text .= '<br><br>';
						$text .= 'To activate your account tap here <a href=' . $link . '>activate your account.</a>';
						$text .= '<br><br>';
						$text .= 'Team CoffeeW;nk, wishes you Happy W;nking :)';
						$text .= '<br><br><br>';
						$text .= 'Regards,';
						$text .= '<br>';
						$text .= 'CoffeeW;nk Team';
						$this->sendmail($postdata['Email'], 'Welcome to Coffee Wink', $text);
						 * */
					}
					$Result['Msg'] = $this->ErrorMessages($Results['Error_code']);
				}
				else
				{
					$Result['Error'] = '505';
					$Result['Msg'] = $this->ErrorMessages($Result['Error']);
				}
			}
			else
			{
				$Result['Error'] = '400';
				$Result['Msg'] = $this->ErrorMessages($Result['Error']);
			}
		}
		else
		{
			$Result['Error'] = '405';
			$Result['Msg'] = $this->ErrorMessages($Result['Error']);
		}
		echo json_encode($Result);
		exit;
	}
	
	
	public function sendAndroidnotification($topic,$message,$time,$venue,$deviceTokens,$invitation_id,$type = 0,$meeting_type=0,$winkee='',$badge='')
	{
		$apiKey = "AIzaSyA6a-VXzgAa9r98nad89kyzRUiT0ZrAAV0";
		// Set POST variables
		$url = 'https://android.googleapis.com/gcm/send';
		
		/*$fields = array(
				'registration_ids' => $deviceTokens,
				'data' => array('type'=>$type,'title' => $title , "message" => $message ),
		);*/
		//$invitation_id = '';
		if(isset($winkee) && $winkee != ''){
			//$winkee = "winkee => ".$winkee."";
		}
		
		if($type==31 || $type==32)
		{
			//"t":"2","s":"4","r":"75","mt":"0","mi":"0"}
			$fields = array(
					'registration_ids' => $deviceTokens,
					'data' => array('data' => array("t" => $topic,"message" => $message,"s" => $time, "r" => $venue,"mt" =>$invitation_id,"type" => $type,"mi" => $meeting_type,"sn" => $winkee) ),
			);
		}
		else 
		{
			$fields = array(
					'registration_ids' => $deviceTokens,
					'data' => array('data' => array("topic" => $topic,"message" => $message,"time" => $time, "venue" => $venue,"invitation_id" =>$invitation_id,"type" => $type,"meeting_type" => $meeting_type,"winkee" => $winkee,"badge" => $badge) ),
			);
		}
		
		$headers = array(
				'Authorization: key=' . $apiKey,
				'Content-Type: application/json'
		);
		$ch = curl_init();
		// Set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url );
		curl_setopt($ch, CURLOPT_POST, true );
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $fields ));
		
		// Execute post
		$result = curl_exec($ch);
		
		// Close connection
		curl_close($ch);
		if($result){ return 1; }else{ return 0; };
	}

}
