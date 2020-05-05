<?php

namespace App\Controller;

use App\Entity\ComentarioImagen;
use App\Form\ComentarioImagenType;
use App\Repository\ComentarioImagenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comentario/imagen")
 */
class ComentarioImagenController extends AbstractController
{
    /**
     * @Route("/", name="comentario_imagen_index", methods={"GET"})
     */
    public function index(ComentarioImagenRepository $comentarioImagenRepository): Response
    {
        return $this->render('comentario_imagen/index.html.twig', [
            'comentario_imagens' => $comentarioImagenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="comentario_imagen_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $comentarioImagen = new ComentarioImagen();
        $form = $this->createForm(ComentarioImagenType::class, $comentarioImagen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comentarioImagen);
            $entityManager->flush();

            return $this->redirectToRoute('comentario_imagen_index');
        }

        return $this->render('comentario_imagen/new.html.twig', [
            'comentario_imagen' => $comentarioImagen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comentario_imagen_show", methods={"GET"})
     */
    public function show(ComentarioImagen $comentarioImagen): Response
    {
        return $this->render('comentario_imagen/show.html.twig', [
            'comentario_imagen' => $comentarioImagen,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="comentario_imagen_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ComentarioImagen $comentarioImagen): Response
    {
        $form = $this->createForm(ComentarioImagenType::class, $comentarioImagen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comentario_imagen_index');
        }

        return $this->render('comentario_imagen/edit.html.twig', [
            'comentario_imagen' => $comentarioImagen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comentario_imagen_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ComentarioImagen $comentarioImagen): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comentarioImagen->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comentarioImagen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('comentario_imagen_index');
    }
}
