@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @extends('layouts.app')

                    {{ __('You are logged in!') }}
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

<div class="container">
    <h1>Daftar Postingan</h1>
    <ul>
        @foreach($data as $d)
            <li>
                <h3>{{ $d->title }}</h3>
                <p>{{ $d->description }}</p>
            </li>
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="hidden" name="data_id" value="{{ $d->id }}">
                <textarea name="content" rows="3"></textarea>
                <button type="submit">Submit</button>
            </form>
    
            @foreach($d->comments as $comment) <!--Change this line-->
                <div>
                     <h5>{{ $comment->user->name }}</h5>
                     <p>{{ $comment->content }}</p>
                </div>
            @endforeach
        @endforeach
    </ul>
    
</div>
