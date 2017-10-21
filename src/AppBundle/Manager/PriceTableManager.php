<?php

namespace AppBundle\Manager;

use Doctrine\ORM\EntityRepository;

class PriceTableManager extends AbstractManager
{
    /**
     * @var EntityRepository
     */
    protected $priceTableRepository;

    /**
     * @param EntityRepository $priceTableRepository
     */
    public function setPriceTableRepository(EntityRepository $priceTableRepository)
    {
        $this->priceTableRepository = $priceTableRepository;
    }

    /**
     * Finds all entities in the repository.
     *
     * @return array
     */
    public function findAll()
    {
        return $this->priceTableRepository->findAll();
    }
}
