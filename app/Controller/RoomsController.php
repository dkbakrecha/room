<?php

App::uses('AppController', 'Controller');

class RoomsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'report', 'room_listing', 'listing', 'detail', 'hitcount');
    }

    public function index() {
        /* Introduce Later for main searching Algo */
    }

    public function listing() {
        $this->set('title_for_layout', __('Room Listing'));
        $roomList = $this->room_listing();
        $this->set(compact('roomList'));

//        $roomList = $this->Room->find('all', array(
//            'conditions' => array('Room.status !=' => 2),
//            'order' => 'Room.created desc'
//        ));
//        $this->set('roomList', $roomList);
    }

    public function room_listing() {
        $request = $this->request;
        $room_condition = array();
        $room_condition['Room.status'] = 1;

        $orderby = 'Room.created desc';
        $limit = 6;

        if ($request->is('post')) {
            $data = $request->data;
            //pr($request);
            //prd($data);

            if (isset($data['Search']['brand_id']) && !empty($data['Search']['brand_id'])) {
                $product_condition['Product.brand_id'] = $data['Search']['brand_id'];
            }

            if (isset($data['Search']['category_id']) && !empty($data['Search']['category_id'])) {
                $room_condition['Room.category_id'] = $data['Search']['category_id'];
            }

            if (isset($data['Search']['list_for']) && $data['Search']['list_for'] != '') {
                $room_condition['Room.list_for'] = $data['Search']['list_for'];
            }
            /*
              if (isset($data['Search']['amountmax']) && !empty($data['Search']['amountmax'])) {
              $product_condition['Product.price <= '] = $data['Search']['amountmax'];
              }

              if (isset($data['Search']['amountmin']) && !empty($data['Search']['amountmin'])) {
              $product_condition['Product.price >= '] = $data['Search']['amountmin'];
              }

              if (isset($data['sort_by']) && !empty($data['sort_by'])) {
              if ($data['sort_by'] == 1) {
              $orderby = 'Product.title';
              }
              if ($data['sort_by'] == 2) {
              $orderby = 'Product.price';
              }
              }
             * 
             */
            if (isset($data['show']) && !empty($data['show'])) {
                $limit = $data['show'];
            }


            $search = json_encode($data);
            $this->set('search', $data);
        }

        $this->paginate = array(
            'paramType' => 'querystring',
            'Room' => array(
                'conditions' => $room_condition,
                'fields' => array(
                    '*'
                ),
                'order' => $orderby,
                'limit' => $limit,
            )
        );

        $statics = $this->room_statics($room_condition);
        $this->set('statics', $statics);
        //pr($statics);
        $rooms = $this->paginate('Room');
        //pr($this->Product->lastQuery());  
        //pr($this->paginate);
        //$this->log($this->Product->lastQuery);
        //$debug->log("asdf",'asd');
        if ($request->is('ajax')) {
            //$log = $this->Product->getDataSource()->getLog(false, false);
            //pr($product_condition);
            //pr($log);
            //prd($products);
            $this->set('rooms', $rooms);
            $this->layout = false;
            $this->autoRender = false;

            if (isset($request->params['named']['type']) && !empty($request->params['named']['type'])) {
                //prd($rooms);
                $this->set('roomList', $rooms);
                $this->layout = false;
                $this->autoRender = false;
                $this->render('/Elements/room_listing');
            } else {

                /* Prepair Tags */
                $tags = '';
                //prd($product_condition['Product.category_id']);
                if (isset($room_condition['Room.category_id']) && !empty($room_condition['Room.category_id'])) {
                    foreach ($room_condition['Room.category_id'] as $selected_category) {
                        $tags .= "<span class='label label-default filter-tag'>" .
                                $this->delete_all_between('(', ')', $statics['category_filter'][$selected_category]) .
                                "<span data-role='remove' class='btn btn-xs' onclick='removeSearch(SearchCategoryId" . $selected_category . ")'>x</span></span>";
                    }
                }

                if (isset($product_condition['Product.brand_id']) && !empty($product_condition['Product.brand_id'])) {
                    foreach ($product_condition['Product.brand_id'] as $selected_brand) {
                        $tags .= "<span class='label label-default filter-tag'>" .
                                $this->delete_all_between('(', ')', $statics['brand_filter'][$selected_brand]) .
                                "<span data-role='remove' class='btn btn-xs' onclick='removeSearch(SearchBrandId" . $selected_brand . ")'>x</span></span>";
                    }
                }

                $viewFilter = new View($this, false);
                $viewFilter->set('roomList', $rooms);
                $htmlFilter = $viewFilter->element('room_filter', array('category' => $statics['category_filter']));

                $view = new View($this, false);
                $view->set('roomList', $rooms);
                $html = $view->render('/Elements/room_listing');

                $returnArr = array();
                $returnArr['filter'] = $htmlFilter;
                $returnArr['tags'] = $tags;
                $returnArr['html'] = $html;

                echo json_encode($returnArr);
            }
        } else {
            return $rooms;
        }
    }

    public function room_statics($searchCondition) {
        //$this->log($searchCondition);
        /* generate brand count */
        /*
          $proBrandData = $this->Product->find('all', array(
          'conditions' => $searchCondition,
          'group' => 'Brand.id',
          'fields' => array('Brand.id', 'Brand.title', 'count(Product.id) as product_count'),
          ));

          $b_array = array();
          foreach ($proBrandData as $b_static) {
          $b_array[$b_static['Brand']['id']] = $b_static['Brand']['title'] . " ( " . $b_static[0]['product_count'] . " ) ";
          }
         * 
         */

        /* generate Category count */
        $roomCategoryData = $this->Room->find('all', array(
            'conditions' => array(
                'Room.status' => 1,
                'Category.status' => 1
            ),
            'group' => 'Category.id',
            'fields' => array('Category.id', 'Category.title', 'count(Room.id) as room_count'),
        ));

        $c_array = array();
        foreach ($roomCategoryData as $c_static) {
            $c_array[$c_static['Category']['id']] = $c_static['Category']['title'] . " [ " . $c_static[0]['room_count'] . " ] ";
        }

        $resultArray = array();
        //$resultArray['brand_filter'] = $b_array;
        $resultArray['category_filter'] = $c_array;

        //pr($resultArray);
        return $resultArray;
    }

    public function detail($id) {

        if (!empty($id)) {
            $this->Room->bindModel(array('hasMany' => array(
                    'Image' => array(
                        'className' => 'Image',
                        'foreignKey' => 'room_id',
                    )
            )));

            $this->Room->bindModel(
                    array('hasOne' => array(
                            'Favorite' => array(
                                'className' => 'Favorite',
                                'foreignKey' => false,
                                'conditions' => array(
                                    'Favorite.room_id' => $id,
                                    'Favorite.user_id' => $this->user_id,
                                    'Favorite.status' => 1
                                )
                            )
                        )
                    )
            );


            $roomInfo = $this->Room->find('first', array(
                'conditions' => array(
                    'Room.status !=' => 2,
                    'Room.id' => $id
                ),
                'recursive' => 2,
            ));
            //  prd($roomInfo);
            $this->set('roomInfo', $roomInfo);
        } else {
            $this->redirect(array('action' => 'listing'));
        }
    }

    public function mylisting() {
        if($this->userInfo['role'] == 2){
            $myListing = $this->Room->find('all', array(
            'conditions' => array(
                'Room.created_by' => $this->user_id,
                'Room.status !=' => 2
            )
        ));

        $this->set('myListing', $myListing);
        }else{
            $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
    }

    public function add() {
        $this->loadModel('Categories');
        $this->loadModel('Facilities');
        $this->loadModel('RoomOption');
        
        //prd($this->user_info);
        
        if(empty($this->user_info['first_name']) || empty($this->user_info['contact_no'])){
            $this->Session->setFlash('Please complate your profile before Listing','default',array('class' => 'alert alert-success'));
            $this->redirect(array('controller' => 'users', 'action' => 'edit_profile'));
        }
        
        if($this->user_info['role'] == 1){
            $activeRoom = $this->Room->find('count',array(
                'conditions' => array(
                    'Room.status' => 1,
                    'Room.created_by' => $this->_getCurrentUserId()
                )
                ));
            
            if($activeRoom >= 1){
                $this->Session->setFlash('Free account add just one room. Please contact service@room247.in upgrade service.','default',array('class' => 'alert alert-success'));
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
            }
        }
        
        $cateList = $this->Categories->find('list', array('fields' => array('code', 'title')));
        $this->set('cateList', $cateList);

        $fa_List = $this->Facilities->find('all');
        $this->set('fa_List', $fa_List);


        if (!empty($this->request->data)) {
            $data = $this->request->data;


            //pr($data);
            $maxPro = $this->Room->find('first', array('fields' => array('MAX(unique_number) as maxnum')));
            $data['Room']['unique_number'] = $maxPro[0]['maxnum'] + 1;
            $data['Room']['unique_code'] = $data['Room']['cate'];

            $data['Room']['created_by'] = $this->user_id;
            $s_cate = $this->Categories->find('first', array(
                'conditions' => array('code' => $data['Room']['cate']),
                'fields' => array('id', 'code')
            ));

            $data['Room']['category_id'] = $s_cate['Categories']['id'];

            //prd($data);
            if ($r = $this->Room->save($data)) {
                foreach ($data['RoomOption'] as $key => $value) {
                    if ($value['facility_id'] == 1) {
                        $optionData = array();
                        $optionData['RoomOption']['facility_id'] = $key;
                        $optionData['RoomOption']['room_id'] = $r['Room']['id'];

                        $this->RoomOption->create();
                        $this->RoomOption->save($optionData);
                    }
                }

                $this->Session->setFlash('Room added successfully.', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
            } else {
                $this->Session->setFlash('Room could be added.', 'default', array('class' => 'alert alert-danger'));
            }
        }
    }

    public function edit($id) {
        $this->loadModel('Facilities');
        $this->loadModel('RoomOption');

        $roomInfo = $this->Room->find('first', array(
            'conditions' => array(
                'Room.id' => $id
            )
        ));

        $fa_List = $this->Facilities->find('all');
        $this->set('fa_List', $fa_List);

        if (!empty($this->request->data)) {
            $data = $this->request->data;

            //$letlng = '(25.769108534982895, -80.26654243469238)(25.743753031802985, -80.27169227600098)(25.738650355647824, -80.23375511169434)(25.772664056765723, -80.22860527038574)';
            //$this->saveGridImage($letlng,1);
            $this->saveGridImageByAddress($data['Room']['address'], $data['Room']['id']);

            if ($this->Room->save($data)) {
                //prd($data);
                foreach ($data['RoomOption'] as $key => $value) {

                    $optionData = array();
                    $optionData['RoomOption']['facility_id'] = $key;
                    $optionData['RoomOption']['room_id'] = $id;

                    $roomOpt = $this->RoomOption->find('first', array(
                        'conditions' => array(
                            'RoomOption.facility_id' => $key,
                            'RoomOption.room_id' => $id,
                        )
                    ));

                    if (empty($roomOpt) && $value['facility_id'] == 1) {
                        $this->RoomOption->create();
                        $this->RoomOption->save($optionData);
                    } else if (!empty($roomOpt)) {
                        if ($value['facility_id'] == 0) {
                            $optionData['RoomOption']['id'] = $roomOpt['RoomOption']['id'];
                            $optionData['RoomOption']['status'] = 0;
                            $this->RoomOption->save($optionData);
                        } else {
                            $optionData['RoomOption']['id'] = $roomOpt['RoomOption']['id'];
                            $optionData['RoomOption']['status'] = 1;
                            $this->RoomOption->save($optionData);
                        }
                    }
                }

                $this->Session->setFlash('Room added successfully.', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'mylisting'));
            } else {
                $this->Session->setFlash('Room could be added.', 'default', array('class' => 'alert alert-danger'));
            }
        }

        //prd($roomInfo);
        $this->request->data = $roomInfo;
    }

    public function getNumber() {
        $this->layout = 'ajax';
        $request = $this->request;
        $id = $request->query['room_id'];

        if (!empty($id) && is_numeric($id)) {
            $roomInfo = $this->Room->find('first', array('conditions' => array(
                    'Room.id' => $id
            )));

            echo ($roomInfo['Room']['contact']) ? $roomInfo['Room']['contact'] : 'Not Metion';
            exit;
        } else {
            echo "0";
            exit;
        }
    }

    function delete_all_between($beginning, $end, $string) {
        $beginningPos = strpos($string, $beginning);
        $endPos = strpos($string, $end);
        if ($beginningPos === false || $endPos === false) {
            return $string;
        }

        $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

        return str_replace($textToDelete, '', $string);
    }

    public function report($from = 0) {
        $this->layout = 'ajax';

        if ($from == 1) {
            $this->layout = "ajax";
            // $this->set('from','1');
        }

        if ($this->request->is('Post')) {
            $this->loadModel('Report');
            $data = $this->request->data;
            // 1 = not available
            // 2 = wrong contact
            // 3 = wrong price
            // 4 = wrong location
            if ($data['Report']['radio_input'] == 1) {
                $data['Report']['not_available'] = 1;
            } elseif ($data['Report']['radio_input'] == 2) {
                $data['Report']['wrong_contact'] = 1;
            } elseif ($data['Report']['radio_input'] == 3) {
                $data['Report']['wrong_price'] = 1;
            } elseif ($data['Report']['radio_input'] == 4) {
                $data['Report']['wrong_location'] = 1;
            }
            $data['Report']['room_id'] = $this->request->query['room_id'];
            $room_id = $data['Report']['room_id'];
            // prd($data);
            if ($this->Report->save($data)) {
                $this->flash_msg('Report has been submitted, this will be checked by admin', 3);
                $this->redirect(array('controller' => 'rooms', 'action' => 'detail', $room_id));
            } else {
                $this->flash_msg('Report not submitted, please try again', 2);
                $this->redirect(array('controller' => 'rooms', 'action' => 'detail', $room_id));
            }
        }
    }

    public function makeRoomFav() {
        $this->loadModel('Favorite');
        
        if ($this->request->is('ajax')) {
            $roomId = $this->request->data['roomId'];
            $user_id = $this->_getCurrentUserId();
            
            $favRoomData = $this->Favorite->find('first', array(
                'conditions' => array(
                    'Favorite.room_id' => $roomId, 
                    'Favorite.user_id' => $user_id)
            ));
            
            $data = array();
            if (!empty($favRoomData)) {
                if ($favRoomData['Favorite']['status'] == 1) {
                    $data['Favorite']['id'] = $favRoomData['Favorite']['id'];
                    $data['Favorite']['status'] = 0;
                } else {
                    $data['Favorite']['id'] = $favRoomData['Favorite']['id'];
                    $data['Favorite']['status'] = 1;
                }
            }

            $data['Favorite']['room_id'] = $roomId;
            $data['Favorite']['user_id'] = $user_id;
            
            if ($this->Favorite->save($data)) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        }
    }

    public function hitcount() {
        $request = $this->request;
        $this->loadModel('Hit');
        if ($request->is("ajax")) {
            $response = array(
                "status" => 0,
                "msg" => __("Invalid Request")
            );
            if ($request->is("post")) {
                $room_id = $request->data("id");
                $response["msg"] = __("Invalid room Id");

                if (!empty($room_id)) {
                    $r_addr = $_SERVER['REMOTE_ADDR'];  //  store remote address
                    $user_id = $this->_getCurrentUserId();
                    if (empty($user_id)) {
                        $user_id = 0;
                    }

                    $curr_date = date('Y-m-d');
                    $condition = array();
                    $condition['Hit.ip_addr'] = $r_addr;
                    $condition['Hit.room_id'] = $room_id;
                    $condition['Hit.user_id'] = $user_id;
                    //$condition['DATE( Hit.createds )'] = 'CURDATE()';
                    $condition['DATE( Hit.created ) >='] = $curr_date;

                    $dataHit = $this->Hit->find("first", array(
                        "conditions" => $condition,
                    ));

                    if (empty($dataHit)) {
                        $saveData = array();
                        $saveData['Hit']['ip_addr'] = $r_addr;
                        $saveData['Hit']['room_id'] = $room_id;
                        $saveData['Hit']['user_id'] = $user_id;
                        $saveData['Hit']['status'] = 1;

                        if ($this->Hit->save($saveData)) {
                            $this->Room->updateAll(
                                    array('Room.hits' => 'Room.hits + 1'), array('Room.id' => $room_id));

                            $response["status"] = 1;
                            $response["msg"] = __("Hit count add successfully");
                        }
                    } else {
                        $response["status"] = 1;
                        $response["msg"] = __("Hit alerdy added");
                    }
                }
            }
            echo json_encode($response);
            exit;
        } else {
            $this->render('/nodirecturl');
        }
    }

    /*  ==========  ADMIN SECTION  ==========  */

    public function admin_index() {
        $roomList = $this->Room->find('all', array(
            'conditions' => array(
                'Room.status !=' => 2,
            ),
            'order' => array('Room.created desc')
        ));
        $this->set('roomList', $roomList);
    }

    public function admin_add() {
        $this->loadModel('Categories');
        $this->loadModel('Facilities');
        $this->loadModel('RoomOption');

        $cateList = $this->Categories->find('list', array('fields' => array('code', 'title')));
        $this->set('cateList', $cateList);

        $fa_List = $this->Facilities->find('all');
        $this->set('fa_List', $fa_List);


        if (!empty($this->request->data)) {
            $data = $this->request->data;


            //prd($data);
            $maxPro = $this->Room->find('first', array('fields' => array('MAX(unique_number) as maxnum')));
            $data['Room']['unique_number'] = $maxPro[0]['maxnum'] + 1;
            $data['Room']['unique_code'] = $data['Room']['cate'];

            $s_cate = $this->Categories->find('first', array(
                'conditions' => array('code' => $data['Room']['cate']),
                'fields' => array('id', 'code')
            ));

            $data['Room']['category_id'] = $s_cate['Categories']['id'];

            //prd($data);
            if ($r = $this->Room->save($data)) {

                foreach ($data['RoomOption'] as $key => $value) {
                    if ($value['facility_id'] == 1) {
                        $optionData = array();
                        $optionData['RoomOption']['facility_id'] = $key;
                        $optionData['RoomOption']['room_id'] = $r['Room']['id'];

                        $this->RoomOption->create();
                        $this->RoomOption->save($optionData);
                    }
                }

                $this->Session->setFlash('Room added successfully.', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->Session->setFlash('Room could be added.', 'default', array('class' => 'alert alert-danger'));
            }
        }
    }

    public function admin_edit($id) {
        if (!empty($this->request->data)) {
            $data = $this->request->data;

            //prd($data);
            if ($this->Room->save($data)) {
                $this->Session->setFlash('Room Update successfully.', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->Session->setFlash('Room could be updated.', 'default', array('class' => 'alert alert-danger'));
            }
        }

        $this->request->data = $this->Room->findById($id);
    }

    public function admin_image_multi_upload() {
        if (isset($_FILES['uploadfile']['name']) && !empty($_FILES['uploadfile']['name'][0])) {
            $product_id = 0;
            if (isset($this->request->data['room_id'])) {
                $product_id = $this->request->data['room_id'];
            }
            $data = $_FILES;
            $i = -1;
            $responseArray = array();

            $roomData = array();

            if (empty($product_id)) {
                unset($product_id);
                $last_url = explode("/", $_SERVER['HTTP_REFERER']);
            } else {
                $lastInsertID = $roomData['Room']['id'] = $product_id;
            }


            $roomData['Room']['created'] = date('Y-m-d');

            $roomSave = $this->Room->save($roomData);


            if (isset($roomSave['Room']['id'])) {
                $lastInsertID = $roomSave['Room']['id'];
            }
            //prd($data);

            foreach ($data['uploadfile']['name'] as $image) {
                $i++;

                $responseArray[$i]['error'] = 0;
                $ext = $this->get_extension($image);
                $file_extension = array('png', 'gif', 'jpeg', 'jpg');

                if (!in_array($ext, $file_extension)) {
                    $responseArray[$i]['error'] = 1;
                    $responseArray[$i]['error_type'] = 'TYPE_ERROR';
                    continue;
                }

                $size = getimagesize($data['uploadfile']['tmp_name'][$i]);
                if ($size[0] < 190 || $size[1] < 120) {
                    $responseArray[$i]['error'] = 1;
                    $responseArray[$i]['error_type'] = 'SIZE_RATIO_ERROR';
                    continue;
                }

                $imageSize = round($data['uploadfile']['size'][$i] / 1024);  /// IN KB

                $maximumImageSize = 5120;  ////  IN KB  ///// 5 MB

                if ($imageSize > $maximumImageSize) {

                    $responseArray[$i]['error'] = 1;
                    $responseArray[$i]['error_type'] = 'SIZE_ERROR';
                    continue;
                }

                $ext = $this->get_extension($image);
                $file_extension = array('png', 'gif', 'jpeg', 'jpg');

                if (in_array($ext, $file_extension)) {
                    $newFileName = '';
                    $newFileName = 'c_' . $lastInsertID . '_' . $this->genRandomString() . '.' . $ext;
                    $destination = '';
                    $destination = 'img/uploads/' . $newFileName;

                    $moved = move_uploaded_file($data['uploadfile']['tmp_name'][$i], $destination);

                    if ($moved) {
                        $PhotoData = array();

                        $PhotoData['Image']['room_id'] = $lastInsertID;
                        $PhotoData['Image']['title'] = $newFileName;
                        $this->loadModel('Image');

                        $this->Image->Create();
                        $imageData = $this->Image->save($PhotoData);

                        $imagePath = $this->resize_url("uploads/" . $newFileName, 80, 104);
                        $responseArray[$i]['img_id'] = $imageData['Image']['id'];
                        $responseArray[$i]['img_name'] = $imagePath;
                        $responseArray[$i]['room_id'] = $lastInsertID;
                    }
                }
            }
            //prd($responseArray);
            $respone = json_encode($responseArray);
            echo $respone;
        }
        exit;
    }
    
    public function image_multi_upload() {
        if (isset($_FILES['uploadfile']['name']) && !empty($_FILES['uploadfile']['name'][0])) {
            $product_id = 0;
            if (isset($this->request->data['room_id'])) {
                $product_id = $this->request->data['room_id'];
            }
            $data = $_FILES;
            $i = -1;
            $responseArray = array();

            $roomData = array();

            if (empty($product_id)) {
                unset($product_id);
                $last_url = explode("/", $_SERVER['HTTP_REFERER']);
            } else {
                $lastInsertID = $roomData['Room']['id'] = $product_id;
            }


            $roomData['Room']['created'] = date('Y-m-d');

            $roomSave = $this->Room->save($roomData);


            if (isset($roomSave['Room']['id'])) {
                $lastInsertID = $roomSave['Room']['id'];
            }
            //prd($data);

            foreach ($data['uploadfile']['name'] as $image) {
                $i++;

                $responseArray[$i]['error'] = 0;
                $ext = $this->get_extension($image);
                $file_extension = array('png', 'gif', 'jpeg', 'jpg');

                if (!in_array($ext, $file_extension)) {
                    $responseArray[$i]['error'] = 1;
                    $responseArray[$i]['error_type'] = 'TYPE_ERROR';
                    continue;
                }

                $size = getimagesize($data['uploadfile']['tmp_name'][$i]);
                if ($size[0] < 190 || $size[1] < 120) {
                    $responseArray[$i]['error'] = 1;
                    $responseArray[$i]['error_type'] = 'SIZE_RATIO_ERROR';
                    continue;
                }

                $imageSize = round($data['uploadfile']['size'][$i] / 1024);  /// IN KB

                $maximumImageSize = 5120;  ////  IN KB  ///// 5 MB

                if ($imageSize > $maximumImageSize) {

                    $responseArray[$i]['error'] = 1;
                    $responseArray[$i]['error_type'] = 'SIZE_ERROR';
                    continue;
                }

                $ext = $this->get_extension($image);
                $file_extension = array('png', 'gif', 'jpeg', 'jpg');

                if (in_array($ext, $file_extension)) {
                    $newFileName = '';
                    $newFileName = 'c_' . $lastInsertID . '_' . $this->genRandomString() . '.' . $ext;
                    $destination = '';
                    $destination = 'img/uploads/' . $newFileName;

                    $moved = move_uploaded_file($data['uploadfile']['tmp_name'][$i], $destination);

                    if ($moved) {
                        $PhotoData = array();

                        $PhotoData['Image']['room_id'] = $lastInsertID;
                        $PhotoData['Image']['title'] = $newFileName;
                        $this->loadModel('Image');

                        $this->Image->Create();
                        $imageData = $this->Image->save($PhotoData);

                        $imagePath = $this->resize_url("uploads/" . $newFileName, 80, 104);
                        $responseArray[$i]['img_id'] = $imageData['Image']['id'];
                        $responseArray[$i]['img_name'] = $imagePath;
                        $responseArray[$i]['room_id'] = $lastInsertID;
                    }
                }
            }
            //prd($responseArray);
            $respone = json_encode($responseArray);
            echo $respone;
        }
        exit;
    }

}
