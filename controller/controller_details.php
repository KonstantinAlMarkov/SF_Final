<?php
class Controller_Details extends Controller
{	
    private $data = [];
	
    function __construct()
	{
        parent::__CONSTRUCT();
        {
            if(strcasecmp($this->userRole,"Клиент")==0||strcasecmp($this->userRole,"Вебмастер")==0)
            {
                require_once 'model/model_programs.php';
                $this->model = new Model_Programs();
                $this->view = new View();
                $this->data['program'] = $this->model->getProgramById($_GET['programId']);
                if(strcasecmp($this->userRole,"Вебмастер")==0){
                    $this->data['isGetted'] = $this->model->checkSubsctiption($this->userId,$_GET['programId']);  
                    if ($this->data['isGetted']){
                        $this->data['URL'] = $this->model->getWebmasterURL($this->userId, $_GET['programId']);
                    }              
                }
                require_once 'model/model_balance.php';
                if($this->userId)
                {
                    $this->modelBalance = new Model_Balance();
                    $this->data['balance'] = $this->modelBalance->getBalance($this->userId);
                }
            }
        }
	}       
    
	function createPage(string $viewName)
	{      
        if(strcasecmp($this->userRole,"Клиент")==0 || strcasecmp($this->userRole,"Вебмастер")==0)
        {
            $this->view->generate($viewName, 'default.php', $this->authorised, $this->data, null, $this->userRole);
        }
    }
}