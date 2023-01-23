<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\Mapping\PostPersist;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PostRepository $postRepository): Response
    {
        
        $postlist = $postRepository->findAll();
        $lastPost = end($postlist);

        //dump($lastPost);
        return $this->render('main/index.html.twig', [
            'lastPost' => $lastPost,
        ]);
    }
}
