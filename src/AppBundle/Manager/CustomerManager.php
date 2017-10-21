<?php

namespace AppBundle\Manager;

use Doctrine\ORM\EntityRepository;

class CustomerManager extends AbstractManager
{
    /**
     * @var EntityRepository
     */
    protected $customerRepository;

    /**
     * @param EntityRepository $customerRepository
     */
    public function setCustomerRepository(EntityRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Finds all entities in the repository.
     *
     * @return array
     */
    public function findAll()
    {
        return $this->customerRepository->findAll();
    }
}
