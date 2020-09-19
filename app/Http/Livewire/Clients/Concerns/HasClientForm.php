<?php

namespace App\Http\Livewire\Clients\Concerns;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait HasClientForm
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $company_id;

    protected array $rules = [
        'first_name' => 'required|string|max:256',
        'last_name'  => 'required|string|max:256',
        'email'      => 'required|unique:users,email|email|max:256',
        'password'   => 'nullable|string|min:8|max:256',
        'company_id' => 'nullable|integer|exists:companies,id',
    ];

    protected function getInputs(array $extra = []): array
    {
        $fillable = [
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'email'      => $this->email,
        ];

        if ($this->password) {
            $fillable['password'] = Hash::make($this->password);
        }

        return array_merge($fillable, $extra);
    }

    public function addClient()
    {
        $this->validate();

        $client = User::create($this->getInputs());
        $client->assignRole('client');

        if ($this->company_id) {
            Company::find($this->company_id)->update([
                'user_id' => $client->id,
            ]);
        }

        session()->flash('success', 'Client added successfully');
        $this->clearInputs();
    }

    protected function clearInputs()
    {
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->password = null;
        $this->company_id = null;
    }
}
