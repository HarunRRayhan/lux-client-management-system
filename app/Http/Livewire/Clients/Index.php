<?php

namespace App\Http\Livewire\Clients;

use App\Http\Livewire\Clients\Concerns\Deletion;
use App\Http\Livewire\Clients\Concerns\Selection;
use App\Models\User;
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
        return view('livewire.clients.index', [
            'clients'  => User::role('client')
                              ->with('company')
                              ->when($this->search, function (Builder $query, $search) {
                                  $query->selectRaw('*, match(first_name, last_name, email) against (? in BOOLEAN MODE) as score', [$search])
                                        ->whereRaw('match(first_name, last_name, email) against(? in BOOLEAN MODE)', [$search])
                                        ->orderBy('score', 'desc');
                              }, function (Builder $query) {
                                  $query->latest('created_at');
                              })->paginate($this->paginate),
            'deleting' => $this->deletingClient,
            'checked'  => $this->checked,
            'search'   => $this->search,
        ]);
    }
}
