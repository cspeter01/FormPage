<?php

namespace App\Controller;

use App\Entity\FormEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FormController extends AbstractController
{

    /**
     * @Route("/", name="home")
     * Method({"GET","POST"})
     */

    public function index(Request $request)
    {
        $task = new FormEntity();
        $form = $this->createFormBuilder($task)
            ->add('name', TextType::class, array('attr' => array('class' => 'form-control', 'placeholder' => 'Kovács Péter')))
            ->add('email', EmailType::class, array('attr' => array('class' => 'form-control', 'placeholder' => 'email@email.com')))
            ->add('message', TextareaType::class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('attr' => array('class' => 'btn btn-primary'), 'label' => 'Küldés'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
            return new Response('Köszönjük szépen a kérdésedet. Válaszunkkal hamarosan keresünk a megadott e-mail címen.');
        }

        return $this->render('index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
