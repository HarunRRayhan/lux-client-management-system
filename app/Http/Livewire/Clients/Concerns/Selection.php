<?php

namespace App\Http\Livewire\Clients\Concerns;

use App\Models\User;

trait Selection
{
    public bool $confirmingSelectedClientsDeletion = false;
    public array $checked = [];

    public function confirmSelectedClientsDeletion(): void
    {
        $this->dispatchBrowserEvent('confirming-delete-selected-clients');

        $this->confirmingSelectedClientsDeletion = true;
    }

    public function deleteSelectedClients()
    {
        if ($this->checked) {
            User::role('client')->whereIn('id', $this->checked)->delete();
            session()->flash('success', 'Selected clients deleted!');
        }

        $this->confirmingSelectedClientsDeletion = false;
        $this->checked = [];
    }
}
