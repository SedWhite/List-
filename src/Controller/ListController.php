<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\ListType;
use App\Entity\TodoList;
use App\Repository\TaskRepository;
use App\Repository\TodoListRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListController extends AbstractController
{
    #[Route('/list', name: 'app_list')]
    public function makeList(Request $request, TodoListRepository $todoListview): Response
    {       
        $newList = new TodoList;
            //  dd($newList);
        //$this=abstract controller 
        $form = $this->createForm(ListType::class, $newList);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // dd($newList);
            $todoListview->add($newList);
            $this->addFlash('success', "La Liste a bien été ajoutée");
            return $this->redirectToRoute('app_home');
        }

        return $this->render('create_list/index.html.twig', ['form' => $form->createView(),]);
    }



    

}