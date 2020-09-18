@props(['companies', 'deleting', 'checked', 'search'])
<div>
    <x-pop-notifications/>

    <x-company.list.top-bar :checked="$checked" :search="$search"/>
    <div class="bg-white rounded shadow overflow-x-auto">
        <table
            class="w-full whitespace-no-wrap"
            x-data="{ selectAll: false }"
        >
            <x-company.list.head/>
            @each('components.company.list.item', $companies, 'company', 'components.company.list.empty')
        </table>
    </div>

    <div class="mt-4">
        {{$companies->links()}}
    </div>

    <x-company.list.delete-item :company="$deleting"/>
</div>
