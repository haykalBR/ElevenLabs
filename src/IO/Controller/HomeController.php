<?php

declare(strict_types=1);

namespace IO\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'home', methods: ['GET'])]
    public function get(): Response
    {
        return $this->render('home/index.html.twig');
    }
    #[Route(path: '/comments', name: 'web_comments', methods: ['GET'])]
    public function comments(): Response
    {
        return $this->render('home/comments.html.twig');
    }
}
