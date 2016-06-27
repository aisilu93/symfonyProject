<?php

namespace CarBlogBundle\Controller;

use CarBlogBundle\Entity\Posts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return new Response('Привет! Это блог про машинку :)');
    }
	/**
	 * @Route("/news")
	*/
	public function newsView()
	{
		$base = $this->getDoctrine()->getRepository('CarBlogBundle:Posts');
		$news = $base->findAll();
		foreach (array_reverse($news) as $key=>$value){
			print_r($value->getDate()->format('Y-m-d H:i:s')."  ");
			print_r($value->getNews()."<br>");
			
		}
		return new Response();
	}
	
}
