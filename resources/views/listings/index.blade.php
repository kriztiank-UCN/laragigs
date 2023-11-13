{{-- index - Show all listings --}}
<x-layout>
@include('partials._hero')
@include('partials._search')

<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>

@if (count($listings) < 1)
    <p>There are no listings</p>
@endif

@foreach ($listings as $listing)
{{-- bind a variable to the listing prop from listing-card --}}
<x-listing-card :listing="$listing" />

@endforeach

</div>

<div class="mt-6 p-4">
    {{$listings->links()}}
  </div>
</x-layout>