<?php
class Controller_Programs extends Controller
{	
    private $data = [];

	function __construct()
	{	
		parent::__CONSTRUCT();
        {
            require_once 'model/model_programs.php';
            $this->model = new Model_Programs();
            $this->view = new View();

            require_once 'model/model_balance.php';
			if($this->userId)
			{
				$this->modelBalance = new Model_Balance();
				$this->data['balance'] = $this->modelBalance->getBalance($this->userId);
			}

			//считать программы
            if(strcasecmp($this->userRole,"Клиент")==0)
			{
                $this->data['programs'] = $this->model->getUserPrograms($this->userId);
            }
            else if(strcasecmp($this->userRole,"Вебмастер")==0)
			{
                if(strcasecmp($_GET['mode'],'mine')==0){
                    $this->data['programs'] = $this->model->getAllSubscribedPrograms($this->userId);
                } else {
                    $this->data['programs'] = $this->model->getAllUnSubscribedPrograms($this->userId);
                }
            }
        }
	}

    
    
    function createPage(string $viewName)
	{  
        if(strcasecmp($this->userRole,"Вебмастер")==0 || strcasecmp($this->userRole,"Клиент")==0)
        {
            $this->view->generate($viewName, 'default.php', $this->authorised, $this->data, null, $this->userRole);
        }
    }
}
