@props(['client'])

@if ($client)
    <div class="">
        <!-- Delete Client Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingClientDeletion">
            <x-slot name="title">
                Delete "{{$client->full_name}}" Client
            </x-slot>

            <x-slot name="content">
                Are you sure you want to delete the client? Once deleted you can not get back the client.
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button
                    wire:click="$toggle('confirmingClientDeletion')"
                    wire:loading.attr="disabled"
                >
                    Nevermind
                </x-jet-secondary-button>

                <x-jet-danger-button
                    class="ml-2"
                    wire:click="deleteClient({{$client}})"
                    wire:loading.attr="disabled"
                >
                    Delete Client
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
@endif
