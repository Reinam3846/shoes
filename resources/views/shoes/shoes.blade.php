 <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">

@forelse($favorites as $favorite_shoe)
<div class="col-md-4">
      <div class="card mb-4 shadow-sm">
         <div class="card img-thumbnail">
          <div class='card-img-top'><img class="d-block mx-auto"  src="{{ asset('image/' . $favorite_shoe->image) }}"></div>
          <div class="card-body">
            <h5 class="card-title">{{ $favorite_shoe->name }}</h5>
            <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
            <p class="card-text">{{ $favorite_shoe->content }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                 @if (Auth::user()->is_favorites($favorite_shoe->id))
                    {{-- アンフェイバリットボタンのフォーム --}}
                    {!! Form::open(['route' => ['favorites.unfavorite', $favorite_shoe->id], 'method' => 'delete'])!!}
                      {!! Form::button('<i class="fas fa-heart"></i>', ['class' => "btn btn-danger btn-sm", 'type' => "submit"]) !!}
                    {!! Form::close() !!}
                @else
                    {{-- フェイバリットボタンのフォーム --}}
                    {!! Form::open(['route' => ['favorites.favorite', $favorite_shoe->id]])!!}
                      {!! Form::button('<i class="fas fa-heart"></i>', ['class' => "btn btn-secondary btn-sm", 'type' => "submit"])!!}
                    {!! Form::close() !!}
                @endif<!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> -->
              </div>
            </div>
          </div>
        </div>
     </div>
    </div>
@empty
    <p>You don't have your FAVORITES your shoes yet</p>
@endforelse
</div>
