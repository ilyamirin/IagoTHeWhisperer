<?php

namespace App\Controller;

use App\Form\ProfileForm;
use App\Objects\Profile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("", name="profile.")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("", methods={"GET", "POST"}, name="profile")
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $profile = new Profile();
        $form = $this->createForm(ProfileForm::class, $profile);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('profile/result.html.twig');
        }

        return $this->render('profile/profile.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
