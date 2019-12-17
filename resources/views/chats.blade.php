@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul>
                @foreach($chats as $chat)
                    <li class="">
                        <a href="{{ $chat->url() }}">
                            @if (isset($chat->title))
                                <span class="">{{ $chat->title }}</span>
                                <br>
                            @else
                                <span class="">Chat com {{$chat->users->count()}}</span>
                            @endif
                        </a>
                        <br>
                        @if (isset($chat->description))
                            <span class="small">
                                {{ $chat->description }}
                            </span>
                        @else
                            <span class="small">
                                @foreach ($chat->users as $user)
                                    {{$user->name}},
                                @endforeach
                            </span>
                        @endif
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection
