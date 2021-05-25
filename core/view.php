<?php
class View
{
	function generate($content_view, $template_view, $authorised=null, $data=null, $image=null, $userRole=null)
	{
		include 'pages/'.$template_view;
	}
}
