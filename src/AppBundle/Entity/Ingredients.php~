<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingredients
 *
 * @ORM\Table(name="ingredients")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IngredientsRepository")
 */
class Ingredients
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
     * @var string
     *
     * @ORM\Column(name="qte", type="string", length=255)
     */
    private $qte;

    /**
     * @ORM\ManyToOne(targetEntity="Receipts", inversedBy="ingredients")
     * @var Receipts
     */
    protected $receipts;


    /**
     * Get id
     *
     * @return int
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
     * @return Ingredients
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
     * Set qte
     *
     * @param string $qte
     *
     * @return Ingredients
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return string
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * Set receipts
     *
     * @param \AppBundle\Entity\Receipts $receipts
     *
     * @return Ingredients
     */
    public function setReceipts(\AppBundle\Entity\Receipts $receipts = null)
    {
        $this->receipts = $receipts;

        return $this;
    }

    /**
     * Get receipts
     *
     * @return \AppBundle\Entity\Receipts
     */
    public function getReceipts()
    {
        return $this->receipts;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getIngredients()
    {
        return $this->name;
    }
}
