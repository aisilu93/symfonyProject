<?php

namespace firstspace\BlogBundle\Controller;

//use firstspace\BlogBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{	
	 /**
     * @Route("/user/{id}")
     */
	public function pageAction($id)
    {
		$user = $this -> getDoctrine()
			->getRepository('BlogBundle:User')
			->find($id);
			return new Response('<html><body>Admin page!</body></html>');
    }
}
