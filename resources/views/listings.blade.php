{{-- if using blade.php, you can clean it up without using php --}}
{{-- use laravel directives @if, @foreach --}}


<h1>
  {{$heading}}
</h1>

@if(count($listings) == 0)
  <p>No listings found.</p>
@endif

@foreach ($listings as $listing)
  <h2>
    <a href="/listings/{{$listing['id']}}">
    {{$listing['title']}}
    </a>
  </h2>
  <p>{{$listing['description']}} </p>
@endforeach
