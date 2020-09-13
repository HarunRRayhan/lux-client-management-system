<?php

namespace App\Http\Livewire\Companies;

use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $website;
    public $phone;
    public $mobile;
    public $vat;
    public $terms;
    public $street;
    public $line_2;
    public $city;
    public $state;
    public $country;
    public $zip;

    protected array $rules = [
        'name'    => 'required|string|max:256',
        'website' => 'nullable|url|max:256',
        'phone'   => 'nullable|string|max:256',
        'mobile'  => 'nullable|string|max:256',
        'vat'     => 'nullable|string|max:256',
        'terms'   => 'nullable|string',
        'street'  => 'required|string|max:256',
        'line_2'  => 'nullable|string|max:256',
        'city'    => 'required|string|max:256',
        'state'   => 'required|string|max:256',
        'country' => 'required|string|max:256',
        'zip'     => 'required|string|max:256',
    ];

    public function addCompany()
    {
        $this->validate();
    }

    public function render(): View
    {
        return view( 'livewire.companies.create' );
    }
}
