@props(['companies'])

<div>
    <x-company.list.top-bar/>
    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <x-company.list.head/>
            @each('components.company.list.item', $companies, 'company', 'components.company.list.empty')
        </table>
    </div>

    <div class="mt-4">
        {{$companies->links()}}
    </div>
</div>
