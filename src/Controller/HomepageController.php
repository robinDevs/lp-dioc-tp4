<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    /**
     * @Route(
     *     path="/",
     *     name="homepage"
     * )
     */
    public function homepageAction()
    {
        // FIXME: Récupérer les utilisateurs non admin
        $em=$this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class)->findBy(array('isAdmin' => false));

        return $this->render('Homepage/homepage.html.twig', ['users' => $users]);
    }
}
