<?php

namespace App\Controller;

use App\Entity\Player;
use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\Mapping\PostPersist;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PostRepository $postRepository, ManagerRegistry $doctrine): Response
    {
        $postlist = $postRepository->findAll();
        $lastPost = end($postlist);

        // Je récupère aléatoirement l'id d'un joueur entre 1 et id MAX
        $id=1;
        // Je récupère les données du joueur correspondant
        $playerToShow = $doctrine->getRepository(Player::class)->find($id);
        //dump($playerToShow);

        // J'envoie mes données à l'affichage
        return $this->render('main/index.html.twig', [
            'lastPost' => $lastPost,
            'playerToShow' => $playerToShow,
        ]);
    }

}