<?php

namespace App\Controller\Rent;

use App\Repository\RentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RentController extends AbstractController
{
    #[Route('/rent', name: 'app_rent_index', methods: ['GET'])]
    public function index(RentRepository $rentRepository): Response
    {
        return $this->render('rent/index.html.twig', [
            'rents' => $rentRepository->findAll(),
        ]);
    }
}
