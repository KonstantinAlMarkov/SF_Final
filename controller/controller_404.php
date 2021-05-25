<?php
class Controller_404 extends Controller
{	
	function createPage(string $viewName)
	{
        $this->view->generate($viewName, 'default.php', $this->authorised);
	}
}
