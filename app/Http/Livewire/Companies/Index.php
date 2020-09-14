<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view( 'livewire.companies.index', [
            'companies' => Company::with( 'address' )->paginate( 10 ),
        ] );
    }
}
