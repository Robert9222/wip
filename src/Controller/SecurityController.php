<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'login', methods: ['POST'])]
    public function apiLogin(Request $request, UserPasswordHasherInterface $passwordHasher, UsersRepository $userRepository, SerializerInterface $serializer): Response
    {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'] ?? null;

        $existingUser = $userRepository->findOneBy(['email' => $email]);

        if (!$existingUser) {
            return $this->json(['error' => 'Nieprawidłowe dane logowania.'], Response::HTTP_UNAUTHORIZED);
        }

        return $this->json(['message' => 'Pomyślnie zalogowano.']);
    }

    #[Route('/login', name: 'login_form', methods: ['GET'])]
    public function showLoginForm(): Response
    {
        return $this->render('login.html.twig');
    }
}