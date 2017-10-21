<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="customers")
 * @ORM\Entity()
 */
class Customer
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     *
     * @Assert\Email()
     */
    protected $email;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true, unique=true)
     */
    protected $vat;

    /**
     * @var PriceTable
     *
     * @ORM\ManyToOne(targetEntity="PriceTable")
     * @ORM\JoinColumn()
     */
    protected $priceTable;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     *
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $email
     *
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $vat
     *
     * @return Customer
     */
    public function setVat($vat)
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * @return string
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param PriceTable $priceTable
     *
     * @return Customer
     */
    public function setPriceTable(PriceTable $priceTable = null)
    {
        $this->priceTable = $priceTable;

        return $this;
    }

    /**
     * @return PriceTable
     */
    public function getPriceTable()
    {
        return $this->priceTable;
    }
}
