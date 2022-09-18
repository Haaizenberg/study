<?php

namespace Cars;

final class SpecMachine extends BaseCar {
    private string $extra;

    public function __construct(string $photoFileName, string $brand, float $carrying, string $extra)
    {
        parent::__construct($photoFileName, $brand, $carrying);
        $this->carType = 'specMachine';
        $this->extra = $extra;
    }
}