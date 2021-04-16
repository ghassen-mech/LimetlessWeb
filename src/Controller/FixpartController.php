<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Repository\formationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FixpartController extends AbstractController
{
    /**
     * @Route("/fixpart", name="fixpart")
     */
    public function index(): Response
    {
        return $this->render('fixpart/index.html.twig', [
            'controller_name' => 'FixpartController',
        ]);
    }

    /**
     * @return Response
     * @Route ("/fix")
     */
    public function fix(): Response
    {
        return $this->render('fixpart/fix.html.twig');
    }

    /**
     * @return Response
     * @Route("client/formation",name="cform")
     */
    public function formtest(): Response
    {
        return $this->render('formationclient/formation.html.twig');
    }

    /**
     * @return Response
     * @Route ("/Acceuil",name="acceuil")
     */
    public function acceuil(): Response
    {
        return $this->render('fixpart/fix.html.twig');
    }



}
