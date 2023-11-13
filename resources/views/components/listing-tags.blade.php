@props(['tagsCsv'])

{{-- use php directive to convert the CSV string into an array of tags --}}
@php
$tags = explode(',', $tagsCsv);
@endphp

<ul class="flex">
  @foreach($tags as $tag)
  <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
    <a href="/?tag={{$tag}}">{{$tag}}</a>
  </li>
  @endforeach
</ul>