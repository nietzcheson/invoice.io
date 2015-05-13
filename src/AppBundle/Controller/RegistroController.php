<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Registros;
use AppBundle\Form\RegistrosType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/registro")
 */


class RegistroController extends Controller
{
    /**
     * @Route("", name="registro")
     */
    public function registroAction(Request $request)
    {
        $registro = new Registros();
        $registroForm = $this->createForm(new RegistrosType(), $registro);
        $registroForm->handleRequest($request);

        if($registroForm->isValid()){
          $this->get('session')->getFlashBag()->add('mensaje', 'Registro creado');
        }

        return $this->render('registro/registro.html.twig', array(
          'registro_form' => $registroForm->createView()
        ));
    }
}
