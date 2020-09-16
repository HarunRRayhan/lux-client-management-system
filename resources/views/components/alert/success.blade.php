@if (session()->has('success'))
    <div
        {{$attributes->merge(['class'=>'mb-3 flex items-center justify-between bg-green-400 rounded max-w-3xl'])}} x-data="{show: true}"
        x-show="show"
    >
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                 class="ml-4 mr-2 flex-shrink-0 w-4 h-4 fill-white">
                <polygon points="0 11 2 9 7 14 18 3 20 5 7 18"></polygon>
            </svg>
            <div class="py-4 text-white text-sm font-medium">{{session('success')}}</div>
        </div>
        <button type="button" class="group mr-2 p-2">
            <x-icons.tick
                width="235.908"
                height="235.908"
                class="block w-2 h-2 fill-green-800 group-hover:fill-white"
                @click="show = false"
            />
        </button>
    </div>
@endif
