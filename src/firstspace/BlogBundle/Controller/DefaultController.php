<?php

namespace firstspace\BlogBundle\Controller;

use firstspace\BlogBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{	
	 /**
     * @Route("/user/{id}")
     */
	public function getRoleById($id)
    {
		//$query = array ('id' => $id, 'roles' => $_GET);
		$user = $this -> getDoctrine()
			->getRepository('firstBundle:User')
			->findOneById($id)->getRoles();
		$role = implode(', ',$user);
		return new Response ('<html><body>User`s role is '.$role.'</body></html>');
    }
	
	 /**
     * @Route("/user/")
     */
	public function getRoleOfCurrentUser()
	{
		$role = implode(', ', $this->getUser()->getRoles());
		return new Response ('<html><body>User`s role is '.$role.'</body></html>');
	}
}
