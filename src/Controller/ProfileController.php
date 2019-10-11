<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("", name="profile.")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("", methods={"GET"}, name="profile")
     */
    public function index()
    {
        return $this->render('profile/profile.html.twig');
    }

    /**
     * @Route("/result", methods={"GET"}, name="result")
     */
    public function result()
    {
        return $this->render('profile/result.html.twig');
    }
}
