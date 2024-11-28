<?php

namespace App\Controller;

use App\Entity\Group;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/group')]
class GroupController extends AbstractController
{
    #[Route('/')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/GroupController.php',
        ]);
    }

    #[Route('/{id}')]
    public function findById(EntityManagerInterface $entityManager, int $id): JsonResponse
    {
        $group = $entityManager->getRepository(Group::class)->find($id);

        if (!$group) {
            throw $this->createNotFoundException(
                'No group found for id ' . $id
            );
        }

        return $this->json([
            'group' => $group
        ]);
    }
}
