<?php

namespace Cars;

final class Truck extends BaseCar {
    private float $bodyLength;
    private float $bodyWidth;
    private float $bodyHeight;

    public function __construct(
        string $photoFileName,
        string $brand,
        float $carrying,
        float $bodyLength = 0,
        float $bodyWidth = 0,
        float $bodyHeight = 0,
    ) {
        parent::__construct($photoFileName, $brand, $carrying);
        $this->carType = 'truck';
        $this->bodyLength = $bodyLength;
        $this->bodyWidth = $bodyWidth;
        $this->bodyHeight = $bodyHeight;
    }

    public function getBodyVolume(): float
    {
        return $this->bodyLength * $this->bodyWidth * $this->bodyHeight;
    }
}