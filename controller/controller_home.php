<?php
class Controller_Home extends Controller
{	
	private $data = [];

	
    function __construct()
	{
        parent::__CONSTRUCT();
        {
			require_once 'model/model_transactioncore.php';
			$this->model = new Model_TransactionCore();
            $this->view = new View();
            $this->data['Urls'] = $this->model->getAllUrls();

			require_once 'model/model_balance.php';
			if($this->userId)
			{
				$this->modelBalance = new Model_Balance();
				$this->data['balance'] = $this->modelBalance->getBalance($this->userId);
			}
        }
	}
	
	function createPage(string $viewName)
	{
		$this->view->generate($viewName, 'default.php', $this->authorised, $this->data, null, $this->userRole);
	}
}
