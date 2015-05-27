<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Registros;
use AppBundle\Form\RegistrosType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/registros")
 */


class RegistroController extends Controller
{
    /**
     * @Route("", name="registros")
     */
    public function registroAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $registros = $em->getRepository('AppBundle:Registros')->findAll();

        $categorias = $em->getRepository('AppBundle:Categorias');

        $registro = new Registros();
        $registroForm = $this->createForm(new RegistrosType(), $registro);
        $registroForm->handleRequest($request);

        if($registroForm->isValid()){

          $em->persist($registro);
          $em->flush();

          $this->get('session')->getFlashBag()->add('mensaje', 'Registro creado');

          return $this->redirect($this->generateUrl('registros'));
        }

        return $this->render('registros/registros.html.twig', array(
          'registro_form' => $registroForm->createView(),
          'registros'     => $registros
        ));
    }

    /**
     * @Route("/editar/{id}", name="registro_editar", options={"expose": true})
     */

    public function registroEditarAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $registro = $em->getRepository("AppBundle:Registros")->find($id);

        $registroForm = $this->createForm(new RegistrosType(), $registro);

        $htmlForm = $this->renderView('registros/registro-form.html.twig', array(
          'registro_form' => $registroForm->createView()
        ));

        return new Response(json_encode($htmlForm));
    }
}
