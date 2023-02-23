<?php

namespace App\Controller;

use App\Repository\WishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/wish', name : 'wish_')]
class WishController extends AbstractController
{
    #[Route('/list', name: 'list')]
    public function list(WishRepository $wishRepository): Response
    {

        $wishes = $wishRepository->findWishByName();
        dump($wishes);

        return $this->render('/wish/list.html.twig', [
                'wishes' => $wishes
        ]);
    }

    #[Route('/{id}', name: 'show', requirements: ['id' => '\d+'])]
    public function show(int $id, WishRepository $wishRepository): Response
    {
        $wishes = $wishRepository->find($id);

        return $this->render('/wish/show.html.twig', [
            'wishes'=>$wishes

        ]);
    }
}
