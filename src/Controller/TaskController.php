<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use App\Repository\TodoListRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TaskController extends AbstractController
{
    #[route('/task/{id}', name: 'app_task')]
    public function index(Request $request, TaskRepository $TaskView, $id, TodoListRepository $todoListRepository): Response  
        {
        $newTask = new Task;
        $list = $todoListRepository->findOneBy([ 'id' => $id]);
        //$form = $this->createForm(ListType::class, $newTask);

        //$form->handleRequest($request);

        // if($form->isSubmitted() && $form->isValid()){
        //     $TaskView->add($newTask);
        //     $this->addFlash('success', "La tache a bien été ajoutée");
        //     return $this->redirectToRoute('app_home');
        // };
        return $this->render('task/index.html.twig', [
            'list' => $list
        ]);
    }
}
   
