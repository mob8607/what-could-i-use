<?php

namespace AppBundle\Controller;

use AppBundle\Document\Framework;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    /**
     * @Route("/add", name="wciu_framework_add")
     */
    public function addAction()
    {
        $manager = $this->get('es.manager');

        $framework = new Framework();
        $framework->setName('Hi');

        $manager->persist($framework);
        $manager->commit();

        return $this->render(
            'AppBundle:Default:add.html.twig',
            array(
                'framework' => $framework
            )
        );
    }

    /**
     * @Route("/list", name="wciu_framework_list")
     */
    public function listAction()
    {
        $manager = $this->get('es.manager');

        $repository = $manager->getRepository('AppBundle:Framework');
        $framework = $repository->find('AU14AFlgCkvMJMIH2vVN'); // 1 is the document id

        return $this->render(
            'AppBundle:Default:index.html.twig',
            array(
                'framework' => $framework
            )
        );
    }

    /**
     * @Method({"GET"})
     * @Route("/data", name="wciu_framework_get_data")
     */
    public function dataAction()
    {
        $response = new Response(
            json_encode(array(
                array('name' => 'sym2', 'text' => 'tex1'),
                array('name' => 'yii2', 'text' => 'tex2')
            ))
        );
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Method({"POST"})
     * @Route("/data", name="wciu_framework_set_data")
     */
    public function setDataAction()
    {
        $response = new Response(
            json_encode(array(
                array('name' => 'sym2', 'text' => 'tex1'),
                array('name' => 'yii2', 'text' => 'tex2'),
                array('name' => 'yii3', 'text' => 'tex3')
            ))
        );
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
