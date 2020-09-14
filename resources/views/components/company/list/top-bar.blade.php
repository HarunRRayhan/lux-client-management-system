<div class="mb-6 flex justify-between items-center">
    <div class="flex items-center w-full max-w-md mr-4">
        <div class="flex w-full bg-white shadow rounded">
            <input
                autocomplete="off"
                type="text"
                name="search"
                placeholder="Search…"
                class="relative w-full px-6 py-3 rounded focus:shadow-outline"
            ></div>
        <button
            type="button"
            class="ml-3 text-sm text-gray-500 hover:text-gray-700 focus:text-indigo-500"
        >Reset
        </button>
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
