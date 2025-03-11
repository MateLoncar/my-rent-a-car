<?php

namespace App\Constant;

class VehicleTypeConstants
{
	const SEDAN = 1;
	const CARAVAN = 2;
    const CABRIOLLET = 3;
    const SUV = 4;
    const TRUCK = 5;

	static private $constants = array(
		self::SEDAN => 'sedan',
		self::CARAVAN => 'caravan',
        self::CABRIOLLET => 'cabriollet',
        self::SUV => 'suv',
        self::TRUCK => 'truck'
	);
	
	static public function getConstants()
	{
		return self::$constants;
	}
}