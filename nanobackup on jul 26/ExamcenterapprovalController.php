<?php
ini_set('memory_limit', '-1');
error_reporting (E_ALL ^ E_WARNING);
error_reporting (E_ALL ^ E_NOTICE);


class ExamcenterapprovalController extends Zend_Controller_Action { //Controller for the User Module

	public $gsessionidCenter;//Global Session Name
	
	public function init() { //initialization function
		$this->gsessionidCenter = Zend_Registry::get('sis');
		if(empty($this->gsessionidCenter->idcenter)){
			$this->_redirect( $this->baseUrl . '/batchlogin/logout');
		}
		$this->_helper->layout()->setLayout('/examcenter/usty1');
		$this->view->translate =Zend_Registry::get('Zend_Translate');
		Zend_Form::setDefaultTranslator($this->view->translate);
		$this->fnsetObj();
		ini_set('max_execution_time', '-1');
	}
	
	public function fnsetObj() {
		$this->lobjCommon = new App_Model_Common();
		$this->lobjCenterloginmodel = new App_Model_Centerlogin(); //user model object
		$this->lobjBatchcandidatesmodel = new App_Model_Batchcandidates(); //user model object
		$this->lobjBatchcandidatesForm = new App_Form_Batchcandidates (); //intialize user lobjuserForm
		$this->registry = Zend_Registry::getInstance();
		$this->locale = $this->registry->get('Zend_Locale');
		$this->lobjdeftype = new App_Model_Definitiontype();
	}
	
	public function indexAction()
	{
		$month= date("m"); // Month value
		$day= date("d"); //today's date
		$year= date("Y"); // Year value
		$todaydate= date('Y-m-d', mktime(0,0,0,$month,($day),$year));
		$examdate = "{max:'$todaydate',datePattern:'dd-MM-yyyy'}";
		$lobjsearchform = new App_Form_Search();
		$lobjform=$this->view->lobjform = $lobjsearchform;
		$examcentermodel = new App_Model_Examcenterapproval();
		$larrresult = $this->lobjCenterloginmodel->fnviewCenter($this->gsessionidCenter->idcenter);
		$lobjsearchform->field21->setAttrib('OnChange','fnGetProgramName(this)');
		$lobjsearchform->field21->setAttrib('constraints', "$examdate");
		$lobjsearchform->field21->setValue(date('Y-m-d'));
		$lobjsearchform->field21->setAttrib('ReadOnly', "true");

		$programnames=$examcentermodel->fnGetprogram();
		$lobjsearchform->field5->addMultiOption('','Select');
		$lobjsearchform->field5->addMultiOptions($programnames);
		$this->view->lobjBatchcandidatesForm = $this->lobjBatchcandidatesForm;
		$this->view->companyDetails =  $larrresult;
		$idcenter = $larrresult['idcenter'];
		$date =  date('d');
		$month = date('m');
		if($month<10)
		{
			$month = $month[1];
		}
		if($date<10)
		{
			$date = $date[1];
		}
		$year = date('Y');
		$larrresult  = $examcentermodel->fnGetStudentdetails($date,$month,$year,$larrresult['idcenter']);
		$this->view->countcomp = count($larrresult);
		$this->view->studentdetails = $larrresult;
		if ($this->_request->isPost() && $this->_request->getPost('Approve')) {
			$lobjFormData = $this->_request->getPost();
			$larrresult = $examcentermodel->fnStudentApproved($lobjFormData);
		    $lobjExamvenuepush = new App_Model_Examvenuepush();
		    try {
		    	$db = Zend_Db::factory('Pdo_Mysql', array(
							    'host'     => '122.166.48.230',
							    'username' => 'pushpanath',
							    'password' => 'pushpanath',
							    'dbname'   => 'newcltdb'
							    ));
							    $db->getConnection();
							    $larrresult = $lobjExamvenuepush->fnGetStudentapprovedserver($lobjFormData);
		    } catch (Zend_Db_Adapter_Exception $e) {
		    }
			$this->_redirect($this->baseUrl . '/examcenterapproval/index');
		}
		$lintpagecount = 10000000;
		$lintpage = $this->_getParam('page',1);
		if(!$this->_getParam('search'))
		unset($this->gsessionidCenter->userpaginatorresult);
		$lintpagecount = $this->gintPageCount;
		$lintpage = $this->_getParam('page',1); //Paginator instance
		if(isset($this->gsessionidCenter->userpaginatorresult)) {
			$this->view->paginator = $this->lobjCommon->fnPagination($this->gsessionidCenter->userpaginatorresult,$lintpage,$lintpagecount);
		} else {
			$this->view->paginator = $this->lobjCommon->fnPagination($larrresult,$lintpage,$lintpagecount);
		}
		if ($this->_request->isPost () && $this->_request->getPost ( 'Search' )) {
			$larrformData = $this->_request->getPost ();
			if ($lobjform->isValid ( $larrformData )) {
				$larrresult = $examcentermodel->fnSearchstudent($larrformData,$idcenter); //searching the values for the user
				$this->view->studentdetails = $larrresult;
			}
		}
	}
	
	public function studentapprovallistAction(){
		$examcentermodel = new App_Model_Examcenterapproval();
		$lstrType = $this->_getParam('lvaredit');
		$larrstudentdetails=$examcentermodel->fnGetStudent($lstrType);
		$this->view->studentdetails = $larrstudentdetails;
		$this->view->studentdetails = $larrstudentdetails;
	}
	
	public function getprogramlistAction(){
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender();
		$examcentermodel = new App_Model_Examcenterapproval();
		$date = $this->_getParam('dates');
		$larrprogramlist= $this->lobjCommon->fnResetArrayFromValuesToNames($examcentermodel->fnGetProgramList($date));
		Zend_Json_Encoder::encode($larrprogramlist);
		echo Zend_Json_Encoder::encode($larrprogramlist);
	}
		
}