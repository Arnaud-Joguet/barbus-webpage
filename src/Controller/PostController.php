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

        /* $moviesList = $movieRepository->findAll();
        $genresList = $genreRepository->findAll();
        // on fait le rendu du template et on lui envoi la liste des films
        return $this->render('front/movie/list.html.twig', [
            'moviesList' => $moviesList,
            'genresList' => $genresList,
        ]); */

        $postList = $postRepository->findAll();

        return $this->render('post/list.html.twig', [
            'postList' => $postList
        ]);

    }
}
