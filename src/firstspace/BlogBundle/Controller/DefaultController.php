<?php

namespace firstspace\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	 /**
     * @Route("/admin", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('firstBundle:Default:index.html.twig');
    }
	
	public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }
}
