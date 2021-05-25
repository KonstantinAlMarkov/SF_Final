<?php
class Controller_Subscribe extends Controller
{	    
    function __construct()
	{
		parent::__CONSTRUCT();
        {
            if(strcasecmp($this->userRole,"Вебмастер")==0)
            {
                require_once 'model/model_subscription.php';
                $this->model = new Model_Subscription();
                $this->subscribe();
            }
        }
	}   
	
	function subscribe(){
		$checkedSubscr = $this->model->checkSubscription($this->userId, $_GET['program_id']);
        $programURL = $this->model->getProgramURL($_GET['program_id']);

		if(!$checkedSubscr && $programURL)
		{			
            $this->model->subscribe($this->userId, $_GET['program_id'], $this->generateWebmasterUrl($this->userId, $_GET['program_id'], $programURL));
		}
        header("Location: /index.php?page=5");
    }

    function generateWebmasterUrl($UserId, $ProgramID, $URL){
        return "/index.php?page=9&webm=".$UserId."&prg=".$ProgramID."&url=".$URL;    }
}