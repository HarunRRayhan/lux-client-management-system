<?php
/**
 * @author HarunRRayhan/HRXPlugins
 * @url http://hrxplugins.com/
 * @version 1.0
 * File: HasCompanyForm.php
 * @FileVersion: 1.0
 * Created On: 14/9/20:12:29 pm 09/14/2020
 * Updated On: 14/9/20:12:29 pm 09/14/2020
 * @package: @awesome-logo-slider-pro
 */

namespace App\Http\Livewire\Concerns;


trait HasCompanyForm
{

    public $zip;
    public $country;
    public $line_2;
    public $website;
    public $city;
    public $terms;
    public $phone;
    public $street;
    public $vat;
    public $mobile;
    public $name;
    public $state;
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

    protected function getCompanyInputs( array $extra = [] ): array
    {
        return array_merge( [
            'name'       => $this->name,
            'website'    => $this->website,
            'phone'      => $this->phone,
            'mobile'     => $this->mobile,
            'vat_number' => $this->vat,
            'terms'      => $this->terms,
        ], $extra );
    }

    protected function getAddressInputs( array $extra = [] ): array
    {
        return array_merge( [
            'street'  => $this->street,
            'line_2'  => $this->line_2,
            'city'    => $this->city,
            'state'   => $this->state,
            'country' => $this->country,
            'zip'     => $this->zip
        ], $extra );
    }

    protected function clearInputs()
    {
        $this->zip     = null;
        $this->country = null;
        $this->line_2  = null;
        $this->website = null;
        $this->city    = null;
        $this->terms   = null;
        $this->phone   = null;
        $this->street  = null;
        $this->vat     = null;
        $this->mobile  = null;
        $this->name    = null;
        $this->state   = null;
    }
}
