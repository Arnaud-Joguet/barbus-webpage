<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post/list', name: 'post_list')]
    public function list(PostRepository $postRepository): Response
    {


        $postList = $postRepository->findAll();

        return $this->render('post/list.html.twig', [
            'postList' => $postList
        ]);

    }
}
