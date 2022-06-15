<?php

namespace App\Controller;

use App\Repository\TodoListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{   
    #[Route('/home', name: 'app_home')]
    
    public function seeAll(TodoListRepository $todoListView): Response
    {
        $lists = $todoListView->findAll();
      
        return $this->render('home/home.html.twig', ['lists'=>$lists]); 
    }   
    
}

