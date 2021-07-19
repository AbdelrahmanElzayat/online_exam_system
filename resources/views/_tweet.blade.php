<div class="d-flex p-4 {{ $loop->last ? '' : 'border-bottom' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="#">
            <img src="{{ $tweet->user->avatar }}" alt="" class="rounded-circle mr-2" width="50" height="50">
        </a>
    </div>
    <div style="position: relative; width:100%" class="text-left">

        <div class="d-flex justify-content-between" style="width: 100%">
            <h4 class=" mb-4 text-left text-dark">
                {{-- <a class="font-bold" href="{{route('profile', $tweet->user)}}"> --}}
                <a class="font-bold text-dark" href="#">
                    {{ $tweet->user->name }}
                </a>
                <p class='font-weight-lighter special-time text-muted'>{{ $tweet->created_at->diffForHumans() }}</p>
            </h4>
            @if ($tweet->user->id != auth()->user()->id)
                <div>
                    <a class="btn  d-flex" href="/chat/{{ $tweet->user->id }}">
                        <span class="material-icons mr-2">
                            comment
                            </span>
                        <span class="font-weight-bold d-inline-block">Private Chat {{$tweet->user->name}}</span>
                    </a>
                </div>
            @endif
        </div>


        <p class="body">
            {{ $tweet->body }}
        </p>
    </div>
</div>
