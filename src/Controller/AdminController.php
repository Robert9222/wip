<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class AdminController extends AbstractController
{

    #[Route('/api/admin', name: 'admin_index', methods: ['GET'])]
    public function index(UsersRepository $usersRepository): JsonResponse
    {
        $users = $usersRepository->findAll();
        return $this->json($users); // Zwracanie użytkowników jako JSON
    }

    #[Route('/api/admin/{id}/edit', name: 'admin_edit', methods: ['POST'])]
    public function edit(Request $request, Users $user, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $user->setFirstName($data['firstName'] ?? $user->getFirstName());
        $user->setLastName($data['lastName'] ?? $user->getLastName());

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json(['message' => 'Dane użytkownika zaktualizowane.']);
    }

    #[Route('/api/admin/{id}', name: 'admin_delete', methods: ['DELETE'])]
    public function delete(Users $user, EntityManagerInterface $entityManager): JsonResponse
    {
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->json(['message' => 'Użytkownik usunięty.']);
    }

    #[Route('/admin', name: 'admin', methods: ['GET'])]
    public function showAdminPanel(): Response
    {
        return $this->render('admin/index.html.twig');
    }
}