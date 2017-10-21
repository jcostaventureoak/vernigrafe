<?php

namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

abstract class AbstractManager
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @param EntityManager $entityManager
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EntityManager $entityManager, EventDispatcherInterface $eventDispatcher)
    {
        $this->entityManager = $entityManager;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * Saves the object on the database table.
     *
     * @param $object
     *
     * @return mixed
     */
    protected function save($object)
    {
        $this->entityManager->persist($object);
        $this->entityManager->flush();

        return $object;
    }

    /**
     * Creates the object.
     *
     * @param $object
     *
     * @return mixed
     */
    public function create($object)
    {
        return $this->save($object);
    }

    /**
     * Updates the object.
     *
     * @param mixed $object
     *
     * @return mixed
     */
    public function update($object)
    {
        return $this->save($object);
    }

    /**
     * Deletes the object from the database table.
     *
     * @param mixed $object
     */
    public function delete($object)
    {
        $this->entityManager->remove($object);
        $this->entityManager->flush();
    }
}
