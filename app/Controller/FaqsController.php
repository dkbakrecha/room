<?php

App::uses('AppController', 'Controller');

class FaqsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index() {
        $data = $this->request->data;

        $faqList = $this->Faq->find('all', array(
            'conditions' => array('status' => '1')
        ));

        $this->set('faqList', $faqList);
    }

    /*  ==========  ADMIN SECTION  ==========  */

    public function admin_index() {
        
    }

    public function admin_add() {
        if (!empty($this->request->data)) {
            $data = $this->request->data;

            if ($this->Faq->save($data)) {
                $this->Session->setFlash('Faq added successfully.', 'default', array('class' => 'alert alert-success'));
            } else {
                $this->Session->setFlash('Faq could be added.', 'default', array('class' => 'alert alert-danger'));
            }

            $this->redirect(array('controller' => 'faqs', 'action' => 'index'));
        }
    }
    
    public function admin_edit($id) {
        if (!empty($this->request->data)) {
            $data = $this->request->data;

            if ($this->Faq->save($data)) {
                $this->Session->setFlash('Faq update successfully.', 'default', array('class' => 'alert alert-success'));
            } else {
                $this->Session->setFlash('Faq could be added.', 'default', array('class' => 'alert alert-danger'));
            }

            $this->redirect(array('controller' => 'faqs', 'action' => 'index'));
        }
        
        $this->request->data = $this->Faq->find('first',array('conditions' => array('Faq.id' => $id)));
    }

    public function admin_faqGrid() {
        $request = $this->request;
        $this->autoRender = false;

        if ($request->is('ajax')) {
            $this->layout = 'ajax';

            $page = $request->query('draw');
            $limit = $request->query('length');
            $start = $request->query('start');

            //for order
            $colName = $this->request->query['order'][0]['column'];
            $orderby[$this->request->query['columns'][$colName]['name']] = $this->request->query['order'][0]['dir'];
            //prd($this->request);          
            $condition = array();

            //pr($this->request->query['columns']);
            foreach ($this->request->query['columns'] as $column) {

                if (isset($column['searchable']) && $column['searchable'] == 'true') {
                    //pr($column);
                    if ($column['name'] == 'User.date_added' && !empty($column['search']['value'])) {
                        $condition['User.date_added LIKE '] = '%' . Sanitize::clean(date('Y-m-d', strtotime($column['search']['value']))) . '%';
                    } elseif (isset($column['name']) && $column['search']['value'] != '') {
                        $condition[$column['name'] . ' LIKE '] = '%' . Sanitize::clean($column['search']['value']) . '%';
                    }
                }
            }

            //prd($condition);
            $total_records = $this->Faq->find('count', array('conditions' => $condition));


            $fields = array('Faq.id', 'Faq.question', 'Faq.answer', 'Faq.status');
            $gridData = $this->Faq->find('all', array(
                'conditions' => $condition,
                'fields' => $fields,
                'order' => $orderby,
                'limit' => $limit,
                'offset' => $start
            ));

            $return_result['draw'] = $page;
            $return_result['recordsTotal'] = $total_records;
            $return_result['recordsFiltered'] = $total_records;

            $return_result['data'] = array();
            if (isset($gridData[0])) {
                $i = $start + 1;
                foreach ($gridData as $row) {

                    $action = '';
                    $status = '';
                    /*
                      if ($row['Question']['status'] == 0)
                      {
                      $status .= '<i class="fa fa-dot-circle-o fa-lg clr-red" onclick="changeUserStatus(' . $row['Question']['id'] . ',0)" title="Change Status"></i>';
                      }
                      else if ($row['Question']['status'] == 1)
                      {
                      $status .= '<i class="fa fa-dot-circle-o fa-lg clr-green" onclick="changeUserStatus(' . $row['Question']['id'] . ',1)" title="Change Status"></i>';
                      }
                     */
                    //$action .= '&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-eye fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/faqs/edit/' . $row['Faq']['id'] . '" title="Edit uSER"><i class="fa fa-pencil fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="delete_question(' . $row['Faq']['id'] . ')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';

                    $return_result['data'][] = array(
                        $row['Faq']['id'],
                        $row['Faq']['question'],
                        $row['Faq']['answer'],
                        $action
                    );
                    $i++;
                }
            }
            // pr($return_result);
            echo json_encode($return_result);
            exit;
        } else {
            $this->set('title_for_layout', __('Access Denied'));
            $this->render('/nodirecturl');
        }
    }

}
