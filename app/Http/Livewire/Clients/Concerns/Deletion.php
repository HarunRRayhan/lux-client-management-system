<?php

namespace App\Http\Livewire\Clients\Concerns;

use App\Models\User;

trait Deletion
{
    public bool $confirmingClientDeletion = false;
    protected ?User $deletingClient = null;

    public function confirmClientDeletion(?User $client = null): void
    {
        $this->deletingClient = $client;

        $this->dispatchBrowserEvent('confirming-delete-client');

        $this->confirmingClientDeletion = true;
    }

    public function deleteClient(?User $client = null)
    {
        $this->deleteAction($client);
    }

    protected function deleteAction(?User $client = null)
    {
        if ($client && $client->hasRole('client')) {
            $client->delete();
        }

        $this->confirmingClientDeletion = false;
        $this->deletingClient = null;

        session()->flash('success', 'Client Deleted Successfully');
    }
}
