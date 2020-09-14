<?php

namespace App\Http\Livewire\Companies;

use App\Http\Livewire\Concerns\HasCompanyForm;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    use HasCompanyForm;

    public function addCompany()
    {
        $this->emit( 'companyAdded' );
//        session()->flash( 'success', 'Company added successfully' );
        $this->validate();
    }

    public function render(): View
    {
        return view( 'livewire.companies.create' );
    }
}
