<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route(
     *     path="/login",
     *     name="login"
     * )
     */
    public function loginAction(AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('Security/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    /**
     * @Route(
     *     path="/register",
     *     name="register"
     * )
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // FIXME: Instancier le formulaire et à la soumission enregistrer le user.
        // La vue à rendre : Security/register.html.twig
        // create a task and give it some dummy data for this example
        $user = new User();
                    $form=  $this->createFormBuilder($user)
                    ->add('firstname')
                    ->add('lastname')
                    ->add("email")
                    ->add('birthday')
                    ->add('password')
                    ->add('createdat')
                    ->add('sumbitUser',array('label'=>'S\'enregistrer'))
                    ->getForm();
        $form = $this->createForm(PersonType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $personne->setCreatedAt(new \Datetime('now'));
            $em->persist($personne);
            $em->flush();
        }

        return $this->render("Personne/new.html.twig",array('form'=>$form->createView()));
    }

        return $this->render('Security/register.html.twig',);
    }
}
