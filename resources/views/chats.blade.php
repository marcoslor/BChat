@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul>
                @foreach($chats as $chat)
                    <li class="">
                        <a href="{{ $chat->url() }}">
                            <span class="">{{ $chat->title }}</span>
                            <br>
                        </a>
                        <span class="small">
                            {{ $chat->description }}
                        </span>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection
