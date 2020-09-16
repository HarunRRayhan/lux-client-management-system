<?php

namespace App\Http\Livewire\Companies;

use App\Http\Livewire\Companies\Concerns\HasCompanyForm;
use App\Models\Address;
use App\Models\Company;
use Livewire\Component;

class Edit extends Component
{
    use HasCompanyForm;

    public ?Company $company;

    public function mount( Company $company )
    {
        $company->loadMissing( 'address' );
        $this->company = $company;
        $this->setCompany()
             ->setAddress();
    }

    public function updateCompany()
    {
        $this->validate();

        $this->company->update( $this->getCompanyInputs() );
        $this->company->address->update( $this->getAddressInputs() );

        $this->emit( 'companyupdated' );
        $this->emit( 'success', 'This is the message' );
        session()->flash( 'success', 'Company updated successfully' );
    }

    public function render()
    {
        return view( 'livewire.companies.edit' );
    }

    protected function setCompany(): Edit
    {
        $this->name    = $this->company->name;
        $this->phone   = $this->company->phone;
        $this->website = $this->company->website;
        $this->mobile  = $this->company->mobile;
        $this->vat     = $this->company->vat_number;
        $this->terms   = $this->company->terms;

        return $this;
    }

    protected function setAddress(): Edit
    {
        $address       = $this->company->address;
        $this->street  = $address->street;
        $this->line_2  = $address->line_2;
        $this->city    = $address->city;
        $this->state   = $address->state;
        $this->country = $address->country;
        $this->zip     = $address->zip;


        return $this;
    }
}
