<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type_dishes
 *
 * @ORM\Table(name="type_dishes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Type_dishesRepository")
 */
class Type_dishes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Receipts", mappedBy="typeDishes")
     * @var Receipts[]
     */
    private $receipts;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->receipts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Type_dishes
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add receipt
     *
     * @param \AppBundle\Entity\Receipts $receipt
     *
     * @return Type_dishes
     */
    public function addReceipt(\AppBundle\Entity\Receipts $receipt)
    {
        $this->receipts[] = $receipt;

        return $this;
    }

    /**
     * Remove receipt
     *
     * @param \AppBundle\Entity\Receipts $receipt
     */
    public function removeReceipt(\AppBundle\Entity\Receipts $receipt)
    {
        $this->receipts->removeElement($receipt);
    }

    /**
     * Get receipts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReceipts()
    {
        return $this->receipts;
    }
}
