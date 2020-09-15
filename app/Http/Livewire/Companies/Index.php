<?php

namespace App\Http\Livewire\Companies;

use App\Http\Livewire\Companies\Concerns\Deletion;
use App\Http\Livewire\Companies\Concerns\Selection;
use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use Selection;
    use Deletion;

    public int $paginate = 25;

    public string $search = '';

    public function render()
    {
        return view( 'livewire.companies.index', [
            'companies' => Company::query()
                                  ->with( 'address' )
                                  ->when( $this->search, function ( Builder $query, $search ) {
                                      $query->selectRaw( '*, match(name) against (? in BOOLEAN MODE) as score', [ $search ] )
                                            ->whereRaw( 'match(name) against(? in BOOLEAN MODE)', [ $search ] )
                                            ->orderBy( 'score', 'desc' );
                                  }, function ( Builder $query ) {
                                      $query->latest( 'created_at' );
                                  } )->paginate( $this->paginate ),
            'deleting'  => $this->deletingCompany,
            'checked'   => $this->checked,
            'search'    => $this->search,
        ] );
    }
}
