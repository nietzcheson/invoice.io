<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Registros;
use AppBundle\Form\RegistrosType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

        $registro = new Registros();
        $registroForm = $this->createForm(new RegistrosType(), $registro);
        $registroForm->handleRequest($request);

        if($registroForm->isValid()){

          $em->persist($registro);
          $em->flush();

          $this->get('session')->getFlashBag()->add('mensaje', 'Registro creado');

          return $this->redirect($this->generateUrl('registros'));

        }

        return $this->render('registro/registro.html.twig', array(
          'registro_form' => $registroForm->createView(),
          'registros'     => $registros
        ));
    }
}
