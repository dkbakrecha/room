<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

    public $uses = array();
    public $components = array('Gcal');
    var $helpers = array('MagickConvert');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'about', 'home', 'req_complete', 'sync', 'getEvents'
                , 'add_lesson_opening', 'services', 'contact','terms');

        $this->Gcal->c_id = "406644858249-sa671ja4v9uc9td5cbclfqmcpci5sm42.apps.googleusercontent.com";
        $this->Gcal->c_secrat = "q3PZCxUtP862JwTWVkTnEJEX";
        $this->Gcal->r_url = "http://www.dynamicwebsite.co.in/testnew/pages/req_complete/";

        $this->Gcal->googleSettings();
    }

    public function home() {
        
    }
    
    public function admin_searchterms() {
        $this->loadModel('Searchterm');
        $requestData = $this->request->data;
        
        if(!empty($requestData)){
            $this->Searchterm->save($requestData);
            $this->Session->setFlash("New Search Term add successfully", "default", array('class' => 'alert alert-success'));
        }
        
        $search_termList = $this->Searchterm->find('all');
        $this->set('termList',$search_termList);
    }

    public function about() {
        $this->loadModel('CmsPage');

        $cmsContent = $this->CmsPage->find('first', array(
            'conditions' => array(
                'CmsPage.unique_name' => 'ABOUT_US'
            )
        ));
       
        $this->set('cmsContent', $cmsContent);
    }
    
    public function terms() {
        $this->loadModel('CmsPage');

        $cmsContent = $this->CmsPage->find('first', array(
            'conditions' => array(
                'CmsPage.unique_name' => 'TERMS'
            )
        ));
       
        $this->set('cmsContent', $cmsContent);
    }

    public function add_lesson_opening() {
        $this->layout = 'ajax';
        $request = $this->request;
        $currUserId = $this->Session->read('Auth.User.id');
        $this->loadModel("Event");

        if ($request->isAjax()) {

            if (($request->isPost() || $request->isPut()) && !empty($request->data)) {
                $dataHere = $request->data;

                $eventDetail = $this->whatEvent($dataHere['pages']['what'], $dataHere['pages']['cDate']);
                //pr($eventDetail);
                // prd($dataHere);
                $dataHere['pages']['coach_id'] = $currUserId;

                $dataHere['Event']['from_time'] = $eventDetail['eventStart'];
                $dataHere['Event']['to_time'] = $eventDetail['eventEnd'];
                $dataHere['Event']['summary'] = $eventDetail['eventSummary'];
                $dataHere['Event']['where'] = $eventDetail['eventWhere'];


                // Validate the data               
                $this->Event->set($dataHere);
                //prd($dataHere);
                if ($this->Event->validates()) {
                    // Set the schedule
                    $dataHere['Event']['created_by'] = 1;
                    $dataHere['Event']['status'] = 1;
                    $this->Event->create();
                    if ($this->Event->save($dataHere)) {
                        echo '1';
                        exit;
                    } else {
                        echo '0';
                        exit;
                    }
                }
            } else {
                $cdate = $this->request->query['cDate'];
                $this->set('clickDate', $cdate);
            }
        } else {
            $this->render('../nodirecturl');
        }
    }

    public function index() {
        $data = $this->request->data;
        //$this->googleSettings();
        //$this->makesync();

        if (isset($data) && !empty($data)) {
            if (isset($data['calenderAdd']['flag']) && $data['calenderAdd']['flag'] == 'insert') {

                $calender_id = "4srvknenrofdpunohccs1u3akc@group.calendar.google.com";

                //$calender_id = "cgtdharm@gmail.com";
                $calender_id = "dtest786@gmail.com";    //Test Prinary
                $calender_id = "fche971pa3ooq69o9lqoaq8e30@group.calendar.google.com"; //Test Secondary

                $event = new Google_Service_Calendar_Event();
                $event->setSummary('Appointment Testttttttt');
                $event->setLocation('Somewhere');
                $start = new Google_Service_Calendar_EventDateTime();
                $start->setDateTime('2015-01-17T10:00:00.000-07:00');
                $event->setStart($start);
                $end = new Google_Service_Calendar_EventDateTime();
                $end->setDateTime('2015-01-20T10:25:00.000-07:00');
                $event->setEnd($end);
                $createdEvent = $this->gCal_service->events->insert($calender_id, $event);

                echo $createdEvent->getId();
            }
        }
        //echo $authUrl;
    }

    public function sync() {
        $this->loadModel('Event');
        $this->Gcal->makesync();
        $skip = 1;

        if ($skip == 0) {
            /* FIND NEW EVENTS */
            $eventList = $this->Event->find('all', array(
                'conditions' => array(
                    'Event.status' => 1,
                    'Event.gcal_id IS NULL',
                ),
            ));

            $calender_id = "fche971pa3ooq69o9lqoaq8e30@group.calendar.google.com"; //Test Secondary

            if (!empty($eventList)) {
                foreach ($eventList as $event) {
                    $eventDesc = array();
                    $eventDesc['eventSummary'] = $event['Event']['summary'];
                    $eventDesc['eventWhere'] = $event['Event']['where'];
                    $eventDesc['startDate'] = $event['Event']['from_time'];
                    $eventDesc['endDate'] = $event['Event']['to_time'];

                    $gEvent_id = $this->Gcal->insertEvent($calender_id, $eventDesc);


                    $this->Event->read(null, $event['Event']['id']);
                    $this->Event->set(array(
                        'gcal_id' => "$gEvent_id",
                        'gstatus' => 1,
                    ));
                    $this->Event->save();
                }
            }

            /* FIND DELETED EVENT and delete it from google calender */
            $eventTrush = $this->Event->find('all', array(
                'conditions' => array(
                    'Event.status' => 2,
                    'Event.gstatus' => 1,
                ),
            ));

            if (!empty($eventTrush)) {
                foreach ($eventTrush as $event) {
                    $this->Gcal->deleteEvent($calender_id, $event['Event']['gcal_id']);

                    $this->Event->read(null, $event['Event']['id']);
                    $this->Event->set(array(
                        'gstatus' => 2,
                    ));
                    $this->Event->save();
                }
            }
        }

        $this->redirect(array('action' => 'index'));
    }

    public function getEvents() {
        $request = $this->request;
        $this->layout = 'ajax';
        $this->autoRender = FALSE;
        $this->loadModel('Event');

        if ($request->isAjax()) {
            if ($request->isGet() && !empty($request->query)) {
                //$currUserId = $this->Session->read('Auth.User.id');
                //$currUserType = $this->Session->read('Auth.User.user_type');
                //if ($currUserType == '1') {
                //prd($request->query);
                // Get the Schedules
                $eventList = $this->Event->find('all', array(
                    'conditions' => array(
                        'Event.status' => '1',
                        //'LessonOpening.coach_id' => $currUserId,
                        'Event.from_time >= ' => date('Y-m-d 00:00:00', $request->query['start']),
                        'Event.from_time <= ' => date('Y-m-d 23:59:59', $request->query['end']),
                    ),
                    'fields' => array('Event.*')
                ));

                //prd($eventList);

                if (isset($eventList) && !empty($eventList)) {

                    $all_events = array();
                    foreach ($eventList as $lessons) {
                        $openings = array();
                        $openings['id'] = $lessons['Event']['id'];
                        $openings['group_id'] = $lessons['Event']['group_id'];
                        $openings['start'] = $lessons['Event']['from_time'];
                        $openings['end'] = $lessons['Event']['to_time'];
                        $openings['type'] = $lessons['Event']['type'];

                        switch ($lessons['Event']['type']) {
                            case '1' : $openings['title'] = "Private Lesson";
                                $openings['className'] = "private_lesson"; //#8C7D9E
                                break;
                            case '2' : $openings['title'] = "Group Lesson : " . $lessons['Group']['title'];
                                $openings['className'] = "group_lesson"; //#1A93D8
                                break;
                            case '3' : $openings['title'] = "Match Play";
                                $openings['className'] = "match_lesson"; //#54BFB7
                                break;
                        }

                        $all_events[] = $openings;
                    }

                    if (isset($all_events) && !empty($all_events)) {
                        echo json_encode($all_events);
                    } else {
                        echo 'NF';
                        exit;
                    }
                } else {
                    echo 'NF';
                    exit;
                }
//                } else {
//                    echo '0';
//                    exit;
//                }
            } else {
                $this->render('../nodirecturl');
            }
        } else {
            $this->render('../nodirecturl');
        }
    }

    public function req_complete() {
        $this->autoRender = false;
        //prd($this->request);
        //prd($this->request->query("code"));
        $this->Gcal->googleSettings();
        $this->Gcal->setAuthCode($this->request->query("code"));
        //$this->googleSettings();
//        $authCode = trim( $this->request->query("code") );
//        $accessToken = $this->client->authenticate($authCode);
//        $this->Session->write("authToken", $accessToken);
        //prd($accessToken);
        $this->redirect(array('action' => 'sync'));
    }

    /*
      function googleSettings(){
      // OAuth2 client ID and secret can be found in the Google Developers Console.
      $this->client = new Google_Client();
      //$this->client->setApplicationName("dharmclassy");
      //$this->client->setDeveloperKey("AIzaSyBWDP3iPaeXTwBSCuxx47SRWpLRexDAeHw");

      $this->client->setClientId('406644858249-sa671ja4v9uc9td5cbclfqmcpci5sm42.apps.googleusercontent.com');
      $this->client->setClientSecret('q3PZCxUtP862JwTWVkTnEJEX');
      $this->client->setRedirectUri('http://www.dynamicwebsite.co.in/testnew/pages/req_complete/');

      $this->client->setScopes("https://www.googleapis.com/auth/plus.login");
      $this->client->addScope('https://www.googleapis.com/auth/calendar');
      //  pr($this->client);
      $this->gCal_service = new Google_Service_Calendar($this->client);
      //prd($service);
      }


      function makesync(){
      $authUrl = $this->client->createAuthUrl();

      $authToken = $this->Session->read("authToken");
      if(isset($authToken) && !empty($authToken)){
      $this->client->setAccessToken($authToken);

      if($this->client->isAccessTokenExpired()) {
      header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
      }
      }else{
      $this->redirect($authUrl);
      }
      }
     * 
     */

    /*
      LOGIC FOR EVENT PERSE FROM STRING LIKE
      GOOGLE CALENDER QUICK EVENT ADD
      APPLY FOR ONLY SINGLE DAY EVENT

      @Input
      $str [required] 		: String summary of event
      $cdate [required] 		: Current date in any Format
      @Output
      $array contain
      ["eventStart"] 		: Starting Time of EVENT
      ["eventEnd"] 		: Ending Time of EVENT
      ["eventSummary"] 	: Summary Of EVENT
      ["eventWhere"] 		: ADDRESS of Event if defind

      @Date : Saturday January 17, 2015
      @Author : Dharmendra Bakrecha
     */

    function whatEvent($str, $cdate) {
        $strCompose = explode(" ", $str);
        $newDate = date("d-m-Y", strtotime($cdate));

        $resultEvent = array();

        $substringsTime = array('am', 'pm');
        /*   	
          $resultTime = array_filter($strCompose, function($item) use($substringsTime) {
          foreach($substringsTime as $substring)
          if(strpos($item, $substring) !== FALSE) return TRUE;
          return FALSE;
          });
         */

        $resultTime = array();
        foreach ($strCompose as $key => $newarray) {
            foreach ($substringsTime as $substring) {
                if (strpos($newarray, $substring) !== FALSE) {
                    $resultTime[$key] = $newarray;
                }
            }
        }


        if (!empty($resultTime)) {
            $i = 1;
            foreach ($resultTime as $timeIndex => $timeValue) {
                /*
                  if($timeValue == 'am' || $timeValue == 'pm'){
                  $timeValue = $strCompose[$timeIndex -1] . $strCompose[$timeIndex];
                  }
                 */

                if ($i == 1) {
                    $resultEvent['eventStart'] = date("Y-m-d H:i:s A", strtotime($newDate . " " . $timeValue));
                    unset($strCompose[$timeIndex]);
                }

                if ($i == 2) {
                    $resultEvent['eventEnd'] = date("Y-m-d H:i:s A", strtotime($newDate . " " . $timeValue));

                    /* If to value is small then from */
                    if ($resultEvent['eventStart'] > $resultEvent['eventEnd']) {
                        $resultEvent['eventEnd'] = date("Y-m-d H:i:s A", strtotime($resultEvent['eventEnd'] . " + 1 day"));
                    }

                    unset($strCompose[$timeIndex]);
                    if (strtolower($strCompose[$timeIndex - 1]) == "to") {
                        unset($strCompose[$timeIndex - 1]);
                    }
                }
                $i++;
            }

            /* WHEN no to time is define */
            if (count($resultTime) == 1) {
                $resultEvent['eventEnd'] = date("Y-m-d H:i:s A", (strtotime($newDate . " " . $timeValue) + 3600));
            }
        } else {
            /* WHEN no Date define */
            $resultEvent['eventStart'] = date("Y-m-d H:i:s A", strtotime($newDate));
            $resultEvent['eventEnd'] = date("Y-m-d H:i:s A", strtotime($newDate . " " . "12:59:00 PM"));
        }

        $substringsWhere = array('at');
        /*
          $resultWhere = array_filter($strCompose, function($item) use($substringsWhere) {
          foreach($substringsWhere as $substring)
          if(strpos($item, $substring) !== FALSE) return TRUE;
          return FALSE;
          });
         */

        $resultWhere = array();
        foreach ($strCompose as $key => $newarray) {
            foreach ($substringsWhere as $substring) {
                if (strpos($newarray, $substring) !== FALSE) {
                    $resultWhere[$key] = $newarray;
                }
            }
        }

        $resultEvent['eventSummary'] = "";
        $resultEvent['eventWhere'] = "";

        $newAddr = array();
        if (!empty($resultWhere)) {
            $keyWhere = array_search('at', $strCompose);

            foreach ($strCompose as $strIndex => $strValue) {
                unset($strCompose[$keyWhere]);
                if ($strIndex > $keyWhere) {
                    array_push($newAddr, $strValue);
                    unset($strCompose[$strIndex]);
                }
            }
        }

        if (!empty($newAddr)) {
            $resultEvent['eventWhere'] = implode(" ", $newAddr);
        }

        $resultEvent['eventSummary'] = implode(" ", $strCompose);
        return $resultEvent;
    }

    public function services() {
        
    }

    public function contact() {
        $this->loadModel('Contact');
        $contact = $this->Contact->find('all');
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $this->Contact->create($data);

            if ($this->Contact->validates()) {
                $this->Contact->save();
                $this->Session->setFlash(__('Contact us has been saved successfully.'));
                return $this->redirect(array('action' => 'contact'));
            } else {
                $this->Session->setFlash(
                        __('Error! While saving. Please fill all required field.')
                );
            }
        }
    }

}
