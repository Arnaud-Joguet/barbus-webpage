<?php

namespace App\Controller;

use App\Entity\Post;
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


    #[Route('/post/{id}',name: 'post_show', requirements: ['id' => '\d+'])]
    public function show(Post $post = null ): Response
    {
        if(is_null($post)) {
            throw $this->createNotFoundException('The post does not exist');
        }

        return $this->render('post/show.html.twig', [
            'post' => $post
        ]);

    }
}
