<div class="d-flex p-4 {{$loop->last?'':'border-bottom'}}">
    <div class="mr-2 flex-shrink-0">
        {{-- <a href="{{route('profile', $tweet->user)}}"> --}}
        <a href="#">
            <img src="{{$tweet->user->avatar}}" alt="" class="rounded-circle mr-2" width="50" height="50">
        </a>
    </div>
    <div>
        <h4 class=" mb-4 text-left text-dark">
            {{-- <a class="font-bold" href="{{route('profile', $tweet->user)}}"> --}}
            <a class="font-bold text-dark" href="#">
                {{$tweet->user->name}}
            </a>
            <p class='font-weight-lighter special-time text-muted'>{{$tweet->created_at->diffForHumans()}}</p>
        </h5>    
        <p class="body">
            {{$tweet->body}}
        </p>
    </div>
</div>