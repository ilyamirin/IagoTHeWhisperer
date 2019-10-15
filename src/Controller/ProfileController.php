<?php

namespace App\Controller;

use App\Form\ProfileForm;
use App\Objects\Profile;
use App\Service\ProfileService;
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
     * @param ProfileService $profileService
     * @return Response
     */
    public function index(Request $request, ProfileService $profileService)
    {
        $profile = new Profile();
        $form = $this->createForm(ProfileForm::class, $profile);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Profile $profile */
            $profile = $form->getData();
            [$banks, $tariffs] = $profileService->getResult($profile);

            return $this->render('profile/result.html.twig', [
                'banks' => $banks,
                'tariffs' => $tariffs,
            ]);
        }

        return $this->render('profile/profile.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
