<?php

namespace Ups\Entity\Tradeability;

use DOMDocument;
use DOMElement;
use Ups\NodeInterface;

/**
 * Class Weight
 */
class Weight implements NodeInterface
{

    /**
     * @var UnitOfMeasurement
     */
    private $unitOfMeasurement;

    /**
     * @var int
     */
    private $value;

    /**
     * @param null|DOMDocument $document
     * @return DOMElement
     */
    public function toNode(DOMDocument $document = null)
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('Weight');

        // Required
        $node->appendChild($document->createElement('Value', $this->getValue()));

        // Optional
        if ($this->getUnitOfMeasurement() instanceof UnitOfMeasurement) {
            $node->appendChild($this->getUnitOfMeasurement()->toNode($document));
        }

        return $node;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return Weight
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return UnitOfMeasurement
     */
    public function getUnitOfMeasurement()
    {
        return $this->unitOfMeasurement;
    }

    /**
     * @param UnitOfMeasurement $unitOfMeasurement
     * @return Weight
     */
    public function setUnitOfMeasurement(UnitOfMeasurement $unitOfMeasurement)
    {
        $this->unitOfMeasurement = $unitOfMeasurement;

        return $this;
    }
}
