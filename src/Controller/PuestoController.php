<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Puesto;
use App\Form\PuestoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class PuestoController extends AbstractController{

    #[Route('/puesto/nuevo', name: 'puesto_nuevo')]
    public function nuevo(Request $request, EntityManagerInterface $em): Response
    {
        $puesto = new Puesto();
        $form = $this->createForm(PuestoType::class, $puesto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($puesto);
            $em->flush();

            return $this->redirectToRoute('puesto_exito');
        }

        return $this->render('puesto/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/puesto/exito', name: 'puesto_exito')]
    public function exito(): Response
    {
        return new Response('<h2>Puesto guardado correctamente</h2>');
    }
}