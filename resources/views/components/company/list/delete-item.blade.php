@props(['company'])

@if ($company)
    <div class="">
        <!-- Delete Company Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingCompanyDeletion">
            <x-slot name="title">
                Delete "{{$company->name}}" Company
            </x-slot>

            <x-slot name="content">
                Are you sure you want to delete the company? Once deleted you can not get back the company.
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button
                    wire:click="$toggle('confirmingCompanyDeletion')"
                    wire:loading.attr="disabled"
                >
                    Nevermind
                </x-jet-secondary-button>

                <x-jet-danger-button
                    class="ml-2"
                    wire:click="deleteCompany({{$company}})"
                    wire:loading.attr="disabled"
                >
                    Delete Company
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
@endif
