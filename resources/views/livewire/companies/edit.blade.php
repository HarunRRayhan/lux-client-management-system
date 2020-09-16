<div>
    <x-pop-notifications/>

    <x-form-section submit="updateCompany" class="max-w-3xl">
        <x-slot name="title">
            Update Company
        </x-slot>

        <x-slot name="description">
            Update your company information.
        </x-slot>

        <x-form.company :company="$company"/>

        <x-slot name="actions">
            <div class="w-full flex items-center justify-between">
                <button
                    tabindex="-1"
                    type="button"
                    class="text-red-600 hover:underline"
                    wire:click.prevent="confirmCompanyDeletion({{$company}})"
                    wire:loading.attr="disabled"
                >Delete Contact
                </button>
                <button class="flex items-center btn-lux" type="submit">Update Company</button>
            </div>
        </x-slot>

    </x-form-section>

    <x-company.list.delete-item :company="$company"/>
</div>

