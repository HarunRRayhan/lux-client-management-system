<tr class="hover:bg-gray-100 focus-within:bg-gray-100">
    <td class="border-t">
        <a
            href="{{route('clients.companies.show', $company)}}"
            class="pl-4 pr-1 py-4 flex items-center group"
            title="View Company"
        >
            <x-icons.view class="w-5 h-5 fill-gray-600 group-hover:fill-green-600"/>
        </a>
    </td>
    <td class="border-t">
        <a
            href="{{route('clients.companies.show', $company)}}"
            class="px-1 py-4 flex items-center group"
            title="Edit Company"
        >
            <x-icons.edit class="w-5 h-5 fill-gray-600 group-hover:fill-lux-600"/>
        </a>
    </td>
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
            class="pl-1 pr-4 py-4 flex justify-center group"
            title="Delete Company"
        >
            <x-icons.trash class="block w-5 h-5 fill-gray-600 group-hover:fill-red-600"/>
        </a>
    </td>
</tr>
