<?php

namespace App\Http\ProjectClasses;

class Reseller {

    private $title;
    private $imageUrl;

    public function __construct($node) {
        $this->setTitle($node->attr('title'));
        $this->setImageUrl($node->attr('src'));
    }

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function  getImageUrl() {
		return $this->imageUrl;
	}

	public function setImageUrl($mileage) {
		$this->imageUrl = trim(str_replace('km', '',$mileage));
	}

    public function resellerDetails(){
        return [
            'title' => $this->getTitle(),
            'imageUrl' => $this->getImageUrl()
        ];
    }







}
