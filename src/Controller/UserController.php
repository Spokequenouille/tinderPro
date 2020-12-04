<?php


namespace App\Controller;


use App\Form\ProfileFormType;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @package App\Controller
 * @Route("/user")
 * @IsGranted("IS_AUTHENTICATED_FULLY")
 */
class UserController extends AbstractController
{
    /**
     * @Route("", name="user_home")
     * @param UserRepository $userRepository
     * @return Response
     */
    public function user_home(UserRepository $userRepository)
    {
        return $this->render('user/index.html.twig', [
            'list' => $userRepository->findBy(['pole' => $this->getUser()->getPole()])
        ]);
    }

    /**
     * @Route("/profile", name="user_profile")
     * @return Response
     */
    public function user_profile(Request $request): Response
    {
        $form = $this->createForm(ProfileFormType::class, $this->getUser());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($this->getUser());
            $entityManager->flush();
        }

        return $this->render('user/profile.html.twig', [
            'user'=>$this->getUser(),
            'form_user' => $form->createView()
        ]);
    }
}