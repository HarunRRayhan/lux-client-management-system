@props(['client' => null, 'companies'])

<x-slot name="form">
    <div class="flex col-span-6">
        <!-- First Name -->
        <div class="flex-1 mr-1">
            <x-jet-label for="first_name" value="First Name"/>
            <input
                type="text"
                id="first_name"
                class="form-input rounded-md shadow-sm mt-1 block w-full @error('first_name') border-red-400 @enderror"
                wire:model.defer="first_name"
            >
            <x-jet-input-error for="first_name" class="mt-2"/>
        </div>

        <!-- Last Name -->
        <div class="flex-1 ml-1">
            <x-jet-label for="last_name" value="Last Name"/>
            <input
                type="text"
                id="last_name"
                class="form-input rounded-md shadow-sm mt-1 block w-full @error('last_name') border-red-400 @enderror"
                wire:model.defer="last_name"
            >
            <x-jet-input-error for="last_name" class="mt-2"/>
        </div>
    </div>

    <div class="flex col-span-6">
        <!-- Email -->
        <div class="flex-1 mr-1">
            <x-jet-label for="email" value="Email Address"/>
            <input
                type="email"
                id="email"
                class="form-input rounded-md shadow-sm mt-1 block w-full @error('email') border-red-400 @enderror"
                wire:model.defer="email"
            >
            <x-jet-input-error for="email" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="flex-1 ml-1">
            <x-jet-label for="password" value="Password"/>
            <input
                type="password"
                id="password"
                class="form-input rounded-md shadow-sm mt-1 block w-full @error('password') border-red-400 @enderror"
                wire:model.defer="password"
            >
            <x-jet-input-error for="password" class="mt-2"/>
        </div>
    </div>


    <div class="flex col-span-6">
        <!-- Country -->
        <div class="flex-1 mr-1">
            <x-jet-label for="company_id" value="Company"/>
            <select
                id="company_id"
                class="w-full form-select mt-1 @error('company_id') border-red-400 @enderror"
                wire:model="company_id"
            >
                <option value="" @if (!optional($client)->company) selected @endif>No Company</option>
                @foreach($companies as $company)
                    <option value="{{$company->id}}"
                            @if (optional(optional($client)->company)->id === $company->id) selected @endif
                    >{{$company->name}}</option>
                @endforeach
            </select>
            <x-jet-input-error for="company_id" class="mt-2"/>
        </div>

    </div>

</x-slot>
