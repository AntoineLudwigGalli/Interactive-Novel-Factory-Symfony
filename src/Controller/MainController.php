<?php

namespace App\Controller;

use App\Entity\NewCharacterClass;
use App\Form\NewCharacterClassType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(): Response
    {


        return $this->render('main/index.html.twig');
    }

    #[Route('/creer-une-nouvelle-classe', name: 'main/new-class')]
    public function newClass(Request $request, ManagerRegistry $doctrine): Response
    {
        $newCharacterClass = new NewCharacterClass();

        $form = $this->createForm(NewCharacterClassType::class, $newCharacterClass);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em = $doctrine->getManager();

            $em->persist($newCharacterClass);

            $em->flush();

            $this->addFlash('success', 'Classe créée avec succès!');

            return $this->redirectToRoute('main/new-character');

        }

        return $this->render('main/newClass.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/creer-un-nouveau-personnage', name: 'main/new-character')]
    public function newCharacter(): Response
    {


        return $this->render('main/newCharacter.html.twig');
    }

}
