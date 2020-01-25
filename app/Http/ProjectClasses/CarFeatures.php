<?php

namespace App\Http\ProjectClasses;

class CarFeatures {

    private $year;
    private $mileage;
    private $transmission;

    public function __construct($node) {

        $node->each(function ($feature) {
            switch ($feature->attr('title')) {
                case 'Ano de fabricação':
                    $this->setYear($feature->text());
                    break;
                case 'Kilometragem atual':
                    $this->setMileage($feature->text());
                    break;
                case 'Tipo de câmbio':
                    $this->setTransmission($feature->text());
                    break;
                default:
                    break;
            }
        });

    }

	public function getYear() {
		return $this->year;
	}

	public function setYear($year) {
		$this->year = $year;
	}

	public function  getMileage() {
		return $this->mileage;
	}

	public function setMileage($mileage) {
		$this->mileage = trim(str_replace('km', '',$mileage));
	}

	public function  getTransmission() {
		return $this->transmission;
	}

	public function setTransmission($transmission) {
		$this->transmission = $transmission;
    }

    public function featuresList(){
        return [
            'year' => $this->getYear(),
            'mileage' => $this->getMileage(),
            'transmission' => $this->getTransmission()
        ];
    }







}
