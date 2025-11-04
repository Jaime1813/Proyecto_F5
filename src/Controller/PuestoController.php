<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Puesto;
use App\Form\PuestoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class PuestoController extends AbstractController{
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

    public function exito(): Response
    {
        return new Response('<h2>Puesto guardado correctamente</h2>');
    }
}