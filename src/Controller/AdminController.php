<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function index(Request $request) 
    {   
        
        return $this->render('admin/admin.html.twig', []);
    }
}
