<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class test  extends AbstractController
{
    /**      * @Route("/")
      */
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('test/index.html.twig');
    }
}
