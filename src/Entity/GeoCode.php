<?php

namespace Ups\Entity;

use DOMDocument;
use Ups\NodeInterface;

class GeoCode implements NodeInterface
{
    private $latitude;
    private $longitude;

    /**
     * @param null|DOMDocument $document
     * @return \DOMElement
     */
    public function toNode(DOMDocument $document = null)
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('Geocode');

        $node->appendChild($document->createElement('Latitude', $this->getLatitude()));
        $node->appendChild($document->createElement('Longitude', $this->getLongitude()));

        return $node;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     * @return GeoCode
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     * @return GeoCode
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }
}
