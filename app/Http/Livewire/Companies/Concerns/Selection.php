<?php


namespace App\Http\Livewire\Companies\Concerns;


use App\Models\Company;

trait Selection
{
    public bool $confirmingSelectedCompaniesDeletion = false;
    public array $checked = [];

    public function confirmSelectedCompaniesDeletion(): void
    {
        $this->dispatchBrowserEvent( 'confirming-delete-selected-companies' );

        $this->confirmingSelectedCompaniesDeletion = true;
    }

    public function deleteSelectedCompanies()
    {
        if ( $this->checked ) {
            Company::whereIn( 'id', $this->checked )->delete();
        }

        $this->confirmingSelectedCompaniesDeletion = false;
        $this->checked                             = [];
    }
}
