<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\News;
use App\Entity\Testimonials;

class HomeController extends Controller
{
    public function index() 
    {   
        return $this->render('pages/home.html.twig', [
            'news' => $this->getAllNews() ,
            'testimonials' => $this->getAllTestimonials()
        ]);
    }
    
    private function getAllNews()
    {
        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->findAll();
        
        return $news;
    }
    
    private function getAllTestimonials()
    {
        $testimonials = $this->getDoctrine()
            ->getRepository(Testimonials::class)
            ->findAll();
        
        return $testimonials;
    }
}
