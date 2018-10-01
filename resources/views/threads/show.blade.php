@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ $thread->title }}</div>

                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach ($thread->replies as $reply)
                    <div class="card" style="margin-top: 2em;">
                        <div class="card-header">
                            <a href="javascript:void(0)">{{ $reply->owner->name }}</a> said
                            {{ $reply->created_at->diffForHumans() }}</div>

                        <div class="card-body">
                            {{ $reply->body }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
