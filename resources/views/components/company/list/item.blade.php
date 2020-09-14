<tr class="hover:bg-gray-100 focus-within:bg-gray-100">
    <td class="border-t">
        <a
            href="{{route('clients.companies.show', $company)}}"
            class="px-6 py-4 flex items-center focus:text-lux-500"
        >
            {{$company->name}}
        </a>
    </td>
    <td class="border-t">
        <a
            tabindex="-1"
            href="{{route('clients.companies.show', $company)}}"
            class="px-6 py-4 flex items-center"
        >
            <div>
                {{$company->address->city}}
            </div>
        </a>
    </td>
    <td class="border-t">
        <a
            tabindex="-1"
            href="{{route('clients.companies.show', $company)}}"
            class="px-6 py-4 flex items-center"
        >
            {{$company->address->country}}
        </a>
    </td>
    <td class="border-t">
        <a
            tabindex="-1"
            href="{{route('clients.companies.show', $company)}}"
            class="px-6 py-4 flex items-center"
        >
            {{$company->phone}}
        </a>
    </td>
    <td class="border-t w-px">
        <a
            tabindex="-1"
            href="{{route('clients.companies.show', $company)}}"
            class="px-4 flex items-center"
        >
            <x-icons.right class="block w-6 h-6 fill-gray-400"/>
        </a>
    </td>
</tr>
