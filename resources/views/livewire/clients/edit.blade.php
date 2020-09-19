<div>
    <x-pop-notifications/>

    <x-breadcrumb
        links="{{route('clients.index')}}|Clients"
        title="{{$client->full_name}}"/>
    <x-form-section submit="updateClient" class="max-w-3xl">
        <x-slot name="title">
            Client's Information
        </x-slot>

        <x-slot name="description">
            Update information of the client.
        </x-slot>

        <x-form.client :companies="$companies"/>

        <x-slot name="actions">
            <div class="w-full flex items-center justify-between">
                <button
                    tabindex="-1"
                    type="button"
                    class="text-red-600 hover:underline"
                    wire:click.prevent="confirmClientDeletion({{$client}})"
                    wire:loading.attr="disabled"
                >Delete Client
                </button>
                <button class="flex items-center btn-lux" type="submit">Update Client</button>
            </div>
        </x-slot>
    </x-form-section>

    <x-client.list.delete-item :client="$client"/>
</div>
