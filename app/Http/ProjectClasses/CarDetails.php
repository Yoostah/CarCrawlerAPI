<?php

namespace App\Http\ProjectClasses;

class CarDetails {

    private $name;
    private $price;
    private $model;
    private $year;
    private $mileage;
    private $transmission;
    private $doorsNumber;
    private $fuelType;
    private $color;
    private $plate;
    private $acceptsExchanges;

    public function __construct($node) {
        $this->setName($node);
        $this->setPrice($node);
        $this->setModel($node);
        $this->setYear($node);
        $this->setMileage($node);
        $this->setTransmission($node);
        $this->setDoorsNumber($node);
        $this->setFuelType($node);
        $this->setColor($node);
        $this->setPlate($node);
        $this->setAcceptsExchanges($node);
    }

    public function getName() {
		return $this->name;
	}

	private function setName($node) {
        $this->name = $node->filter('h1[itemprop="name"]')->text();
	}

	public function getPrice() {
		return $this->price;
	}

	private function setPrice($node) {
		$this->price = trim(str_replace('R$', '', $node->filter('span.price')->text()));
	}

	public function getModel() {
		return $this->model;
	}

	private function setModel($node) {
		$this->model = $node->filter('p.desc')->text();
	}

	public function getYear() {
		return $this->year;
	}

	private function setYear($node) {
		$this->year = $node->filter('span[itemprop="modelDate"]')->text();
	}

	public function  getMileage() {
		return $this->mileage;
	}

	private function setMileage($node) {
		$this->mileage = $node->filter('span[itemprop="mileageFromOdometer"]')->text();
	}

	public function  getTransmission() {
		return $this->transmission;
	}

	private function setTransmission($node) {
		$this->transmission = $node->filter('span[title="Tipo de transmissão"]')->text();
    }

    public function getDoorsNumber() {
		return $this->doorsNumber;
	}

	private function setDoorsNumber($node) {
		$this->doorsNumber = $node->filter('span[title="Portas"]')->text();
	}

	public function getFuelType() {
		return $this->fuelType;
	}

	private function setFuelType($node) {
		$this->fuelType = $node->filter('span[itemprop="fuelType"]')->text();
	}

	public function getColor() {
		return $this->color;
	}

	private function setColor($node) {
		$this->color = $node->filter('span[itemprop="color"]')->text();
	}

	public function getPlate() {
		return $this->plate;
	}

	private function setPlate($node) {
		$this->plate = $node->filter('span[title="Final da placa"]')->text();
	}

	public function getAcceptsExchanges() {
		return $this->acceptsExchanges;
	}

	private function setAcceptsExchanges($node) {
		$this->acceptsExchanges = $node->filter('span[title="Aceita troca?"]')->text();
	}

    public function getCarDetails(){
        return [
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'model' => $this->getModel(),
            'year' => $this->getYear(),
            'mileage' => $this->getMileage(),
            'transmission' => $this->getTransmission(),
            'doorsNumber' => $this->getDoorsNumber(),
            'fuelType' => $this->getFuelType(),
            'color' => $this->getColor(),
            'plate' => $this->getPlate(),
            'acceptsExchanges' => $this->getAcceptsExchanges()
        ];
    }


}
