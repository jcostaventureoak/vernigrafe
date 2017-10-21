<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Customer;
use AppBundle\Form\Type\CustomerType;
use AppBundle\Manager\CustomerManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route(service="app.controller.customer")
 */
class CustomerController extends Controller
{
    /**
     * @var CustomerManager
     */
    protected $customerManager;

    /**
     * @param CustomerManager $customerManager
     */
    public function setCustomerManager(CustomerManager $customerManager)
    {
        $this->customerManager = $customerManager;
    }

    /**
     * @Route("/customers", name="list_customer")
     *
     * @return Response
     */
    public function indexAction()
    {
        $customers = $this->customerManager->findAll();

        return $this->render(
            'customer/index.html.twig',
            ['customers' => $customers]
        );
    }

    /**
     * @Route("/customers/new", name="new_customer", methods={"GET", "POST"})
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request)
    {
        $customer = new Customer();

        $form = $this->createForm(CustomerType::class, $customer)
            ->add('save', SubmitType::class, ['label' => 'new']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->customerManager->create($customer);

            return $this->redirectToRoute('list_customer');
        }

        return $this->render(
            'customer/new.html.twig',
            ['form' => $form->createView()]
        );
    }
}
