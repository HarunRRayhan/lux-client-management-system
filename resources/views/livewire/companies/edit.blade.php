<div>
    <x-alert.success></x-alert.success>
    <x-form-section submit="updateCompany" class="max-w-3xl">
        <x-slot name="title">
            Update Company
        </x-slot>

        <x-slot name="description">
            Update your company information.
        </x-slot>

        <x-form.company/>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="companyUpdated">
                Updated company successfully.
            </x-jet-action-message>

            <button class="flex items-center btn-lux" type="submit">Update Company</button>
        </x-slot>
    </x-form-section>
</div>
