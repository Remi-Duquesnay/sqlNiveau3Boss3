<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class GameController extends AbstractController
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('game/index.html.twig', [
            'current_page' => 'games'
        ]);
    }

}
