@props(['company' => null])

<x-slot name="form">
    <!-- Name -->
    <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="name" value="Company Name"/>
        <input
            type="text"
            id="name"
            class="form-input rounded-md shadow-sm mt-1 block w-full @error('name') border-red-400 @enderror"
            wire:model.defer="name"
        >
        <x-jet-input-error for="name" class="mt-2"/>
    </div>

    <div class="flex col-span-6">
        <!-- VAT -->
        <div class="flex-1 mr-1">
            <x-jet-label for="vat_number" value="VAT Number"/>
            <input
                type="text"
                id="vat_number"
                class="form-input rounded-md shadow-sm mt-1 block w-full @error('vat') border-red-400 @enderror"
                wire:model.defer="vat"
            >
            <x-jet-input-error for="vat" class="mt-2"/>
        </div>

        <!-- Website -->
        <div class="flex-1 ml-1">
            <x-jet-label for="website" value="Website"/>
            <input
                type="text"
                id="website"
                class="form-input rounded-md shadow-sm mt-1 block w-full @error('website') border-red-400 @enderror"
                wire:model.defer="website"
            >
            <x-jet-input-error for="website" class="mt-2"/>
        </div>
    </div>

    <div class="flex col-span-6">
        <!-- Phone -->
        <div class="flex-1 mr-1">
            <x-jet-label for="phone" value="Phone Number"/>
            <input
                type="text"
                id="phone"
                class="form-input rounded-md shadow-sm mt-1 block w-full @error('phone') border-red-400 @enderror"
                wire:model.defer="phone"
            >
            <x-jet-input-error for="phone" class="mt-2"/>
        </div>

        <!-- Mobile -->
        <div class="flex-1 ml-1">
            <x-jet-label for="mobile" value="Mobile Number"/>
            <input
                type="text"
                id="mobile"
                class="form-input rounded-md shadow-sm mt-1 block w-full @error('mobile') border-red-400 @enderror"
                wire:model.defer="mobile"
            >
            <x-jet-input-error for="mobile" class="mt-2"/>
        </div>
    </div>

    <!-- Address -->
    <div class="block col-span-6">
        <h3 class="text-lg font-medium text-gray-900 border-b border-gray-200 mt-4">Address</h3>
    </div>

    <div class="flex col-span-6">
        <!-- Street -->
        <div class="flex-1 mr-1">
            <x-jet-label for="street" value="Street Address"/>
            <input
                type="text"
                id="street"
                class="form-input rounded-md shadow-sm mt-1 block w-full @error('street') border-red-400 @enderror"
                wire:model.defer="street"
            >
            <x-jet-input-error for="street" class="mt-2"/>
        </div>

        <!-- Line 2 -->
        <div class="flex-1 ml-1">
            <x-jet-label for="line_2" value="Line 2"/>
            <input
                type="text"
                id="line_2"
                class="form-input rounded-md shadow-sm mt-1 block w-full @error('line_2') border-red-400 @enderror"
                wire:model.defer="line_2"
            >
            <x-jet-input-error for="line_2" class="mt-2"/>
        </div>
    </div>

    <div class="flex col-span-6">
        <!-- City -->
        <div class="flex-1 mr-1">
            <x-jet-label for="city" value="City"/>
            <input
                type="text"
                id="city"
                class="form-input rounded-md shadow-sm mt-1 block w-full @error('city') border-red-400 @enderror"
                wire:model.defer="city"
            >
            <x-jet-input-error for="city" class="mt-2"/>
        </div>

        <!-- State -->
        <div class="flex-1 ml-1">
            <x-jet-label for="state" value="State/Province"/>
            <input
                type="text"
                id="state"
                class="form-input rounded-md shadow-sm mt-1 block w-full @error('state') border-red-400 @enderror"
                wire:model.defer="state"
            >
            <x-jet-input-error for="state" class="mt-2"/>
        </div>
    </div>

    <div class="flex col-span-6">
        <!-- Country -->
        <div class="flex-1 mr-1">
            <x-jet-label for="country" value="Country"/>
            <select
                class="w-full form-select mt-1 @error('country') border-red-400 @enderror"
                wire:model="country"
            >
                @foreach(get_countries() as $country)
                    <option value="{{$country}}"
                            @if (optional($company)->country === $country) selected @endif
                    >{{$country}}</option>
                @endforeach
            </select>
            <x-jet-input-error for="country" class="mt-2"/>
        </div>

        <!-- ZIP Code -->
        <div class="flex-1 ml-1">
            <x-jet-label for="zip" value="ZIP / Postal Code"/>
            <input
                type="text"
                id="zip"
                class="form-input rounded-md shadow-sm mt-1 block w-full @error('zip') border-red-400 @enderror"
                wire:model.defer="zip"
            >
            <x-jet-input-error for="zip" class="mt-2"/>
        </div>
    </div>

    <!-- Terms & Conditions -->
    <div class="block col-span-6">
        <h3 class="text-lg font-medium text-gray-900 border-b border-gray-200 mt-4">Terms & Conditions</h3>
    </div>

    <div class="col-span-6">
        <div class="">
            <input id="terms" type="hidden" name="terms" wire:model.defer="terms">
            <div class="editor" wire:ignore>
                <trix-editor
                    input="terms"
                    class="h-64 w-full overflow-x-scroll formatted-content"
                    x-data
                    x-on:trix-change="$dispatch('input', event.target.value)"
                    wire:model.defer="terms"
                    wire:key="terms"
                ></trix-editor>
            </div>
            <x-jet-input-error for="terms" class="mt-2"/>
        </div>
    </div>

</x-slot>
