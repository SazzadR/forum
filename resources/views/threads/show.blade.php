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

        @include ('threads.reply')

        <div class="row justify-content-center" style="margin-top: 1.5em">
            @if (auth()->check())
                <div class="col-md-10">
                    <form method="POST" action="{{ $thread->path() . '/replies' }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" placeholder="Have something to say?"
                                      rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Post</button>
                    </form>
                </div>
            @else
                <p class="text-center">Please <a href="{{ route('login', ['redirect' => url()->current()]) }}">sign in</a> to participate in this
                    discussion.</p>
            @endif
        </div>
    </div>
@endsection
