<div>
    <x-alert.success></x-alert.success>
    <x-form-section submit="addCompany" class="max-w-3xl">
        <x-slot name="title">
            Company Information
        </x-slot>

        <x-slot name="description">
            Add your company information.
        </x-slot>

        <x-form.company />

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="companyAdded">
                Company added successfully.
            </x-jet-action-message>

            <button class="flex items-center btn-lux" type="submit">Add Company</button>
        </x-slot>
    </x-form-section>
</div>
