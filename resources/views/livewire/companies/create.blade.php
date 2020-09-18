<div>
    <x-pop-notifications/>
    <x-breadcrumb
        links="{{route('clients.companies.index')}}|Clients,{{route('clients.companies.index')}}|Companies"
        title="Create"/>

    <x-form-section submit="addCompany" class="max-w-3xl">
        <x-slot name="title">
            Company Information
        </x-slot>

        <x-slot name="description">
            Add your company information.
        </x-slot>

        <x-form.company />

        <x-slot name="actions">

            <button class="flex items-center btn-lux" type="submit">Add Company</button>
        </x-slot>
    </x-form-section>
</div>
