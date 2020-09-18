<div>
    <x-pop-notifications/>
    <x-breadcrumb
        links="{{route('clients.index')}}|Clients"
        title="Add"/>
    <x-form-section submit="addClient" class="max-w-3xl">
        <x-slot name="title">
            Client's Information
        </x-slot>

        <x-slot name="description">
            Add your new client.
        </x-slot>

        <x-form.client :companies="$companies"/>

        <x-slot name="actions">
            <button class="flex items-center btn-lux" type="submit">Add Client</button>
        </x-slot>
    </x-form-section>
</div>
