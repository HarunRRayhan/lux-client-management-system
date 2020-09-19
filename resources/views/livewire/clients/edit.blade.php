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
            <button class="flex items-center btn-lux" type="submit">Update Client</button>
        </x-slot>
    </x-form-section>
</div>
