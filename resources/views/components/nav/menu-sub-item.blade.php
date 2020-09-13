<div {{$attributes->merge(['class' => 'border-solid border-t border-gray-600'])}} >
    <a
        class="px-4 py-1 flex items-center items-center @if (request()->route()->named($route)) text-white bg-indigo-400 @else text-indigo-300 hover:text-white hover:bg-indigo-400 @endif"
        href="{{route($route)}}"
    >
        <span class="w-6">&nbsp;</span>
        <span class="pl-2">{{$name}}</span>
    </a>
</div>
