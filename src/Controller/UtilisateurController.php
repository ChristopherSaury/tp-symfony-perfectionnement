<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UtilisateurController extends AbstractController
{
    #[Route('/utilisateur', name: 'user')]
    public function retriveAllUsers(UtilisateurRepository $respository): Response
    {
        $utilisateurs = $respository->findAll();
        return $this->render('utilisateur/liste.html.twig', [
            'controller_name' => 'UtilisateurController',
            'utilisateurs' => $utilisateurs,
        ]);
    }
    #[Route('/utilisateur/{id}/update', name: 'update_user')]
    public function updateUser(Utilisateur $utilisateur, Request $request, EntityManagerInterface $em){
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($utilisateur);
            $em->flush();

            return $this->redirectToRoute('user');
        }else {
            return $this->render('utilisateur/utilisateur_update.html.twig', [
                'type' => 'Modifier',
                'formView' => $form->createView()
            ]);
        }
    }

    #[Route('/utilisateur/{id}/delete', name: 'delete_user')]
    public function deleteUser(Utilisateur $utilisateur, EntityManagerInterface $em){
        $em->remove($utilisateur);
        $em->flush();

        return $this->redirectToRoute('user');
    }

}
