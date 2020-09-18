@props(['clients', 'deleting', 'checked', 'search'])

<div>
    <x-pop-notifications/>

    <x-client.list.top-bar :checked="$checked" :search="$search"/>
    <div class="bg-white rounded shadow overflow-x-auto">
        <table
            class="w-full whitespace-no-wrap"
            x-data="{ selectAll: false }"
        >
            <x-client.list.head/>
            @each('components.client.list.item', $clients, 'client', 'components.client.list.empty')
        </table>
    </div>

    <div class="mt-4">
        {{$clients->links()}}
    </div>

    <x-client.list.delete-item :client="$deleting"/>
</div>
