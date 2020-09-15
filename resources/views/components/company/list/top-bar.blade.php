@props(['checked', 'search'])

<div class="mb-6 flex justify-between items-center">
    <div class="flex items-center w-full max-w-md mr-4">
        @if (count($checked))
            <x-jet-dropdown align="left" width="48">
                <x-slot name="trigger">
                    <button
                        class="btn-dark group flex items-center shadow rounded mr-2 h-full focus:outline-none"
                    >Selected
                        ({{count($checked)}})
                        <x-icons.down class="ml-2 w-4 h-4 fill-white"/>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <a href="#"
                       class="block px-4 py-2 text-sm leading-5 text-red-600 hover:bg-red-500 hover:text-white focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                       wire:click.prevent="confirmSelectedCompaniesDeletion"
                       wire:loading.attr="disabled"
                    >Delete</a>
                </x-slot>
            </x-jet-dropdown>
        @endif
        <div class="flex w-full bg-white shadow rounded">
            <input
                autocomplete="off"
                type="search"
                name="search"
                placeholder="Search…"
                class="relative w-full px-6 py-3 rounded focus:shadow-outline"
                wire:model.debounce.650ms="search"
            >
        </div>
    </div>
    <a
        href="{{route('clients.companies.create')}}"
        class="btn-lux"
    >
        <span>Add</span>
        <span
            class="hidden md:inline"
        >Company</span>
    </a>
</div>

<x-company.list.delete-selected/>
