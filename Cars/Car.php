<?php

namespace Cars;

final class Car extends BaseCar {
    private int $passengerSeatsCount;

    public function __construct(string $photoFileName, string $brand, float $carrying, int $passengerSeatsCount)
    {
        parent::__construct($photoFileName, $brand, $carrying);
        $this->carType = 'car';
        $this->passengerSeatsCount = $passengerSeatsCount;
    }
}