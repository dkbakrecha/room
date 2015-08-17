<?php

App::uses('AppController', 'Controller');

class CmsPagesController extends AppController {

    //public $name = 'CmsPage';

    public function beforeFilter() {
        parent::beforeFilter();
        //$allow = array('get_content', 'index');
        //$this->Auth->allow($allow);
    }

    public function admin_index() {
        $this->set('title_for_layout', 'Content Management (CMS Pages)');
        
        $cmsContant = $this->CmsPage->find('all');
        //prd($cmsContant);
        $this->set('cmsContant',$cmsContant);
    }

    public function admin_add() {
        $this->set('title_for_layout', 'Add Cms Pages');
        $this->loadModel('CmsPage');
        $this->loadModel('CmsType');

//        $CmspageRow = $this->CmsPage->find('list', array('conditions' => array('CmsPage.id != 0'), 'fields' => array('CmsPage.id',
//                'CmsPage.title')));

        $cmsTypeList = $this->CmsType->find('all', array(
            'conditions' => array('CmsType.status' => 1),
            'fields' => array('id', 'title', 'status')));
        $this->set('cmsTypeList', $cmsTypeList);
        //prd($cmsTypeList);
//        if (count($CmspageRow) > 0) {
//            $this->set('CmspageList', $CmspageRow);
//        }

        if ($this->request->is('post')) {

            $data = $this->request->data;
            // prd($data);
            $data['CmsPage']['created'] = date("Y-m-d H:i:s");
            $data['CmsPage']['updated'] = date("Y-m-d H:i:s");

            if ($this->CmsPage->save($data)) {
                $this->flash_msg('Cms content saved', 1);
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->flash_msg('Cms content saved', 1);
                $this->redirect(array('action' => 'admin_index'));
            }
        }
    }

    public function admin_edit($id = NULL) {
        $this->set('title_for_layout', 'Edit Cms Page');

        if (!is_numeric($id) or ( $id == NULL)) {
            $this->redirect(array('admin' => true, 'controller' => 'CmsPages', 'action' => 'index'));
        }

        $request = $this->request;
        if (($request->isPost() || $request->isPut())) {
            $data = $this->request->data;
            $data['CmsPage']['updated'] = date("Y-m-d H:i:s");

            if ($this->CmsPage->save($data)) {
                $this->Session->setFlash(__('Cms content update successfully.'), 'flash_success');
                $this->redirect(array('admin' => true, 'controller' => 'cms_pages', 'action' => 'index'));
            } else {
                //$this->Session->setFlash(__('Cms content could not be update.'), 'flash_error');
            }
        } else {
            $CmsRow = $this->CmsPage->read(null, $id);

            if (count($CmsRow) > 0) {
                $this->request->data = $CmsRow;
            }
        }
    }

    public function admin_changestatus() {
        if ($this->request->is('ajax')) {
            $myData = $this->request->data;
            $this->loadModel('CmsPage');
            $data['CmsPage']['id'] = $myData['id'];
            $data['CmsPage']['status'] = $myData['status'] == "1" ? 0 : 1;
            //prd($data);
            //$this->CmsPage->id = $myData['id'];
            if ($this->CmsPage->save($data)) {
                echo '1';
            } else {
                echo '0';
            }
            exit;
        } 
    }

    public function admin_delete() {
        if ($this->request->is('ajax')) {
            $myData = $this->request->data;
            //prd($myData);
            $this->loadModel('CmsPage');
            $data['CmsPage']['id'] = $myData['id'];
            $data['CmsPage']['status'] = "2";
            $this->CmsPage->id = $myData['id'];

            if ($this->CmsPage->save($data)) {
                echo '1';
            } else {
                echo '0';
            }
            exit;
        } 
    }

    public function get_content() {
        $this->layout = 'ajax';
        $this->autoRender = false;

        if ($this->request->is('ajax')) {
            $title = $this->request->query('title');
            $conditions = array('status !=' => '2');

            if ($title == 'terms') {
                $conditions['id'] = '3';
            } elseif ($title == 'files') {
                $conditions['id'] = '4';
            } else {
                echo '0';
                exit;
            }

            $PageRequested = $this->CmsPage->find('first', array('conditions' => $conditions));
            if (isset($PageRequested) && !empty($PageRequested)) {
                $responseArray = array('Title' => $PageRequested['CmsPage']['title'],
                    'Body' => $PageRequested['CmsPage']['description']
                );

                $responseString = json_encode($responseArray);
                echo $responseString;
                exit;
            } else {
                echo '0';
                exit;
            }
        } else {
            echo '0';
            exit;
        }
    }

    public function index($key = null) {
        if ($key) { //echo $key; exit;
            $this->loadModel('CmsPage');
            $contentData = $this->CmsPage->findByUniqueName($key);

            if (isset($contentData['CmsPage']['id']) && !empty($contentData['CmsPage']['id']) && isset($contentData['CmsPage']['id']) && !empty($contentData['CmsPage']['id'])) {
                $this->set('title_for_layout', $contentData['CmsPage']['title']);
                $this->set("cmsPageData", $contentData);
            } else {
                $this->redirect(array('controller' => 'index', 'action' => 'index'));
            }
        } else {
            $this->redirect(array('controller' => 'index', 'action' => 'index'));
        }
    }

}