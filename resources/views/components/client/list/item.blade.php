<tr class="hover:bg-gray-100 focus-within:bg-gray-100">
    <td class="border-t">
        <span class="pl-4 pr-2 py-4 flex items-center group">

        <input type="checkbox" value="{{$client->id}}" wire:model="checked">
        </span>
    </td>
    <td class="border-t">
        <a
            href="{{route('clients.show', $client)}}"
            class="px-1 py-4 flex items-center group"
            title="View Client"
        >
            <x-icons.view class="w-5 h-5 fill-gray-600 group-hover:fill-green-600"/>
        </a>
    </td>
    <td class="border-t">
        <a
            href="{{route('clients.edit', $client)}}"
            class="px-2 py-4 flex items-center group"
            title="Edit Client"
        >
            <x-icons.edit class="w-5 h-5 fill-gray-600 group-hover:fill-lux-600"/>
        </a>
    </td>
    <td class="border-t">
        <a
            href="{{route('clients.show', $client)}}"
            class="px-6 py-4 flex items-center focus:text-lux-500"
        >
            {{$client->full_name}}
        </a>
    </td>
    <td class="border-t">
        <a
            tabindex="-1"
            href="{{route('clients.show', $client)}}"
            class="px-6 py-4 flex items-center"
        >
            <div>
                {{$client->email}}
            </div>
        </a>
    </td>
    <td class="border-t">
        @if ($client->company)
            <a
                tabindex="-1"
                href="{{route('clients.companies.edit', $client->company)}}"
                class="px-6 py-4 flex items-center"
            >
                {{$client->company->name}}
            </a>
        @else
            <a
                tabindex="-1"
                href="{{route('clients.show', $client)}}"
                class="px-6 py-4 flex items-center"
            >
                <x-label.not-assigned />
            </a>
        @endif
    </td>
    {{--    <td class="border-t">--}}
    {{--        <a--}}
    {{--            tabindex="-1"--}}
    {{--            href="{{route('clients.show', $client)}}"--}}
    {{--            class="px-6 py-4 flex items-center"--}}
    {{--        >--}}
    {{--            {{$client->phone}}--}}
    {{--        </a>--}}
    {{--    </td>--}}
    <td class="border-t w-px">
        <a
            tabindex="-1"
            href="#"
            class="pl-1 pr-4 py-4 flex justify-center group"
            title="Delete Client"
            wire:click.prevent="confirmClientDeletion({{$client}})"
            wire:loading.attr="disabled"
        >
            <x-icons.trash class="block w-5 h-5 fill-gray-600 group-hover:fill-red-600"/>
        </a>
    </td>
</tr>
