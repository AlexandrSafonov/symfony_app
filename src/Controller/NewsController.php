<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\News;

class NewsController extends Controller 
{
    public function list() 
    {
        $news = $this
            ->getDoctrine()
            ->getRepository(News::class)
            ->findAll();
        
        return $this->render('news/list.html.twig', [
            'news' => $news,
        ]);
    }
    
    public function single($id) 
    {
        $news = $this
            ->getDoctrine()
            ->getRepository(News::class)
            ->find($id);
        
        return $this->render('news/single.html.twig', [
            'news' => $news,
            'id' => $id
        ]);
    }
}
