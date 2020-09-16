@props(['on', 'type' => 'success'])

<div class="flex items-center justify-center max-w-3xl h-auto">
    <button x-data="{}"
            @click="$dispatch('notice', {type: 'success', text: '🔥 Updated Blah blah successfully!'})"
            class="m-4 bg-green-500 text-lg font-bold p-6 py-2 text-white shadow-md rounded">
        Updated
    </button>
    <button x-data="{}"
            @click="$dispatch('notice', {type: 'info', text: 'ᕦlong text goes here with blah blah 😒 '})"
            class="m-4 bg-blue-500 text-lg font-bold p-6 py-2 text-white shadow-md rounded">
        Info
    </button>
    <button x-data="{}"
            @click="$dispatch('notice', {type: 'warning', text: '⚡ Warning'})"
            class="m-4 bg-orange-500 text-lg font-bold p-6 py-2 text-white shadow-md rounded">
        Warning
    </button>
    <button x-data="{}"
            x-on:click="$dispatch('notice', {type: 'error', text: '😵 Error!'})"
            class="m-4 bg-red-500 text-lg font-bold p-6 py-2 text-white shadow-md rounded">
        Error
    </button>
</div>

<div class="hidden" x-data
     {{--     x-on:{{$on}}="$dispatch('notice', {type: '{{$type}}', text: 'ᕦlong text goes here with blah blah 😒 '})"--}}
{{--     x-on:{{$on}}="alert('Here I am')"--}}
    $wire:{{$type}}=""
>&nbsp;
</div>

<div
    x-data="noticesHandler()"
    class="fixed inset-0 flex flex-col-reverse items-end justify-start h-screen w-screen"
    @notice.window="add($event.detail)"
    style="pointer-events:none">
    <template x-for="notice of notices" :key="notice.id">
        <div
            x-show="visible.includes(notice)"
            x-transition:enter="transition ease-in duration-200"
            x-transition:enter-start="transform opacity-0 translate-y-2"
            x-transition:enter-end="transform opacity-100"
            x-transition:leave="transition ease-out duration-500"
            x-transition:leave-start="transform translate-x-0 opacity-100"
            x-transition:leave-end="transform translate-x-full opacity-0"
            @click="remove(notice.id)"
            class="px-4 rounded mb-4 mr-6 w-80 h-16 flex items-center justify-center text-white shadow-lg text-lg cursor-pointer"
            :class="{
				'bg-green-500': notice.type === 'success',
				'bg-blue-500': notice.type === 'info',
				'bg-orange-500': notice.type === 'warning',
				'bg-red-500': notice.type === 'error',
			 }"
            style="pointer-events:all"
            x-text="notice.text">
        </div>
    </template>
</div>

@push('scripts')
    <script>
        function noticesHandler() {
            return {
                notices: [],
                visible: [],
                add(notice) {
                    notice.id = Date.now()
                    this.notices.push(notice)
                    this.fire(notice.id)
                },
                fire(id) {
                    this.visible.push(this.notices.find(notice => notice.id == id))
                    const timeShown = 2000 * this.visible.length
                    setTimeout(() => {
                        this.remove(id)
                    }, timeShown)
                },
                remove(id) {
                    const notice = this.visible.find(notice => notice.id == id)
                    const index = this.visible.indexOf(notice)
                    this.visible.splice(index, 1)
                },

            };
        }

        Livewire.on('success', message => {
            // alert(message);
            const event = new Event('notice');
            window.dispatchEvent(event,  `{type: 'success', text: '🔥 Updated Blah blah successfully!'}`)
        });
    </script>
@endpush
