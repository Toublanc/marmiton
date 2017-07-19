<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 *
 * @ORM\Table(name="stage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StageRepository")
 */
class Stage
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
     * @ORM\Column(name="details", type="string", length=255)
     */
    private $details;

    /**
     * @ORM\ManyToOne(targetEntity="Receipts", inversedBy="stage")
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
     * Set details
     *
     * @param string $details
     *
     * @return Stage
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set receipts
     *
     * @param \AppBundle\Entity\Receipts $receipts
     *
     * @return Stage
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
    public function getStage()
    {
        return $this->details;
    }
}
