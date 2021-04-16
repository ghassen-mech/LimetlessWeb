<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Repository\cour2Repository;
use App\Repository\courRepository;
use App\Repository\formationRepository;
use App\Repository\participantsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @method getEntityManager()
 */
class FormationclientController extends AbstractController
{
    /**
     * @Route("/formationclient", name="formationclient")
     */
    public function index(): Response
    {
        return $this->render('formationclient/index.html.twig', [
            'controller_name' => 'FormationclientController',
        ]);
    }
    /**
     * @param formationRepository $repo
     * @return Response
     * @Route("/client/affcihef",name="formationc")
     */

    public function Afficheformation(formationRepository $repo){
        $formation = $repo->findAll();


        return $this->render('formationclient/formation.html.twig',
            ['formation'=>$formation]);

    }

    /**
     * @param formationRepository $repo
     * @return Response
     * @Route("/client/affcihefp",name="formationcP")
     */
    public function Afficheformationclient(formationRepository $repo){


        $formation=$repo->OrderByidQB();
        return $this->render('formationclient/formation.html.twig',
            ['formation'=>$formation]);

    }

    /**
     * @param formationRepository $repo
     * @param participantsRepository $repoP
     * @return Response
     * @Route("/client/affcihefpt1",name="formationcPt")
     */
    public function Afficheformationclientt(formationRepository $repo,participantsRepository $repoP){
        $participants=$repoP->find(3);

        $formation=$repo->OrderByidform($participants->getIdformation());

        return $this->render('formationclient/formation.html.twig',
            ['formationt'=>$formation]);

    }
    /**
     * @param formationRepository $repo
     * @return Response
     * @Route("/client/affcihefpt2",name="formationcPt")
     */
    public function Afficheformationclientt2(formationRepository $repo){
      $formation=$repo->OrderById();
        return $this->render('formationclient/formation.html.twig',
            ['formationt'=>$formation]);

    }


    /**
     * * @param $id
     * @param cour2RepositoryRepository $repo
     * @return Response
     * @Route("/client/affcihec/{id}",name="courc")
     */
    public function Affichecour($id,cour2Repository  $repo){

        $cour = $repo->findBy(['idf'=>$id]);



        return $this->render('formationclient/cour.html.twig',
            ['cour'=>$cour
            ]
        );

    }



}
