@props(['tagsCsv'])

@php
// explode is splitting at the comma, and turning it into a variable called tagsCsv
$tags = explode(',', $tagsCsv);

@endphp

<ul class="flex">
  @foreach($tags as $tag)
  <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
    {{-- href here turns it into a query param --}}
    <a href="/?tag={{$tag}}">{{$tag}}</a>
  </li>
  @endforeach

</ul>
