@props(['links', 'title'])

<h2 class="mb-8 font-bold text-xl">
    @foreach(explode(',', $links ) as $link)
        @php
            $parts = explode('|', $link)
        @endphp
        <a href="{{$parts[0]}}"
           class="text-lux-400 hover:text-lux-600"
        >@if ($parts[1]) {{$parts[1]}} @else {{$title}} @endif</a>
        <span class="text-lux-400 font-medium">/</span>
    @endforeach
    <span>{{$title}}</span>
</h2>
