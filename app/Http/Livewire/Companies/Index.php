<?php

namespace App\Http\Livewire\Companies;

use App\Http\Livewire\Companies\Concerns\Deletion;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use Deletion;

    public int $paginate = 25;

    public function render()
    {
        return view( 'livewire.companies.index', [
            'companies' => Company::with( 'address' )->paginate( $this->paginate ),
            'deleting'  => $this->deletingCompany,
        ] );
    }
}
