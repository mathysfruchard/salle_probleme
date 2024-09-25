<?php

namespace App\Controller;

use App\Entity\Materiels;
use App\Form\MaterielsType;
use App\Repository\MaterielsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/materiels')]
final class MaterielsController extends AbstractController
{
    #[Route(name: 'app_materiels_index', methods: ['GET'])]
    public function index(MaterielsRepository $materielsRepository): Response
    {
        return $this->render('materiels/index.html.twig', [
            'materiels' => $materielsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_materiels_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $materiel = new Materiels();
        $form = $this->createForm(MaterielsType::class, $materiel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($materiel);
            $entityManager->flush();

            return $this->redirectToRoute('app_materiels_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('materiels/new.html.twig', [
            'materiel' => $materiel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_materiels_show', methods: ['GET'])]
    public function show(Materiels $materiel): Response
    {
        return $this->render('materiels/show.html.twig', [
            'materiel' => $materiel,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_materiels_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Materiels $materiel, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MaterielsType::class, $materiel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_materiels_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('materiels/edit.html.twig', [
            'materiel' => $materiel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_materiels_delete', methods: ['POST'])]
    public function delete(Request $request, Materiels $materiel, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$materiel->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($materiel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_materiels_index', [], Response::HTTP_SEE_OTHER);
    }
}
