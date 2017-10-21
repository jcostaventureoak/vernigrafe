<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PriceTable;
use AppBundle\Form\Type\PriceTableType;
use AppBundle\Manager\PriceTableManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route(service="app.controller.price_table")
 */
class PriceTableController extends Controller
{
    /**
     * @var PriceTableManager
     */
    protected $priceTableManager;

    /**
     * @param PriceTableManager $priceTableManager
     */
    public function setPriceTableManager(PriceTableManager $priceTableManager)
    {
        $this->priceTableManager = $priceTableManager;
    }

    /**
     * @Route("/price-tables", name="list_price_table")
     *
     * @return Response
     */
    public function indexAction()
    {
        $priceTables = $this->priceTableManager->findAll();

        return $this->render(
            'priceTable/index.html.twig',
            ['priceTables' => $priceTables]
        );
    }

    /**
     * @Route("/price-tables/new", name="new_price_table", methods={"GET", "POST"})
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request)
    {
        $priceTable = new PriceTable();

        $form = $this->createForm(PriceTableType::class, $priceTable)
            ->add('save', SubmitType::class, ['label' => 'new']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->priceTableManager->create($priceTable);

            return $this->redirectToRoute('list_price_table');
        }

        return $this->render(
            'priceTable/new.html.twig',
            ['form' => $form->createView()]
        );
    }
}
