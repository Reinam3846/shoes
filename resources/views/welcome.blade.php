@extends('layouts.app')

@section('content')
 @if (Auth::check())
        {{ Auth::user()->name }}
    @else
    <div class="center jumbotron">
        <div class="text-center">
            
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-info']) !!}
        </div>
    </div>
@endif    
@endsection