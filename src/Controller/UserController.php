<?php


namespace App\Controller;


use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function user_profile()
    {
        return $this->render('user/profile.html.twig', [
            'user'=>$this->getUser()
        ]);
    }
}