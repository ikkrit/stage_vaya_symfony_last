<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact/add', name: 'contact_add')]
    #[Route('/contact/{id}/edit', name: 'contact_edit')]
    public function contact(?Contact $contact, Request $request, EntityManagerInterface $entityManager): Response
    {
        if(!$contact) {
            $contact = new Contact();
        }

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            if(!$contact->getId()){
                $entityManager->persist($contact);
            }
            $entityManager->flush();

            return $this->redirect($this->generateUrl('contact_edit', ['id' => $contact->getId()]));
        }
        
        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}


