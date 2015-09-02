<?php

App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');


class EmailContent extends AppModel {

    public $name = 'EmailContent';
    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required.'
            ),
        ),
        'unique_name' => array(
            'rule' => array('minLength', 1),
            'message' => 'Unique Name is required.',
        ),
        'subject' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required.'
            ),
        ),
        'message' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required.'
            ),
        )
    );

    public function forgetPassword($name, $email, $link) {

        $mail_content = $this->getMailContent('FORGOT_PASSWORD');

        if (is_array($mail_content) && !empty($mail_content)) {
            $from = $mail_content['from'];

            $subject = $mail_content['subject'];
            $mail_refined_content = $mail_content['message'];

            $myLink = '<a class="" href="' . $link . '">' . $mail_content['link_title'] . '</a>';
            //$myLink=$this->mailButtion($link,$mail_content['link_title']);

            $mail_refined_content = str_replace('{{receiver}}', $name, $mail_refined_content);
            $mail_refined_content = str_replace('{{link}}', $myLink, $mail_refined_content);

            $this->__SendMail($email, $subject, $mail_refined_content, $from, $mail_content['id']);
        }
    }

    public function adminUserRegistrationMail($name, $email, $pass, $link) {

        $mail_content = $this->getMailContent('ADMIN_USER_REGISTRATION');

        if (is_array($mail_content) && !empty($mail_content)) {
            $from = $mail_content['from'];

            $subject = $mail_content['subject'];
            $mail_refined_content = $mail_content['message'];

            $myLink = '<a href="' . $link . '">' . $mail_content['link_title'] . '</a>';
            //$myLink=$this->mailButtion($link,$mail_content['link_title']);

            $mail_refined_content = str_replace('{{receiver}}', $name, $mail_refined_content);
            $mail_refined_content = str_replace('{{email}}', $email, $mail_refined_content);
            $mail_refined_content = str_replace('{{password}}', $pass, $mail_refined_content);
            $mail_refined_content = str_replace('{{link}}', $myLink, $mail_refined_content);

            $this->__SendMail($email, $subject, $mail_refined_content, $from, $mail_content['id']);
        }
    }

    public function registrationMail($name, $email, $link) {
        $mail_content = $this->getMailContent('USER_REGISTRATION');

        if (is_array($mail_content) && !empty($mail_content)) {
            $from = $mail_content['from'];

            $subject = $mail_content['subject'];
            $mail_refined_content = $mail_content['message'];

            //$myLink='<a href="'.$link.'">'.$mail_content['link_title'].'</a>';
            $myLink = $this->mailButtion($link, $mail_content['link_title']);

            $mail_refined_content = str_replace('{{receiver}}', $name, $mail_refined_content);
            $mail_refined_content = str_replace('{{link}}', $myLink, $mail_refined_content);

            $this->__SendMail($email, $subject, $mail_refined_content, $from, $mail_content['id']);
        }
    }

    public function registrationMailSuccess($name, $email, $link) {
        $mail_content = $this->getMailContent('USER_REGISTRATION_SUCCESS');

        if (is_array($mail_content) && !empty($mail_content)) {
            $from = $mail_content['from'];

            $subject = $mail_content['subject'];
            $mail_refined_content = $mail_content['message'];

            $myLink = '<a href="' . $link . '">' . "Haute Trader" . '</a>';
            //$myLink=$this->mailButtion($link,"Haute Trader");

            $mail_refined_content = str_replace('{{receiver}}', $name, $mail_refined_content);
            $mail_refined_content = str_replace('{{link}}', $myLink, $mail_refined_content);

            $this->__SendMail($email, $subject, $mail_refined_content, $from, $mail_content['id']);
        }
    }

    public function registrationMailtoAdmin($name, $email, $link) {
        $mail_content = $this->getMailContent('ADMIN_MAIL_FOR_USER_REGISTRATION');

        if (is_array($mail_content) && !empty($mail_content)) {
            $admin_email = $mail_content['from'];
            $subject = $mail_content['subject'];
            $myLink = '<a class="" href="' . $link . '" target="_blank">' . $mail_content['link_title'] . '</a>';
            $mail_refined_content = $mail_content['message'];

            $mail_refined_content = str_replace('{{name}}', $name, $mail_refined_content);
            $mail_refined_content = str_replace('{{user_email}}', $email, $mail_refined_content);
            $mail_refined_content = str_replace('{{link}}', $myLink, $mail_refined_content);


            if (empty($admin_email))
                $admin_email = strtolower(Configure::read('ADMIN_MAIL'));

            $emails = array($admin_email);
            $isLive = Configure::read('isLive');

            //to hope will not get mail for testing mails
            if ($isLive) {
                $emails[] = 'hopenoelle1@gmail.com';
            }
            $this->SendToManyMailUsingSendgrid($subject, $mail_refined_content, $emails, $admin_email);
            //prd($emails);
        }
    }

    public function thanksMsgForInvitingUser($new_user_name, $old_user_email, $old_user_name) {

        $mail_content = $this->getMailContent('THANKS_MSG_FOR_INVITING_USER');

        if (is_array($mail_content) && !empty($mail_content)) {
            $from = $mail_content['from'];

            $subject = $mail_content['subject'];
            $mail_refined_content = $mail_content['message'];

            $email = $old_user_email;

            $mail_refined_content = str_replace('{{invitor_name}}', $old_user_name, $mail_refined_content);
            $mail_refined_content = str_replace('{{invitee_name}}', $new_user_name, $mail_refined_content);

            $this->__SendMail($email, $subject, $mail_refined_content, $from, $mail_content['id']);
        }
    }

    public function inviteFriendsMail($senderName, $senderEmail, $recipientName, $recipientEmails, $comment, $link) {

        $mail_content = $this->getMailContent('INVITE_FRIEND');

        if (is_array($mail_content) && !empty($mail_content)) {

            $subject = $mail_content['subject'];

            $myLink = '<a href="' . $link . '">' . $mail_content['link_title'] . '</a>';
            //$myLink=$this->mailButtion($link,$mail_content['link_title']);

            $i = 0;
            foreach ($recipientEmails as $email) {

                $mail_refined_content = $mail_content['message'];

                $mail_refined_content = str_replace('{{receiver}}', $recipientName[$i], $mail_refined_content);
                $mail_refined_content = str_replace('{{comment}}', $comment, $mail_refined_content);
                $mail_refined_content = str_replace('{{link}}', $myLink, $mail_refined_content);
                $mail_refined_content = str_replace('{{sender}}', $senderName, $mail_refined_content);
                $mail_refined_content = str_replace('{{sender_email}}', $senderEmail, $mail_refined_content);

                $i++;

                $email = strtolower($email);
                $senderEmail = strtolower($senderEmail);

                //SAVE INVITED USER EMAIL
                $userId = $userId = @$_SESSION['Auth']['User']['id'];
                if (!empty($userId)) {

                    App::import("Model", "InvitedEmail");

                    $modelObj = new InvitedEmail();
                    $modelObj->create();

                    $data = array();
                    $data['user_id'] = $userId;
                    $data['email_id'] = $email;
                    $data['added_on'] = date("Y-m-d H:i:s");

                    $modelObj->save($data);
                }

                $this->__SendMail($email, $subject, $mail_refined_content, $senderEmail, $mail_content['id']);
            }
        } return true;
    }

    public function emailFriendsEnvelope($senderName, $senderEmail, $recipientName, $recipientEmails, $comment, $link, $linktitle) {

        $mail_content = $this->getMailContent('INVITE_FRIEND');

        if (is_array($mail_content) && !empty($mail_content)) {

            $subject = $mail_content['subject'];

            $myLink = '<a href="' . $link . '">' . $linktitle . '</a>';
            //$myLink=$this->mailButtion($link,$linktitle);

            $i = 0;
            foreach ($recipientEmails as $email) {

                $mail_refined_content = $mail_content['message'];

                $mail_refined_content = str_replace('{{receiver}}', $recipientName[$i], $mail_refined_content);
                $mail_refined_content = str_replace('{{comment}}', $comment, $mail_refined_content);
                $mail_refined_content = str_replace('{{link}}', $myLink, $mail_refined_content);
                $mail_refined_content = str_replace('{{sender}}', $senderName, $mail_refined_content);
                $mail_refined_content = str_replace('{{sender_email}}', $senderEmail, $mail_refined_content);

                $i++;

                $email = strtolower($email);
                $senderEmail = strtolower($senderEmail);
                $this->__SendMail($email, $subject, $mail_refined_content, $senderEmail, $mail_content['id']);
            }
        } return true;
    }

    public function contactUsMail($userName, $userEmail, $message) {

        $mail_content = $this->getMailContent('CONTACT_US');

        if (is_array($mail_content) && !empty($mail_content)) {

            $userName = ucwords($userName);
            $userEmail = strtolower($userEmail);
            $subject = $mail_content['subject'];

            $mail_refined_content = $mail_content['message'];
            $mail_refined_content = str_replace('{{name}}', $userName, $mail_refined_content);
            $mail_refined_content = str_replace('{{email}}', $userEmail, $mail_refined_content);
            $mail_refined_content = str_replace('{{message}}', $message, $mail_refined_content);

            $admin_email = strtolower(Configure::read('ADMIN_MAIL'));

            $this->__SendMail($admin_email, $subject, $mail_refined_content, $userEmail, $mail_content['id']);
            return true;
        }
    }

    public function ComposeToManyMail($subject = NULL, $message = NULL, $userEmails = NULL) {
        $email_record = $this->getMailContent('ADMIN_MAIL');
        if (is_array($email_record) && !empty($email_record)) {
            if (!empty($subject)) {
                $sub = $subject;
            } else {
                $sub = $email_record['subject'];
            }

            foreach ($userEmails as $email) {
                $content = $email_record['message'] . "<br>" . $message;
                $content = str_replace("{{receiver}}", '<b>' . $email . '</b>', $content);
                $this->__SendMail($email, $sub, $content);
            }

            return TRUE;
        }
        return FALSE;
    }

    private function getMailContent($unique_name) {

        $conditions = array(
            'conditions' => array('EmailContent.unique_name LIKE' => $unique_name, 'EmailContent.status' => 1), //array of conditions
            'recursive' => -1 //int
        );

        $mail_content = $this->find('first', $conditions);

        if (is_array($mail_content) && !empty($mail_content)) {
            return $mail_content['EmailContent'];
        } else {
            return false;
        }
    }

    public function __SendMail($to, $sub = '', $contents = '', $attachments = null, $cc = null, $bcc = null) {
        $Email = new CakeEmail();
        $Email->config('default');
        $Email->emailFormat('html');
        $Email->subject($sub);
        $Email->template('default');
        $Email->to($to);
        $Email->from(array('admin@admin.com' => 'room247'));

        if (!empty($cc)) {
            $Email->cc($cc);
        }

        if (!empty($bcc)) {
            $Email->bcc($bcc);
        }

        if (!empty($attachments) && $attachments != '' && is_array($attachments)) {
            $Email->attachments($attachments);
        }
        //prd($contents);
        $Email->viewVars(array('content' => $contents));
        //prd($Email);
        try {
            if ($Email->send()) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /*
      public function __SendMail($to, $subject, $content, $from = '', $mailId = 0) {
      App::uses('CakeEmail', 'Network/Email');
      if (empty($from)) {
      $from = strtolower(Configure::read('ADMIN_MAIL'));
      }
      $to = strtolower(trim($to));



      $cake_email = new CakeEmail();
      $cake_email->config('default');
      $cake_email->to($to);
      prd($from);
      $cake_email->from($from);

      $cake_email->subject($subject);

      $cake_email->template('default', 'mail_content');
      $cake_email->emailFormat('html');

      $cake_email->viewVars(array(
      'mail_message' => $content,
      ));

      prd($content);

      try {
      /* if(CakeRequest::host()=='192.168.1.2'){
      //print_r ($cake_email);exit;
      //return true;
      }

      $cake_email->send();



      if (!empty($userId) && !empty($temp_mail_id)) {
      $this->userMailRecord($userId, $temp_mail_id, $subject, $content);
      }
      } catch (Exception $e) {
      return false;
      }
      return true;
      }
     */

    public function beforeSave($options = array()) {
        foreach ($this->data[$this->alias] as $key => $val) {
            $this->data[$this->alias][$key] = trim($val);
        }
        return true;
    }

    public function mailButtion($link = "", $title = "") {
        return '<a href="' . $link . '" style="background-color: #887474;display: inline-block;">
<div></div>
<div align="center" style="background-color: #887474; border: 0px solid #C19B92;float: left;margin: 3px;padding: 4px 10px 3px;">
   <div style="margin-top:0px; color: #FFFFFF;float: left; font-family: belfast_light_sfregular;font-size: 12px;text-transform: uppercase;" >' . $title . '</div>
       <div style="padding: 0 2px 0 2px ;float: left">
          <img alt="" src="' . Router::url('/', true) . 'img/ui_images/images/contactarrowimg.png">        
       </div>
</div>
</a>';
    }

    //image for mail
    public function mailImage($image) {
        $image_content = "";
        if (is_array($image) && isset($image[0])) {
            foreach ($image as $im) {
                if (isset($im['redirct_url']) && !empty($im['redirct_url']))
                    $redirct_url = $im['redirct_url'];
                else
                    $redirct_url = Router::url('/', true); //site url

                $image_content.= '<a href="' . $redirct_url . '"><img alt="" src="' . $im['image_url'] . '"></a>';
            }
        }
        return $image_content;
    }

    //Password reset confirmation
    public function passwordResetConfirmation($mailReceiver, $email) {
        $mail_content = $this->getMailContent('PASSWORD_RESET_CONFIRMATION');

        if (is_array($mail_content) && !empty($mail_content)) {
            $from = $mail_content['from'];
            $subject = $mail_content['subject'];
            $mail_refined_content = $mail_content['message'];

            $mail_refined_content = str_replace('{{recipient_user}}', $mailReceiver, $mail_refined_content);

            $this->__SendMail($email, $subject, $mail_refined_content, $from, $mail_content['id']);
        }
    }

}
