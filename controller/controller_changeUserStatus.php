<?php
class Controller_changeUserStatus extends Controller
{	    
    function __construct()
	{
        require_once 'model/model_register.php';
        $this->model = new Model_Register();
        if($_GET['user_id'])
        {
            if($_GET['status']==0){
                $this->changeUsrStatus(false,$_GET['user_id']);
            } else if($_GET['status']!=0){
                $this->changeUsrStatus(true,$_GET['user_id']);
            }
        }
	}    
    
	function changeUsrStatus($Status, $User_id)
	{
        if($Status){
            $this->model->activateUser($User_id);      
        } else
        {
            $this->model->deactivateUser($User_id);
        }
        header("Location: /index.php?page=2");
	}
}


