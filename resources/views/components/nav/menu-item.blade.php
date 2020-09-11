<div {{$attributes->merge(['class' => 'border-solid border-b border-gray-600'])}} >
    <a
        class="px-4 py-3 flex items-center items-center @if (request()->route()->named($route)) text-white bg-indigo-500 @else text-indigo-300 hover:text-white hover:bg-indigo-500 @endif"
        href="{{route($route)}}"
    >
        <x-dynamic-component component="icons.{{$icon}}" class="w-6 h-6 fill-current" />
{{--        <x-icons.{{$icon}} class="w-6 h-6 fill-current"/>--}}
        <span class="pl-2 ">{{$name}}</span>
    </a>
</div>
