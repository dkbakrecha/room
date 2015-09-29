<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $components = array(
        'Auth',
        'Session',
    );
    public $helpers = array(
//'Image',
        'General'
    );

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->authenticate = array(
            'Form' => array(
                'fields' => array('username' => 'email', 'password' => 'password'),
            ),
        );

        $this->Auth->loginAction = array('admin' => false, 'controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('admin' => false, 'controller' => 'users', 'action' => 'dashboard');
        $this->Auth->logoutRedirect = array('admin' => false, 'controller' => 'users', 'action' => 'login');

        if (isset($this->request->params['admin'])) {
            $this->layout = 'admin';
// to check session key if we not define this here then is will check with 'Auth.User' so dont remove it
            AuthComponent::$sessionKey = 'Auth.Admin';

            $this->Auth->loginAction = array('admin' => true, 'controller' => 'Users', 'action' => 'admin_login');
            $this->Auth->loginRedirect = array('admin' => true, 'controller' => 'Users', 'action' => 'admin_dashboard');
            $this->Auth->logoutRedirect = array('admin' => true, 'controller' => 'Users', 'action' => 'admin_login');
        }


        $this->set('user_id', $this->Session->read('Auth.User.id'));
        $this->set('user_info', $this->Session->read('Auth.User'));
        $this->user_id = $this->Session->read('Auth.User.id');
        $this->user_info = $this->Session->read('Auth.User');

        $this->loadStatics();
    }

    /* Function is use to assign general variables */

    public function loadStatics() {
        $this->loadModel('Room');
        /*  =====  Agent Listing count  =====  */
        if (!empty($this->user_id) && $this->user_info['role'] == 2) {
            $roomCount = $this->Room->find('count', array(
                'conditions' => array(
                    'Room.created_by' => $this->user_id,
                    'Room.status !=' => 2
                )
            ));

            $this->set('roomCount', $roomCount);
        }
    }

    protected function _getCurrentUserId() {
        if (isset($this->Auth)) {
            $user_id = $this->Auth->User("id");
        } else {
            $user_id = AuthComponent::User("id");
        }

        return $user_id;
    }

    public function flash_msg($msg, $flag = 1) {
        if ($flag == 1) {
            $this->Session->setFlash($msg, 'default', array('id' => 'success'));
        } elseif ($flag == 2) {
            $this->Session->setFlash($msg, 'default', array('id' => 'danger'));
        } elseif ($flag == 3) {
            $this->Session->setFlash($msg, 'default', array('id' => 'info'));
        } elseif ($flag == 4) {
            $this->Session->setFlash($msg, 'default', array('id' => 'warning'));
        }
    }

    protected function resize_url($path, $width, $height, $aspect = true, $htmlAttributes = array(), $return = false) {

        $types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type
        if (empty($htmlAttributes['alt']))
            $htmlAttributes['alt'] = 'thumb';  // Ponemos alt default

        $uploadsDir = 'img';

        $fullpath = ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . $uploadsDir . DS;

//$tempPath=realpath(dirname(dirname(dirname(__FILE__)))).'/webroot/img/';
        $tempPath = $uploadsDir . '/';

        if (file_exists($tempPath . $path) and $path != 'uploads/')
            $url = ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . IMAGES_URL . $path;
        else
            $url = $tempPath . "no_image.png";

//echo '<img src="'.$url.'">'; exit;
        if (!($size = getimagesize($url)))
            return; // image doesn't exist

            /* if ($aspect) { // adjust to aspect.
              if (($size[1]/$height) > ($size[0]/$width))  // $size[0]:width, [1]:height, [2]:type
              $width = ceil(($size[0]/$size[1]) * $height);
              else
              $height = ceil($width / ($size[0]/$size[1]));
              } */
        if ($aspect) { // adjust to aspect.
            if ($height == 0) {
                $height = ceil($width / ($size[0] / $size[1]));
            } else if ($width == 0) {
                $width = ceil(($size[0] / $size[1]) * $height);
            } else if (($size[1] / $height) > ($size[0] / $width))  // $size[0]:width, [1]:height, [2]:type
                $width = ceil(($size[0] / $size[1]) * $height);
            else
                $height = ceil($width / ($size[0] / $size[1]));
        }

        $relfile = $this->webroot . $uploadsDir . '/resized/' . $width . 'x' . $height . '_' . basename($path); // relative file
        $cachefile = $fullpath . 'resized' . DS . $width . 'x' . $height . '_' . basename($path);  // location on server

        if (file_exists($cachefile)) {
            $csize = getimagesize($cachefile);
            $cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
            if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
                $cached = false;
        } else {
            $cached = false;
        }

        if (!$cached) {
            $resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
        } else {
            $resize = false;
        }

        if ($resize) {
            $image = call_user_func('imagecreatefrom' . $types[$size[2]], $url);
            if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor($width, $height))) {
                imagealphablending($temp, false);
                imagesavealpha($temp, true);
                $transparent = imagecolorallocatealpha($temp, 255, 255, 255, 127);
                imagefilledrectangle($temp, 0, 0, $width, $height, $transparent);
                imagecopyresampled($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
            } else {

                $temp = imagecreate($width, $height);

                imagealphablending($temp, false);
                imagesavealpha($temp, true);
                $transparent = imagecolorallocatealpha($temp, 255, 255, 255, 127);
                imagefilledrectangle($temp, 0, 0, $width, $height, $transparent);

                imagecopyresized($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
            }
            call_user_func("image" . $types[$size[2]], $temp, $cachefile);
            imagedestroy($image);
            imagedestroy($temp);
        } else {
//copy($url, $cachefile);
            if (!$cached) {
                return ($path);
            }
        }

//return $this->webroot.'img/'.$path;
        return $relfile;
        return $this->output(sprintf($this->Html->_tags['image'], $relfile, $this->Html->_parseAttributes($htmlAttributes, null, '', ' ')), $return);
    }

    public function get_extension($file_name) {
        $ext = explode('.', $file_name);
        $ext = array_pop($ext);
        return strtolower($ext);
    }



    function genRandomString($length = 12) {
        $pwd = str_shuffle('abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890' . time());
        return substr($pwd, 0, $length);
    }

    public function saveGridImage($lat_lng, $id) {
        $dataList = substr(trim($lat_lng), 1, -1);
        $pos_array = explode(')(', $dataList);

        $latlng = '';
        foreach ($pos_array as $key => $value) {
            $latlng .='|' . trim($value);
        }

        $latlng = urlencode($latlng);

        $img_url = 'http://maps.googleapis.com/maps/api/staticmap?size=400x400&path=color:0x0000ff|weight:0|fillcolor:0xFF000033' . $latlng . '&sensor=false';
        //prd($img_url);

        if (copy($img_url, 'img/grid_images/' . $id . 'G.png')) {
            return 1;
        } else {
            return 0;
        }
    }

    public function saveGridImageByAddress($address, $id) {
        $t_addr = str_replace(" ", "+", $address);
        $_label = 'R';
        $img_url = 'http://maps.googleapis.com/maps/api/staticmap?center=' . $t_addr . '&zoom=17&markers=color:blue|label:' . $_label . '|' . $t_addr . '&size=640x300&sensor=false';
        //prd($img_url);

        if (copy($img_url, 'img/uploads/' . $id . '_room.png')) {
            return 1;
        } else {
            return 0;
        }
    }

}
