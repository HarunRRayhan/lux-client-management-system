<?php

namespace App\Http\Livewire\Clients;

use App\Http\Livewire\Clients\Concerns\HasClientForm;
use App\Models\Company;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    use HasClientForm;

    public function render(): View
    {
        return view('livewire.clients.create', [
            'companies' => Company::whereDoesntHave('owner')->get(),
        ]);
    }
}
