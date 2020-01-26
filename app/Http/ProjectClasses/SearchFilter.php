<?php

namespace App\Http\ProjectClasses;

class SearchFilter {

    private $type = 'carro';
    private $manufacturer;
    private $model;
    private $yearRange;
    private $priceRange;
    private $mileageRange;
    private $status;
    private $origin;
    private $transmission;
    private $perPage;
    private $page;

    private $allowed_types = ['carro', 'moto', 'caminhao'];
    private $allowed_origin = ['particular', 'revenda'];
    private $allowed_status = ['seminovo', 'novo'];
    private $allowed_transmission = ['automatico' => 11, 'manual' => 60, 'automatizado' => 78];

    public function __construct($filters) {
        foreach ($filters as $key => $value) {
            if(isset($value))
            switch (strtolower($key)) {
                case 'type':
                    $this->setType(strtolower($value));
                    break;
                case 'manufacturer':
                    $this->setManufacturer(strtolower($value));
                    break;
                case 'model':
                    $this->setModel(strtolower($value));
                    break;
                case 'yearrange':
                    $this->setYearRange(strtolower($value));
                    break;
                case 'pricerange':
                    $this->setPriceRange(strtolower($value));
                    break;
                case 'mileagerange':
                    $this->setMileageRange(strtolower($value));
                    break;
                case 'status':
                    $this->setStatus(strtolower($value));
                    break;
                case 'origin':
                    $this->setOrigin(strtolower($value));
                    break;
                case 'transmission':
                    $this->setTransmission(strtolower($value));
                    break;
                case 'perpage':
                    $this->setPerPage($value);
                    break;
                case 'page':
                    $this->setPage($value);
                    break;

                default:
                    break;
            }
        }
    }

    private function isTypeAllowed($type){
        return in_array($type, $this->allowed_types);
    }

    private function isOriginAllowed($origin){
        return in_array($origin, $this->allowed_origin);
    }
    private function isStatusAllowed($status){
        return in_array($status, $this->allowed_status);
    }
    private function isTransmissionAllowed($transmission){
        if(isset($this->allowed_transmission[$transmission]))
            return $this->allowed_transmission[$transmission];
        return false;
    }

	public function getType() {
		return $this->type;
	}

	public function setType($type) {
        if($this->isTypeAllowed($type) && $type !== $this->type)
		    $this->type = $type;
	}

	public function getManufacturer() {
		return $this->manufacturer;
	}

	public function setManufacturer($manufacturer) {
		$this->manufacturer = '/'.$manufacturer;
	}

	public function getModel() {
		return $this->model;
	}

	public function setModel($model) {
		$this->model = '/'.$model;
	}

	public function getYearRange() {
		return $this->yearRange;
	}

	public function setYearRange($yearRange) {
        if(count( explode('-', $yearRange) ) == 2)
		    $this->yearRange = '/ano-'.$yearRange;
	}

	public function getPriceRange() {
		return $this->priceRange;
	}

	public function setPriceRange($priceRange) {
        if(count( explode('-', $priceRange) ) == 2)
		    $this->priceRange = '/preco-'.$priceRange;
	}

	public function getMileageRange() {
		return $this->mileageRange;
	}

	public function setMileageRange($mileageRange) {
        if(count( explode('-', $mileageRange) ) == 2)
		    $this->mileageRange = '/km-'.$mileageRange;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setStatus($status) {
        if($this->isStatusAllowed($status))
		    $this->status = '/estado-'.$status;
	}

	public function getOrigin() {
		return $this->origin;
	}

	public function setOrigin($origin) {
        if($this->isOriginAllowed($origin))
		    $this->origin = '/origem-'.$origin;
	}

	public function getTransmission() {
		return $this->transmission;
	}

	public function setTransmission($transmission) {
        $codes = '';

        foreach (explode('-', $transmission) as $key) {
            $isAllowed = $this->isTransmissionAllowed($key);

            if($isAllowed)
                $codes .= '-'.$isAllowed;
        }
        $this->transmission = '/listaAcessorios[]'.$codes;

	}

	public function getPerPage() {
		return $this->perPage;
	}

	public function setPerPage($perPage) {
		$this->perPage = '?ordenarPor=2&registrosPagina='.$perPage;
	}

	public function getPage() {
		return $this->page;
	}

	public function setPage($page) {
		$this->page = '&page='.$page;
	}

    public function getFilteredParams(){
        return
            $this->getType().
            $this->getManufacturer().
            $this->getModel().
            $this->getYearRange().
            $this->getPriceRange().
            $this->getMileageRange().
            $this->getOrigin().
            $this->getStatus().
            $this->getTransmission().
            $this->getPerPage().
            $this->getPage();
    }







}
