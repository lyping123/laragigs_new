<h1>{{  $heading  }}</h1>
@unless (count($listings)==0)

    @foreach($listings as $listing)
        
        <a href="/listing/{{$listing["id"]}}">{{ $listing["title"] }}</a>
        <li>{{ $listing["description"] }}</li>
    {{-- <x-listing-card :listing="$listing" /> --}}

    @endforeach

@else
    <p>No listing found</p>
@endunless
