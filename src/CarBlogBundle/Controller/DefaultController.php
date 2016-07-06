<?php

namespace CarBlogBundle\Controller;

use CarBlogBundle\Entity\Posts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


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
			$date = $value->getDate()->format('Y-m-d H:i:s')."  ";
			$post = $value->getNews();
			
		}
		return $this->render('CarBlog/homepage.html.twig', array('date'=>$date, 'post'=>$post));
	}
	
}
