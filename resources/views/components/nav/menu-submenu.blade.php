<div {{$attributes->merge(['class' => 'border-solid border-b border-gray-600'])}}
     x-data="{ open: @if (request()->route()->named($active)) true @else false @endif}"
>
    <a
        class="px-4 py-3 flex items-center @if (request()->route()->named($route)) text-white bg-indigo-500 @else text-indigo-300 hover:text-white hover:bg-indigo-500 @endif"
        href="{{route($route)}}"
    >
        <x-dynamic-component component="icons.{{$icon}}" class="w-6 h-6 fill-current"/>
        {{--        <x-icons.{{$icon}} class="w-6 h-6 fill-current"/>--}}
        <span class="flex-auto pl-2">{{$name}}</span>
        <span
            class="p-1 bg-lux-800 rounded border border-solid border-gray-600 hover:bg-indigo-200 hover:text-gray-700"
            @click.prevent="open = !open"
        >
            <template x-if="open">
                <x-icons.up class="w-4 h-4 fill-current"/>
            </template>
            <template x-if="!open">
                <x-icons.down class="w-4 h-4 fill-current"/>
            </template>

        </span>
    </a>
    <div x-show="open"
         style="display: none"
         class=""
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
    >
        {{$slot}}
    </div>
</div>
