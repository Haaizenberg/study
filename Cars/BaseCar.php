<?php

namespace Cars;

use InvalidArgumentException;

abstract class BaseCar {
    protected string $carType;
    protected string $photoFileName;
    protected string $brand;
    protected float $carrying; 

    protected function __construct(string $photoFileName, string $brand, float $carrying)
    {
        $matches = [];
        if (preg_match("/\w+\.\w{1}/", $photoFileName, $matches)) {
            $this->photoFileName = $photoFileName;
        } else {
            throw new InvalidArgumentException;
        }
        $this->brand = $brand;
        $this->carrying = $carrying;
    }

    public function getPhotoFileExt(): string
    {
        $parts = explode('.', $this->photoFileName);
        return array_pop($parts);
    }
}