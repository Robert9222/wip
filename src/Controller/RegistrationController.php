<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('api/register', name: 'api_register', methods: ['POST'])]
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {
        $jsonData = json_decode($request->getContent(), true);

        $user = new Users();
        $form = $this->createForm(RegistrationFormType::class, $user);

        $form->submit($jsonData);

        $plainPassword = bin2hex(random_bytes(10));

        $user->setPassword($passwordHasher->hashPassword($user, $plainPassword));


        $entityManager->persist($user);
        $entityManager->flush();

        $email = (new Email())
            ->from('example@example.com')
            ->to($user->getEmail())
            ->subject('Witamy na pokładzie!')
            ->html("
                    <p>Witaj, {$user->getFirstName()}!</p>
                    <p>Dziękujemy za rejestrację. Oto Twoje dane do logowania:</p>
                    <ul>
                        <li>Email: {$user->getEmail()}</li>
                        <li>Hasło: {$plainPassword}</li>
                    </ul>
                    <p>Zalecamy zmianę hasła po pierwszym logowaniu.</p>
                ");

        $mailer->send($email);

        return new Response('User registered successfully', Response::HTTP_CREATED);

    }

    #[Route('/register', name: 'register_form', methods: ['GET'])]
    public function showRegisterForm(): Response
    {
        return $this->render('registration.html.twig', [
            'registrationForm' => $this->createForm(RegistrationFormType::class)->createView(),
        ]);
    }
}