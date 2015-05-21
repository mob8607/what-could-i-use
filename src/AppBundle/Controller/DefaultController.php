<?php

namespace AppBundle\Controller;

use AppBundle\Document\Framework;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
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

        return $this->render('AppBundle:Default:index.html.twig', array(
            'framework' => $framework
        ));
    }

    /**
     * @Route("/list", name="wciu_framework_list")
     */
    public function listAction()
    {
        $manager = $this->get('es.manager');

        $repository = $manager->getRepository('AppBundle:Framework');
        $framework = $repository->find('AU14AFlgCkvMJMIH2vVN'); // 1 is the document id

        return $this->render('AppBundle:Default:index.html.twig', array(
            'framework' => $framework
        ));
    }
}
