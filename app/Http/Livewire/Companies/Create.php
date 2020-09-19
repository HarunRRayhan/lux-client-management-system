<?php

namespace App\Http\Livewire\Companies;

use App\Http\Livewire\Companies\Concerns\HasCompanyForm;
use App\Models\Address;
use App\Models\Company;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    use HasCompanyForm;

    public function addCompany()
    {
        $this->validate();

        $company = Company::create($this->getCompanyInputs());
        $address = Address::create($this->getAddressInputs([
            'addressable_type' => Company::class,
            'addressable_id'   => $company->id,
        ]));

        session()->flash('success', 'Company added successfully');
        $this->emit('companyAdded');
        $this->clearInputs();
    }

    public function render(): View
    {
        return view('livewire.companies.create');
    }
}
