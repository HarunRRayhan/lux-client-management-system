<!-- Delete Client Confirmation Modal -->
<x-jet-dialog-modal wire:model="confirmingSelectedClientsDeletion">
    <x-slot name="title">
        Delete Selected Clients
    </x-slot>

    <x-slot name="content">
        Are you sure you want to delete all selected companies? Once deleted you can not get back those companies?.
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button
            wire:click="$toggle('confirmingSelectedClientsDeletion')"
            wire:loading.attr="disabled"
        >
            Nevermind
        </x-jet-secondary-button>

        <x-jet-danger-button
            class="ml-2"
            wire:click="deleteSelectedClients"
            wire:loading.attr="disabled"
        >
            Delete Clients
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
