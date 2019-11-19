<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\News;
use App\Entity\Testimonials;
use App\Entity\User;
use App\Form\Type\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends Controller
{
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder) 
    {   
        $form = $this->getRegistrationForm();

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        }
        
        return $this->render('home/landing.html.twig', [
            'news' => $this->getAllNews() ,
            'testimonials' => $this->getAllTestimonials(),
            'registrationForm' => $form->createView()
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
    
    private function getRegistrationForm()
    {
        $user = new User();
        
        $form = $this->createForm(RegistrationType::class, $user);
        
        return $form;
    }
}
