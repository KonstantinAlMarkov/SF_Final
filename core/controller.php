<?php
class Controller {
	public $model;
	public $view;
	public bool $authorised = false;
	public $userRole = null;
	public $userId = null;
	
	function __construct()
	{
		$this->model = new Model();
		$this->authorised = $this->checkAuth();
		$this->view = new View();
	}

	function checkAuth()
	{
		$checkResult = $this->model->checkUser();
		
		$this->userRole = $checkResult['role_name'];
		$this->userId = $checkResult['user_id'];

		if(is_null($this->userRole)||is_null($this->userId))
		{
			//print "<b>Куки пока что нет</b><br>";
			return false;
		}
		else {
			//print "<b>Кука есть</b><br>";
			return true;
		}
	}
}

