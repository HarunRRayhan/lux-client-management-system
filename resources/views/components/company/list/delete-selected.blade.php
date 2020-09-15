<!-- Delete Company Confirmation Modal -->
<x-jet-dialog-modal wire:model="confirmingSelectedCompaniesDeletion">
    <x-slot name="title">
        Delete Selected Companies
    </x-slot>

    <x-slot name="content">
        Are you sure you want to delete all selected companies? Once deleted you can not get back those companies?.
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button
            wire:click="$toggle('confirmingSelectedCompaniesDeletion')"
            wire:loading.attr="disabled"
        >
            Nevermind
        </x-jet-secondary-button>

        <x-jet-danger-button
            class="ml-2"
            wire:click="deleteSelectedCompanies"
            wire:loading.attr="disabled"
        >
            Delete Companies
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
