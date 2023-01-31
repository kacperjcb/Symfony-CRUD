<?php

namespace App\Controller;
use App\Entity\Crud;
use App\Entity\DaneKlienta;
use App\Form\DaneKlientaType;
use App\Repository\DaneKlientaRepository;
use App\Repository\CrudRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

#[Route('/dane/klienta')]
class DaneKlientaController extends AbstractController
{
    #[Route('/', name: 'app_dane_klienta_index', methods: ['GET'])]
    public function index(DaneKlientaRepository $daneKlientaRepository): Response
    {
        return $this->render('dane_klienta/index.html.twig', [
            'dane_klientas' => $daneKlientaRepository->findAll(),
        ]);
    }
    #[Route('/podziekowanie', name: 'app_dane_podziekowanie_index', methods: ['GET'])]
    public function podziekowanie()
    {
        return $this->render('dane_klienta/podziekowanie.html.twig', [

        ]);
    }
    #[Route('/new', name: 'app_dane_klienta_new', methods: ['GET', 'POST'])]
    public function new(ManagerRegistry $doctrine, Request $request, DaneKlientaRepository $daneKlientaRepository): Response
    {
        $daneKlientum = new DaneKlienta();
        $form = $this->createForm(DaneKlientaType::class, $daneKlientum);
        $form->handleRequest($request);
        $entityManager = $doctrine->getManager();
        $id=($_GET["id"]);
        $crud = $entityManager->getRepository(Crud::class)->find($id);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $daneKlientaRepository->add($daneKlientum, true);
            if ($crud->getStanMagazynowy()>= 1) {
                $crud->setStanMagazynowy($crud->getStanMagazynowy() - 1);
                $entityManager->flush();
            }
            return $this->redirectToRoute('app_dane_podziekowanie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dane_klienta/new.html.twig', [
            'dane_klientum' => $daneKlientum,
            'form' => $form,
            'id'=> $id,
        ]);
    }

    #[Route('/{id}', name: 'app_dane_klienta_show', methods: ['GET'])]
    public function show(DaneKlienta $daneKlientum): Response
    {
        return $this->render('dane_klienta/show.html.twig', [
            'dane_klientum' => $daneKlientum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_dane_klienta_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DaneKlienta $daneKlientum, DaneKlientaRepository $daneKlientaRepository): Response
    {
        $form = $this->createForm(DaneKlientaType::class, $daneKlientum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $daneKlientaRepository->add($daneKlientum, true);

            return $this->redirectToRoute('app_dane_klienta_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dane_klienta/edit.html.twig', [
            'dane_klientum' => $daneKlientum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dane_klienta_delete', methods: ['POST'])]
    public function delete(Request $request, DaneKlienta $daneKlientum, DaneKlientaRepository $daneKlientaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$daneKlientum->getId(), $request->request->get('_token'))) {
            $daneKlientaRepository->remove($daneKlientum, true);
        }

        return $this->redirectToRoute('app_dane_klienta_index', [], Response::HTTP_SEE_OTHER);
    }
}
