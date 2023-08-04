<?php

namespace App\Controller;

use App\Entity\Taches;
use App\Form\TachesType;
use App\Repository\TachesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/taches')]
class TachesController extends AbstractController
{
    #[Route('/', name: 'app_taches_index', methods: ['GET'])]
    public function index(TachesRepository $tachesRepository): Response
    {
        return $this->render('taches/index.html.twig', [
            'taches' => $tachesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_taches_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tach = new Taches();
        $form = $this->createForm(TachesType::class, $tach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tach);
            $entityManager->flush();

            return $this->redirectToRoute('app_taches_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('taches/new.html.twig', [
            'tach' => $tach,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_taches_show', methods: ['GET'])]
    public function show(Taches $tach): Response
    {
        return $this->render('taches/show.html.twig', [
            'tach' => $tach,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_taches_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Taches $tach, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TachesType::class, $tach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_taches_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('taches/edit.html.twig', [
            'tach' => $tach,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_taches_delete', methods: ['POST'])]
    public function delete(Request $request, Taches $tach, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tach->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tach);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_taches_index', [], Response::HTTP_SEE_OTHER);
    }
}
