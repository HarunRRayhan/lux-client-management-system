<div>
    <x-pop-notifications/>

    <x-form-section submit="updateCompany" class="max-w-3xl">
        <x-slot name="title">
            Update Company
        </x-slot>

        <x-slot name="description">
            Update your company information.
        </x-slot>

        <x-form.company :company="$company"/>

        <x-slot name="actions">
            <button class="flex items-center btn-lux" type="submit">Update Company</button>
        </x-slot>


    </x-form-section>
</div>

