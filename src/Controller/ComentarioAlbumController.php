<?php

namespace App\Controller;

use App\Entity\ComentarioAlbum;
use App\Form\ComentarioAlbumType;
use App\Repository\ComentarioAlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comentario/album")
 */
class ComentarioAlbumController extends AbstractController
{
    /**
     * @Route("/", name="comentario_album_index", methods={"GET"})
     */
    public function index(ComentarioAlbumRepository $comentarioAlbumRepository): Response
    {
        return $this->render('comentario_album/index.html.twig', [
            'comentario_albums' => $comentarioAlbumRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="comentario_album_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $comentarioAlbum = new ComentarioAlbum();
        $form = $this->createForm(ComentarioAlbumType::class, $comentarioAlbum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comentarioAlbum);
            $entityManager->flush();

            return $this->redirectToRoute('comentario_album_index');
        }

        return $this->render('comentario_album/new.html.twig', [
            'comentario_album' => $comentarioAlbum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comentario_album_show", methods={"GET"})
     */
    public function show(ComentarioAlbum $comentarioAlbum): Response
    {
        return $this->render('comentario_album/show.html.twig', [
            'comentario_album' => $comentarioAlbum,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="comentario_album_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ComentarioAlbum $comentarioAlbum): Response
    {
        $form = $this->createForm(ComentarioAlbumType::class, $comentarioAlbum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comentario_album_index');
        }

        return $this->render('comentario_album/edit.html.twig', [
            'comentario_album' => $comentarioAlbum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comentario_album_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ComentarioAlbum $comentarioAlbum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comentarioAlbum->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comentarioAlbum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('comentario_album_index');
    }
}
