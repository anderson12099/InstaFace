<?php

namespace App\Controller;

use App\Entity\Persona;
use App\Entity\User;
use App\DTO\Conexion;
use App\Form\UserType;
use App\Repository\UserRepository;
use Conexion as GlobalConexion;
use mysqli;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }


    // public function crearFormulario(Request $request): Response
    // {
    //     $user = new User();
    //     $form = $this->createForm(UserType::class, $user);
    //     $message = "Error en la creación del formulario";

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()){
    //         return $this->render('user/new.html.twig', [
    //             'form' => $form->createView(),
    //         ]);
    //     }

    //     return $this->render('user/new.html.twig', [
    //         //'form' => $form->createView(),
    //         'message' => $message
    //     ]);
    // }

    public function createPerson(Request $request)
    {

        $user = new User();
        $persona = new Persona();
        $DBconnection = new Conexion();
        //$DBconnection->connect();
        $message = "Lo sentimos, hubo un error al crear la persona";

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nombrePersona = $user->getNombre();
            $apellidoPersona = $user->getApellido();
            $emailPersona = $user->getEmail();

            $persona->setNombre($nombrePersona);
            $persona->setApellido($apellidoPersona);
            $persona->setEmail($emailPersona);


            $consulta = "INSERT INTO persona VALUES(null, '$nombrePersona', '$apellidoPersona', '$emailPersona')";
            $result = $DBconnection->prepare($DBconnection->connect(), $consulta);
            //$result->execute();
            $lastId = $DBconnection->getLastId($DBconnection->connect());

            return $lastId;
        }

        return $message;
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = new User();
        //$persona = new Persona();
        $DBconection = new Conexion();
        $DBconection->connect();
        $this->createPerson($request);

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // $nombrePersona = $user->getNombre();
            // $apellidoPersona = $user->getApellido();
            // $emailPersona = $user->getEmail();

            // $persona->setNombre($nombrePersona);
            // $persona->setApellido($apellidoPersona);
            // $persona->setEmail($emailPersona);

            // $sql = "INSERT INTO persona VALUES(null, '$nombrePersona', '$apellidoPersona', '$emailPersona')";
            // $result = mysqli_prepare($DBconection, $sql);
            // //$result = $DBconection->prepare($sql);
            // $result->execute();


            //$result->insert_id;

            //var_dump($user->$this->createPerson()->getlastId($DBconection->connect()));


            $user->setId($user->$this->createPerson());

            var_dump($user->getId());


            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($user);
            // $entityManager->flush();

            // return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        $DBconection = new Conexion();
        $consulta = "SELECT * FROM user when id = user.id";
        $result = mysqli_prepare($DBconection, $consulta);
        $result->execute();

        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }
}
