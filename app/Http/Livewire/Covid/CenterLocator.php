<?php

namespace App\Http\Livewire\Covid;

use Livewire\Component;
use App\Http\Helpers\CovidHelper;

class CenterLocator extends Component
{
    public $states=[];
    public $districts=[];
    protected $centers=[];
    public $searchDate;
    public $remark;
    public $dateBtn;

    public function mount()
    {
        $this->searchDate = date('d-m-Y');
        $this->dateBtn = $this->searchDate;
    }
    
    public $form = [
        'search_by'     => 'postal_code',
        'state_id'      => '',
        'district_id'   => '',
        'postal_code'   => '',
    ];

    protected function rules() {
        $rules = [
            'form.search_by' => 'required',
        ];

        if ($this->form['search_by'] == 'postal_code') {
            $rules += [
                'form.postal_code'      => 'required|numeric|digits:6',
            ];
        }

        if ($this->form['search_by'] == 'district') {
            $rules += [
                'form.state_id'         => 'required',
                'form.district_id'      => 'required',
            ];
        }

        return $rules;
    }

    
    public function updated($field)
    {
        $this->validateOnly($field);

        $this->remark = null;
        $this->centers = [];
       
        if ($field == 'form.search_by') {
            if ($this->form['search_by'] == 'district' && count($this->states) == 0) {
                $this->loadStates();
            }
        }

        if ($field == 'form.state_id') {
            $this->form['district_id'] = '';
            $this->loadDistricts();
        }
    }

    public function submit()
    {
        $this->validate();
        $form = $this->form;

        // Calender By Postal Code Request
        if ($form['search_by'] == 'postal_code') {
            $response = CovidHelper::calenderByPin([
                'postal_code' => $form['postal_code'],
                'date' => $this->searchDate,
            ]);
        } 

        // Calender By District Id Request
        else if ($form['search_by'] == 'district') {
            $response = CovidHelper::calenderByDistrictId([
                'district_id' => $form['district_id'],
                'date' => $this->searchDate,
            ]);
        }

        if (isset($response->centers)) {
            if (count($response->centers) < 1) {
                $this->remark = 'no_center';
            } else {
                $this->remark = 'center_available';
            }
            $this->centers = collect($response->centers)->sortBy('name');
            $this->emit('showDateData', $this->searchDate);
        }
    }

    public function loadStates()
    {
        $this->states = CovidHelper::fetchStates()->states;
    }

    public function loadDistricts()
    {
        $this->districts = CovidHelper::fetchDistrictsByStateId([
            'state_id' => $this->form['state_id'],
        ])->districts;
    }

    public function decreaseSearchDate()
    {
        $this->centers=[];
        $this->remark = '';
        $this->searchDate = date('d-m-Y', strtotime($this->searchDate . ' -7 day'));
        $this->submit();
    }

    public function increaseSearchDate()
    {
        $this->centers=[];
        $this->remark = '';
        $this->searchDate = date('d-m-Y', strtotime($this->searchDate . ' +7 day'));
        $this->submit();
    }

    public function render()
    {
        return view('livewire.covid.center-locator', ['centers' => $this->centers]);
    }
}
