<?php
App::uses('AppController', 'Controller');

class EmailContentsController extends AppController {

	public $name = 'EmailContents';
	public $uses = array('EmailContent');

	public function beforeFilter() {
	 	parent::beforeFilter();
		$this->Auth->allow('');
  	}
	
	public function admin_index(){
		$this->set('title_for_layout','Email Content');
                
                $emailContent = $this->EmailContent->find('all',array(
                ));
                //prd($emailContent);
                $this->set('emailContent',$emailContent);
	}
	
	public function admin_mail(){
		
		$this->set('title_for_layout', 'Compose Mail');	
		$content=$this->EmailContent->findByUniqueName('MULTI_USER_MAIL');
		$this->set('content',$content);	
		$this->loadModel('Cmspage');
		$this->loadModel('User');
		
		if ($this->request->is('get')) {
			$get_data =$this->request;
			
			if(isset($get_data['pass'][0]) && !empty($get_data['pass'][0])){
				$this->loadModel('User');
				
				$user_email = $this->User->find('first',array(
					'recursive' => -1,
					'conditions' => array('id'=>$get_data['pass'][0]),
					'fields' => array('email'),
				));
				
				if($user_email){
					$this->set('user_email',$user_email['User']['email']);
				}
			}
		}
		
		
		if ($this->request->is('post')) {
				
			$data =$this->request->data ;
                        //prd($data);
			if(isset($data['sendMail']) && $data['sendMail'] == 'Send Mail'){
				
				$userArr = explode(',',$data['user_ids']);
				
				$user_emails = $this->User->find('all',array(
					'recursive' => -1,
					'conditions' => array('id'=>$userArr),
					'fields' => array('email','fname','lname'),
				));
				
				$email = '';
				$names = '';
				foreach($user_emails as $emails){
					
					$email[]= $emails['User']['email'];
					if(!empty($emails['User']['fname']))
						$names[]= $emails['User']['fname'] . " " . $emails['User']['lname'];
					else
						$names[]=" ";	
				}
				$this->set('user_email',implode(',',$email));
				$this->set('user_names',implode(',',$names));
			}else if(isset($data['sendMail']) && $data['sendMail'] == 'Send Letter'){
				
				$this->loadModel('Newsletter');
				
				$userArr = explode(',',$data['user_ids']);
				//pr('inside sand latter');
				$newsletter_emails = $this->Newsletter->find('all',array(
					'conditions' => array('id'=>$userArr),
					'fields' => array('email','fullname'),
				));
				$email = '';
				$names = '';
				foreach($newsletter_emails as $emails){
					$email[]= $emails['Newsletter']['email'];
					if(!empty($emails['Newsletter']['fullname']))
						$names[]= $emails['Newsletter']['fullname'];
					else
						$names[]=" ";
				}
				//prd($email);
				$this->set('user_email',implode(',',$email));
				$this->set('user_names',implode(',',$names));
				$this->set('user_req','newsletter');
			}else{
                            //prd($data);
				$userEmails = $data['Mail']['emails'];
				$subject 	= $data['Mail']['subject'];
				$message	= $data['Mail']['message'];
				$names	= explode(',',$data['Mail']['names']);
				
				$expression = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/";
				$userEmails=explode(',',$userEmails);
				//prd($userEmails);
				if(empty($names[0]))	//Assign User name if They are site user
				{
					
					$names = '';
					$userEmail = '';
						
					foreach($userEmails as $mail){
						$user_fulldata = $this->User->find('first',array(
								'recursive' => -1,
								'conditions' => array('email'=>$mail),
								'fields' => array('id','email','first_name','last_name'),
								'group' => 'User.email',
						));
						
						if(!empty($user_fulldata['User']['first_name'])){
							$names[]= ucfirst( $user_fulldata['User']['first_name'] . " " . $user_fulldata['User']['last_name']);
							$userEmail[] = $mail;
						}else{
							$names[]= " ";
							$userEmail[] = $mail;
						}
					}
				}
				
				$temp = '';
				foreach( $userEmails as $email ){
				
					if (!preg_match($expression, $email)) {
						
						$temp .= '<strong>'.$email. '</strong> , ';
					} 
				}
				if(!empty($temp)){
					$this->siteMessage("INCORRECT_MAIL_ADDRESS");
				}
				else{
					//prd($data);
					$this->loadModel('EmailContent');
					$emailObj = new EmailContent();
					$namesArray['{{recipient}}']=$names;
					if($emailObj->ComposeToManyMail($data['Mail']['subject'], $data['Mail']['message'], $userEmails)){
					        $this->Session->setFlash('Mail send success');
						
						if(isset($data['Mail']['req']) && $data['Mail']['req']== 'newsletter')
						{
			                            $this->redirect(array('admin' => true, 'controller' => 'Users', 'action' => 'newsletterlist'));
						}else{
							$this->redirect(array('admin' => true, 'controller' => 'EmailContents', 'action' => 'mail'));
						}
					}else{
                                            $this->Session->setFlash('Mail send error');
						
					}					
				}
			}
		}
		
	}

