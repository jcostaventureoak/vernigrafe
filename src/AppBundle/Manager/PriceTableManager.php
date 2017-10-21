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
     * Finds an entity by its primary key / identifier.
     *
     * @param int $id
     *
     * @return array
     */
    public function find($id)
    {
        return $this->priceTableRepository->find($id);
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
