<?php

namespace App\Controller;

use App\Repository\VideogameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class GameController extends AbstractController
{

    /**
     * @var VideogameRepository
     */
    private $videogameRepository;

    public function __construct(VideogameRepository $videogameRepository)
    {
        $this->videogameRepository = $videogameRepository;
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        $videogame = $this->videogameRepository->findAll();
        return $this->render('game/index.html.twig', [
            'current_page' => 'games',
            'videogame' => $videogame
        ]);
    }

}
