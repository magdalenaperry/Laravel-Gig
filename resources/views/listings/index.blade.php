{{-- if using blade.php, you can clean it up without using php --}}
{{-- use laravel directives @if, @foreach --}}

<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if(count($listings) == 0)
        <p>No listings found.</p>
        @endif

        @foreach ($listings as $listing)
        {{-- binds to the prop component --}}

        <x-listing-card :listing="$listing" />

        @endforeach

    </div>

</x-layout>
