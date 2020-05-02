<?php

namespace App\Controller;

use App\Entity\ImagenXAlbum;
use App\Form\ImagenXAlbumType;
use App\Repository\ImagenXAlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/imagen/x/album")
 */
class ImagenXAlbumController extends AbstractController
{
    /**
     * @Route("/", name="imagen_x_album_index", methods={"GET"})
     */
    public function index(ImagenXAlbumRepository $imagenXAlbumRepository): Response
    {
        return $this->render('imagen_x_album/index.html.twig', [
            'imagen_x_albums' => $imagenXAlbumRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="imagen_x_album_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $imagenXAlbum = new ImagenXAlbum();
        $form = $this->createForm(ImagenXAlbumType::class, $imagenXAlbum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($imagenXAlbum);
            $entityManager->flush();

            return $this->redirectToRoute('imagen_x_album_index');
        }

        return $this->render('imagen_x_album/new.html.twig', [
            'imagen_x_album' => $imagenXAlbum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="imagen_x_album_show", methods={"GET"})
     */
    public function show(ImagenXAlbum $imagenXAlbum): Response
    {
        return $this->render('imagen_x_album/show.html.twig', [
            'imagen_x_album' => $imagenXAlbum,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="imagen_x_album_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ImagenXAlbum $imagenXAlbum): Response
    {
        $form = $this->createForm(ImagenXAlbumType::class, $imagenXAlbum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('imagen_x_album_index');
        }

        return $this->render('imagen_x_album/edit.html.twig', [
            'imagen_x_album' => $imagenXAlbum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="imagen_x_album_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ImagenXAlbum $imagenXAlbum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$imagenXAlbum->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($imagenXAlbum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('imagen_x_album_index');
    }
}
