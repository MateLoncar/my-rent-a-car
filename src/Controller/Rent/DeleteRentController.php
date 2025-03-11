<?php

namespace App\Controller\Rent;

use App\Entity\Rent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DeleteRentController extends AbstractController
{
    #[Route('/rent/{id}/delete', name: 'app_rent_delete', methods: ['POST'])]
    public function delete(Request $request, Rent $rent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rent->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($rent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_rent_index', [], Response::HTTP_SEE_OTHER);
    }
}
