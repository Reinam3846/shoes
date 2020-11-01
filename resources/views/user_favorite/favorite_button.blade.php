@if (Auth::shoe()->is_favorites($shoe->id))
    {{-- アンフェイバリットボタンのフォーム --}}
    {!! Form::open(['route' => ['favorites.unfavorite', $shoe->id], 'method' => 'delete'])!!}
      {!! Form::button('Unfavorite', ['class' => "btn btn-dark btn-sm"]) !!}
    {!! Form::close() !!}    
@else
    {{-- フェイバリットボタンのフォーム --}}
    {!! Form::open(['route' => ['favorites.favorite', $shoe->id]])!!}
      {!! Form::button('Favorite', ['class' => "btn btn-danger btn-sm"])!!}
    {!! Form::close() !!}
@endif
