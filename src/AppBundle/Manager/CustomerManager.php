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
     * Finds an entity by its primary key / identifier.
     *
     * @param int $id
     *
     * @return array
     */
    public function find($id)
    {
        return $this->customerRepository->find($id);
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
