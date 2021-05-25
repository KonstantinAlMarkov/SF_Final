<?php
class Main{
    static function showPage()
    {       
        $pageNumber = '1';
        $pages = include 'config/pages.php';
        if (!empty($_GET['page'])) {     
            $pageNumber = (int) $_GET['page'];     
        }       
        $page_name = $pages[$pageNumber];
        if(!strlen($page_name)>0)
        {        
            Main::ErrorPage404();
        }
        else
        {  
            $controller_file = strtolower($page_name);
            $controller_name = "controller_".$page_name;
            $controller_path = "controller/controller_".$page_name.'.php';        

            if(file_exists($controller_path))
            {
                include $controller_path;                
                $controller = new $controller_name;

                //авторизация
                if(isset($_POST['login']) && $_POST['password'] ){
                    require_once 'controller/controller_login.php';
                    $loginMaster = new Controller_Login();
                    $loginMaster->submitted();
                }           
                
                //создаём нового пользователя
                if(isset($_POST['user_surname']) && isset($_POST['user_name']) && isset($_POST['user_login']) && isset($_POST['user_password']) && isset($_POST['user_role']) && isset($_POST['user_status']) && $pageNumber == 3)
                {
                    $controller->submitted();
                }

                //создаём новую программу
                if(isset($_POST['program_name']) && isset($_POST['program_price']) && isset($_POST['program_url']) && $pageNumber == 6)
                {
                    $controller->submitted();
                }

                if(file_exists('pages/'.$page_name.'.php'))
                {
                    $controller->createPage('pages/'.$page_name.'.php');
                }
            }
            else
            {
                Main::ErrorPage404();
            }          
        }       
    }  
    
	function ErrorPage404()
	{
        $page_name = "404";
        $controller_file = strtolower($page_name);
        $controller_name = "controller_".$page_name;
        $controller_path = "controller/controller_".$page_name.'.php';
        
        if(file_exists($controller_path))
        {
            include $controller_path;                 
            $controller = new $controller_name;
            $controller->createPage('pages/'.$page_name.'.php');
        }
    }    
}
