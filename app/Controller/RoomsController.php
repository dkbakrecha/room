<?php

App::uses('AppController', 'Controller');

class RoomsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'room_listing', 'listing', 'detail');
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
                $this->set('roomList',$rooms);
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
                $viewFilter->set('roomList',$rooms);
                $htmlFilter = $viewFilter->element('room_filter', array('category' => $statics['category_filter']));

                $view = new View($this, false);
                $view->set('roomList',$rooms);
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

            $roomInfo = $this->Room->find('first', array(
                'conditions' => array(
                    'Room.status !=' => 2,
                    'Room.id' => $id
                ),
                'recursive' => 2
            ));
            //prd($roomInfo);
            $this->set('roomInfo', $roomInfo);
        } else {
            $this->redirect(array('action' => 'listing'));
        }
    }
    
    public function add() {
        $this->loadModel('Categories');
        $this->loadModel('Facilities');
        $this->loadModel('RoomOption');

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
            $s_cate = $this->Categories->find('first',array(
                'conditions' => array('code' => $data['Room']['cate']),
                'fields' => array('id','code')
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
    
    public function getNumber() {
        $this->layout = 'ajax';
        $request = $this->request;
        $id = $request->query['room_id'];

        if (!empty($id) && is_numeric($id)) {
            $roomInfo = $this->Room->find('first',array('conditions' => array(
                'Room.id' => $id
            )));
            
            echo ($roomInfo['Room']['contact'])?$roomInfo['Room']['contact']:'Not Metion';
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
            
            $s_cate = $this->Categories->find('first',array(
                'conditions' => array('code' => $data['Room']['cate']),
                'fields' => array('id','code')
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

}
