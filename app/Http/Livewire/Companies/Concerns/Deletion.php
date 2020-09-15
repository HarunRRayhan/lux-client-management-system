<?php


namespace App\Http\Livewire\Companies\Concerns;


use App\Models\Company;

trait Deletion
{

    public bool $confirmingCompanyDeletion = false;
    protected ?Company $deletingCompany = null;

    public function confirmCompanyDeletion( ?Company $company = null ): void
    {
        $this->deletingCompany = $company;

        $this->dispatchBrowserEvent( 'confirming-delete-company' );

        $this->confirmingCompanyDeletion = true;
    }

    public function deleteCompany( ?Company $company = null )
    {
        if ( $company ) {
            $company->delete();
        }

        $this->confirmingCompanyDeletion = false;
        $this->deletingCompany           = null;
    }
}
