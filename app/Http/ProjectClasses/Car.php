<?php

namespace App\Http\ProjectClasses;

use App\Http\ProjectClasses\CarFeatures;
use App\Http\ProjectClasses\Reseller;

class Car {

    private $name;
    private $price;
    private $model;
    private $features;
    private $detailsUrl;
    private $owner;

    public function __construct($node) {
        $this->setName($node);
        $this->setPrice($node);
        $this->setModel($node);
        $this->setFeatures($node);
        $this->setDetailsUrl($node);
        $this->setOwner($node);

    }

	public function getName() {
		return $this->name;
	}

	public function setName($node) {
        $this->name = $node->filter('h2.card-title')->text();
	}

	public function getPrice() {
		return $this->price;
	}

	public function setPrice($node) {
		$this->price = trim(str_replace('R$', '', $node->filter('span.card-price')->text()));
	}

	public function getModel() {
		return $this->model;
	}

	public function setModel($node) {
		$this->model = trim(str_replace('VERSÃO:', '',$node->filter('p.card-subtitle')->text()));
	}

	public function getFeatures() {
		return  $this->features;
	}

	public function setFeatures($node) {
        $features = new CarFeatures($node->filter('ul.list-features > li'));
		$this->features = $features->featuresList();
	}

	public function getDetailsUrl() {
		return $this->detailsUrl;
	}

	public function setDetailsUrl($node) {
        $link = explode('?', $node->filter('div.card-content > a')->attr('href'));
		$this->detailsUrl = $link[0];
    }

    public function getOwner() {
		return $this->owner;
	}

	public function setOwner($node) {
        if($node->filter('img.img-revenda')->count()){
            $owner = new Reseller($node->filter('img.img-revenda'));
            $this->owner = $owner->resellerDetails();

        }
	}

    public function getCarData(){
        return [
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'model' => $this->getModel(),
            'features' => $this->getFeatures(),
            'detailsUrl' => $this->getDetailsUrl(),
            'reseller' => $this->getOwner()
        ];
    }


}