	public function admin_edit($id=NULL){
		
		$this->set('title_for_layout', 'Update Email Content ('.$id.')');
		
		if (!$id && empty($this->request->data)) {
			$this->siteMessage("INCORRECT_MAIL_ADDRESS");
			$this->redirect(array('admin' => true, 'controller' => 'EmailContents', 'action' => 'index'));
		}
		
		$nub = $this->EmailContent->find('neighbors', array('field' => 'id', 'value' => $id));
			
		$this->set('nx_item',$nub['next']['EmailContent']['id']);
		$this->set('pr_item',$nub['prev']['EmailContent']['id']);
		
		if (!empty($this->request->data)) {
			
			$data = $this->request->data ;
			
			$keywords = explode(',',$data['EmailContent']['keywords']);
			
			$temp = '';
			$count = 0;
			foreach($keywords as $key){
				$key=trim($key);
				if(!empty($key)){
					if(!strstr($this->request->data['EmailContent']['message'],$key)){
						$temp .= '<strong>'.$key .'</strong>,';	
						$count += 1 ;
					}
				}
			}
			
			
			if(!empty($temp)){
				$this->siteMessage("FORGET_KEYWORD",array("[['missing_keywords']]"=>$temp));
			}
			else{
				if ($this->EmailContent->save($data)) {
					$this->siteMessage("MAIL_CONTENT_UPDATE_SUCCESS");
					$this->redirect(array('admin' => true, 'controller' => 'EmailContents', 'action' => 'edit', $data['EmailContent']['id']));
				} else {
					$this->siteMessage("MAIL_CONTENT_UPDATE_ERROR");
				}
			}
		}

		$this->loadModel('EmailCategory');

		$emailCategories=$this->EmailCategory->getEmailCat();
		$this->set('emailCategories', $emailCategories);

		
		if (empty($this->request->data)) {
			
			$EmailContentRow = $this->EmailContent->read(null,$id);
			if(count($EmailContentRow) > 0 ){
				$this->request->data = $EmailContentRow;				
			}
			else{
				$this->siteMessage("INVALID_REQUEST");
				$this->redirect(array('admin' => true, 'controller' => 'EmailContents', 'action' => 'index'));
			}
		}		
	}	
	
	public function admin_EmailContentGrid(){
		$this->loadModel('EmailContent');
		$set_url = '';
		$conditions = array();
		
		$group = array('EmailContent.id');
		
		$join = array();

		$field = array('EmailContent.*');	
		
		
		if(isset($this->request['data']['action']) && $this->request['data']['action']=='filter'){
			
			if(trim($this->request['data']['id']))
				$conditions['EmailContent.id'] = Sanitize::clean($this->request['data']['id']);
			
			if(trim($this->request['data']['title']))
				$conditions['EmailContent.title LIKE'] = '%'.Sanitize::clean($this->request['data']['title']).'%';
			
			if($this->request['data']['keyword'])
				$conditions['EmailContent.keywords LIKE'] = '%'.Sanitize::clean($this->request['data']['keyword']).'%';
			
			if($this->request['data']['subject'])
				$conditions['EmailContent.subject LIKE'] = '%'.Sanitize::clean($this->request['data']['subject']).'%';
			
		}

		
		$totalRows=$this->EmailContent->getlisting($conditions, $join, $field, $group, "", "", "", -1);
		$iTotalRecords = count($totalRows);
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart = intval($_REQUEST['start']);
		$sEcho = intval($_REQUEST['draw']);
		
		$records = array();
		$records["data"] = array(); 
		
		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;
		
		$orderby=array();
		$colName=$this->request['data']['order'][0]['column'];
		$orderby[$this->request['data']['columns'][$colName]['name']]=$this->request['data']['order'][0]['dir'];
		
		$tableData=$this->EmailContent->getlisting($conditions, $join, $field, $group, $iDisplayStart, $iDisplayLength, $orderby, -1);
		
		$cnt=$iDisplayStart;
		
		foreach($tableData as $Datavalue){
			$title 		 = $Datavalue['EmailContent']['title'];
			$subject 	 = $Datavalue['EmailContent']['subject'];
			$keywords 	 = $Datavalue['EmailContent']['keywords'];
			
			$action = '';
			if($Datavalue['EmailContent']['status'] == 0){	
				$action .= '<img title="Click to change status" class="pointer" src="'.$this->webroot.'img/admin/status-red.png" onclick="changeEmailContentStatus('.$Datavalue['EmailContent']['id'].',0)" />';
			}
			else if($Datavalue['EmailContent']['status'] == 1){
				$action .= '<img title="Click to change status" class="pointer" src="'.$this->webroot.'img/admin/status-green.png" onclick="changeEmailContentStatus('.$Datavalue['EmailContent']['id'].',1)" />';
			}
			
			$action .= '&nbsp;&nbsp;&nbsp;<a href="'.$this->webroot.'admin/EmailContents/edit/'.$Datavalue['EmailContent']['id'].'" ><i class="fa fa-edit fa-lg" title="Edit Email"></i></a> ';
			
			$action .= '&nbsp;&nbsp;<a href="'.$this->webroot.'admin/EmailContents/mailpreview/'.$Datavalue['EmailContent']['id'].'" class="mail_preview"><i class="fa fa-eye fa-lg" title="Click here to preview"></i></a> ';
			
    		$records["data"][] = array(				
				$Datavalue['EmailContent']['id'],
				$title,
				$subject,
				$keywords,
				$action,
			);
		}
		
		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;
		echo json_encode($records);
		
		exit;
	}
}