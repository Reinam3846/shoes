@extends('layouts.app')

@section('content')

<div class="container">
<main role="main">

    <div class="container-fluid mt-0">
      <div class="mx-auto" style="max-width:1200px;">
       <div class="row mt-0">
        <img src="image/top_2.png" class="img-fluid w-100">
       </div>
      </div>
    </div> 
    
 <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        @forelse ($shoes as $shoe)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
             <div class="card img-thumbnail">
              <div class='card-img-top'><img class="d-block mx-auto"  src="image/{{ $shoe->image }}"></div>
              <div class="card-body">
                <h5 class="card-title">{{ $shoe->name }}</h5>
                <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                <p class="card-text">{{ $shoe->content }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> -->
              @if (Auth::check()) 
                @if (Auth::user()->is_favorites($shoe->id))
                    {{-- アンフェイバリットボタンのフォーム --}}
                    {!! Form::open(['route' => ['favorites.unfavorite', $shoe->id], 'method' => 'delete'])!!}
                      {!! Form::button('<i class="fas fa-heart"></i>', ['class' => "btn btn-danger btn-sm", 'type' => "submit"]) !!}
                    {!! Form::close() !!}
                @else
                    {{-- フェイバリットボタンのフォーム --}}
                    {!! Form::open(['route' => ['favorites.favorite', $shoe->id]])!!}
                      {!! Form::button('<i class="fas fa-heart"></i>', ['class' => "btn btn-secondary btn-sm", 'type' => "submit"])!!}
                    {!! Form::close() !!}
                @endif
              @else
                  <a href="{{ route('login') }}" class="btn btn-secondary btn-sm"><i class="fas fa-heart"></i></a>
              @endif
                  </div>
                </div>
              </div>
            </div>
         </div>
        </div>
        @empty
        <p>No Results</p>
        @endforelse
      </div>
       </div>
        </div>
      <ul class="pagination justify-content-center">
      {{-- ページネーションのリンク --}}
      {{ $shoes->links() }}
      </ul>
</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <!-- <a href="#">Back to top</a> -->
    
 <a href="#">BACK TO TOP</a>
    </p>
  </div>
</footer>

@endsection