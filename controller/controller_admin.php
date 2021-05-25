<?php
class Controller_Admin extends Controller
{	    
    private $data = [];
        
    function __construct()
	{
        parent::__CONSTRUCT();
        {
            if(strcasecmp($this->userRole,"Администратор")==0)
            {
                require_once 'model/model_admin.php';
                $this->model = new Model_Admin();
                $this->view = new View();
                //считываем пользователей
                $this->data['users'] = $this->model->getAllUsers();
                //считываем программы
                $this->data['programs'] = $this->model->getAllPrograms();
                //получаем общий доход
                $this->data['taxes'] = $this->model->getAllTaxes();
                $this->data['transactions'] = $this->model->countTransactions();
                $this->data['urls'] = $this->model->countURLS();
                $this->data['frauds'] = $this->model->countFraud();                                 
            }
        }
	}
    
    function createPage(string $viewName)
	{     
        if(strcasecmp($this->userRole,"Администратор")==0)
        {
            $this->view->generate($viewName, 'default.php', $this->authorised, $this->data, null, $this->userRole);
        }
    }
}


