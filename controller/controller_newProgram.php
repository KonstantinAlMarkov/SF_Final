<?php
class Controller_newProgram extends Controller
{	    
    private $data = [];
        
    function __construct()
	{ 
        parent::__CONSTRUCT();
        {
            if(strcasecmp($this->userRole,"Клиент")==0)
            {
                require_once 'model/model_newprogram.php';
                $this->model = new Model_Newprogram();
                $this->view = new View();
            }
        }
	}
    
    function createPage(string $viewName)
	{           
        if(strcasecmp($this->userRole,"Клиент")==0)
        {
            $this->view->generate($viewName, 'default.php', $this->authorised, null, null, $this->userRole);
        }
    }

    function submitted(){
        $err = [];
        // проверяем поля
        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['program_price']))
        {
            $err[] = "Стоимость перехода может состоять только из цифр";
        } 
        if(strlen($_POST['program_name']) < 3 || strlen($_POST['program_name']) > 60)
        {
            $err[] = "Название программы должна быть не меньше 3-х символов и не больше 60";
        }
        //создаём, если нет ошибок
        if (!count($err)>0)
        {
            if(strcasecmp($this->userRole,"Клиент")==0 && !is_null($this->userId))
            {                    
                $createProgram = $this->model->createProgram($this->userId, $_POST['program_name'], $_POST['program_description'], $_POST['program_url'], $_POST['program_price'], $_FILES['program_image']['name']);
                if ($createProgram)
                {
                    unset($_POST);                
                    header("Location: /index.php?page=5");
                }
                else
                {
                    unset($_POST);
                    print "Регистрация пошла не так<br>";                    
                } 
            }
            else {
                unset($_POST);
                print "Проблема с пользователем<br>";                       
            }          
        }      
        else
        {
            unset($_POST);
            var_dump($err);  
        } 
    }
}


