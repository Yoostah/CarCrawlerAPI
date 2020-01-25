<?php

namespace App\Http\ProjectClasses;

class Filter {

    private $type;
    private $manufacturer;
    private $model;
    private $yearrange;
    private $pricerange;
    private $mileagerange;
    private $status;
    private $origin;
    private $transmission;
    private $perpage;
    private $page;

    private $allowed_types = ['carro', 'moto', 'caminhao'];
    private $allowed_origin = ['seminovo', 'novo'];
    private $allowed_status = ['particular', 'revenda'];
    private $allowed_transmission = ['automatico' => 11, 'manual' => 60, 'automatizado' => 78];


    public function __construct($filters) {
        foreach ($filters as $key => $value) {
            if(isset($value))
            switch (strtolower($key)) {
                case 'type':
                    if(in_array(strtolower($value), $allowed_types))
                        $urlParams .= strtolower($value);
                    break;
                case 'manufacturer':
                    $urlParams .= '/'.strtolower($value);
                    break;
                case 'model':
                    $urlParams .= '/'.strtolower($value);
                    break;
                case 'yearrange':
                    $yearRange = explode('-', strtolower($value));
                    if(count($yearRange) == 2){
                        $urlParams .= '/ano-'.implode('-', $yearRange);
                    }
                    break;
                case 'pricerange':
                    $priceRange = explode('-', strtolower($value));
                    if(count($priceRange) == 2){
                        $urlParams .= '/preco-'.implode('-', $priceRange);
                    }
                    break;
                case 'mileagerange':
                    $mileageRange = explode('-', strtolower($value));
                    if(count($mileageRange) == 2){
                        $urlParams .= '/km-'.implode('-', $mileageRange);
                    }
                    break;
                case 'status':
                    if(in_array(strtolower($value), $allowed_status))
                        $urlParams .= '/estado-'.strtolower($value);
                    break;
                case 'origin':
                    if(in_array(strtolower($value), $allowed_origin))
                        $urlParams .= '/origem-'.strtolower($value);
                    break;
                case 'transmission':
                    if(isset($allowed_transmission[strtolower($value)]))
                        $urlParams .= '/listaAcessorios[]-'.$allowed_transmission[strtolower($value)];
                    break;
                case 'perpage':
                        $urlParams .= '?ordenarPor=2&registrosPagina='.($value);
                    break;
                case 'page':
                        $urlParams .= '&page='.($value);
                    break;

                default:
                    break;
            }
        }
        /*$filters->each(function ($filter) {
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
        });*/



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
            return '/listaAcessorios[]-'.$this->allowed_transmission[$transmission];
        return false;
    }

	public function getType() {
		return $this->type;
	}

	public function setType($type) {
		$this->type = $type;
	}

	public function getManufacturer() {
		return $this->manufacturer;
	}

	public function setManufacturer($manufacturer) {
		$this->manufacturer = $manufacturer;
	}

	public function getModel() {
		return $this->model;
	}

	public function setModel($model) {
		$this->model = $model;
	}

	public function getYearrange() {
		return $this->yearrange;
	}

	public function setYearrange($yearrange) {
		$this->yearrange = $yearrange;
	}

	public function getPricerange() {
		return $this->pricerange;
	}

	public function setPricerange($pricerange) {
		$this->pricerange = $pricerange;
	}

	public function getMileagerange() {
		return $this->mileagerange;$
	}

	public function setMileagerange($mileagerange) {
		$this->mileagerange = $mileagerange;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setStatus($status) {
		$this->status = $status;
	}

	public function getOrigin() {
		return $this->origin;
	}

	public function setOrigin($origin) {
		$this->origin = $origin;
	}

	public function getTransmission() {
		return $this->transmission;
	}

	public function setTransmission($transmission) {
		$this->transmission = $transmission;
	}

	public function getPerpage() {
		return $this->perpage;$
	}

	public function setPerpage($perpage) {
		$this->perpage = $perpage;
	}

	public function getPage() {
		return $this->page;
	}

	public function setPage($page) {
		$this->page = $page;
	}



    public function featuresList(){
        return [
            'year' => $this->getYear(),
            'mileage' => $this->getMileage(),
            'transmission' => $this->getTransmission()
        ];
    }







}
