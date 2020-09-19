<?php

namespace App\Http\Livewire\Clients;

use App\Http\Livewire\Clients\Concerns\Deletion;
use App\Http\Livewire\Clients\Concerns\HasClientForm;
use App\Models\Company;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    use HasClientForm;
    use Deletion;

    public ?User $client;

    public ?Company $oldCompany;

    public function mount(User $client)
    {
        $client->loadMissing('company.address');
        $this->client = $client;
        $this->oldCompany = $client->company;
        $this->setClient();
    }

    public function render()
    {
        return view('livewire.clients.edit', [
            'client'    => $this->client,
            'companies' => Company::whereDoesntHave('owner')->get()->add($this->client->company)->filter(),
        ]);
    }

    public function updateClient()
    {
        $this->validate($this->updatedRules($this->client));

        $client = $this->client->update($this->getInputs());

        if ($this->company_id !== optional($this->oldCompany)->id) {
//            dd( $this->company_id );
            if ($this->company_id) {
                Company::find($this->company_id)->update([
                    'user_id' => $client->id,
                ]);
            }
            $this->oldCompany->update([
                'user_id' => null,
            ]);
        }

        session()->flash('success', 'Client updated successfully');
        $this->clearInputs();
    }

    public function deleteClient(?User $client = null)
    {
        $this->deleteAction($client);
        $this->redirect(route('clients.index'));
    }

    protected function setClient(): Edit
    {
        $this->first_name = $this->client->first_name;
        $this->last_name = $this->client->last_name;
        $this->email = $this->client->email;

        if ($this->client->company) {
            $this->company_id = $this->client->company->id;
        }

        return $this;
    }

    protected function updatedRules(User $client): array
    {
        return array_merge($this->rules, [
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($client),
                'max:256',
            ],
        ]);
    }

    protected function clearInputs()
    {
        $this->password = null;
    }
}
