<?php

namespace App\Controller;

use App\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{
    #[Route('/player/list', name: 'player_list')]
    public function list(PlayerRepository $playerRepository ): Response
    {
        $playerList = $playerRepository->findAll();

        return $this->render('player/list.html.twig', [
            'playerList' => $playerList,
        ]);
    }
}
