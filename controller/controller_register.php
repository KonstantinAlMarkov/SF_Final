<?php
class Controller_Register extends Controller
{	    
    private $data = [];
        
    function __construct()
	{
        parent::__CONSTRUCT();
        {
            if(strcasecmp($this->userRole,"Администратор")==0)
            {
                require_once 'model/model_register.php';
                // require_once 'model/model_registration.php';
                // $this->model = new Model_Registration();
                 $this->model = new Model_Register();
                 $this->view = new View();
            }
        }
	}
    
    function createPage(string $viewName)
	{     
        if(strcasecmp($this->userRole,"Администратор")==0)
        {
            $this->view->generate($viewName, 'default.php', $this->authorised, null, null, $this->userRole);
        }
    }

    function submitted(){
        $err = [];
        // проверяем логин
        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['user_login']))
        {
            $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        } 
        if(strlen($_POST['user_login']) < 3 || strlen($_POST['user_login']) > 30)
        {
            $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
        }
        if (!count($err)>0)
        {     
            $userChecked = $this->model->checkUserExistance($_POST['user_login']);

            if ($userChecked)
            {
                $createUser = $this->model->createUser($_POST['user_name'], $_POST['user_surname'], $_POST['user_login'], $_POST['user_password'], $_POST['user_status'], $_POST['user_role']);
                if ($createUser)
                {
                    unset($_POST);
                    header("Location: /index.php?page=2");
                }
                else
                {
                    unset($_POST);
                    print "Регистрация пошла не так<br>";                    
                } 
                
            }
            else
            {
                unset($_POST);
                print "<b>Пользователь с таким логином уже существует</b><br>";  
            }
        }      
        else
        {
            unset($_POST);
            var_dump($err);     
        } 
    }
}


