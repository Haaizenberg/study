<?php

namespace Cars;


spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});


function getCarList(string $filename): array
{
    define('CAR_TYPES', [
        'car',
        'truck',
        'spec_machine',
    ]);

    $csv = file_get_contents("csv/$filename");
    $machines = [];
    $maxColumnsCount = 0;

    foreach (explode(PHP_EOL, $csv) as $i => $row) {
        $attrs = str_getcsv($row, ';');
        
        if ($i == 0) {
            $maxColumnsCount = count($attrs);
            continue;
        }

        if (count($attrs) < $maxColumnsCount) {
            continue;
        }

        if (in_array($attrs[0], CAR_TYPES)) {
            try {
                switch ($attrs[0]) {
                    case 'car':
                        $machines[] = new Car(
                            photoFileName: $attrs[3],
                            brand: $attrs[1],
                            carrying: (float) $attrs[5],
                            passengerSeatsCount: (int) $attrs[2],
                        );
                        break;
    
                    case 'truck':
                        $bodyWhl = empty($attrs[4]) ? [ '0', '0', '0' ] : explode('x', $attrs[4]);
                        
                        $machines[] = new Truck(
                            photoFileName: $attrs[3],
                            brand: $attrs[1],
                            carrying: (float) $attrs[5],
                            bodyLength: (float) $bodyWhl[0],
                            bodyWidth: (float) $bodyWhl[1],
                            bodyHeight: (float) $bodyWhl[2],
                        );
                        break;
    
                    case 'spec_machine':
                        $machines[] = new SpecMachine(
                            photoFileName: $attrs[3],
                            brand: $attrs[1],
                            carrying: (float) $attrs[5],
                            extra: $attrs[6],
                        );
                        break;
                    
                    default:
                        break;
                }
            } catch (\Throwable $th) {
                continue;
            }
        }
    }

    return $machines;
}

$cars = getCarList('cars.csv');

