<header class="mb-0">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/"><img alt="SHOES" src="{{ asset('image/logo.png') }}"></img> SHOES</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        
        <div class="collapse navbar-collapse" id="nav-bar">
          <ul class="navbar-nav mr-auto"></ul>
           <ul class="navbar-nav">
            
                 
               <div class="form-inline"> 
              <div class="imput-group ">
                 {!! Form::open(['route' => 'shoes.search', 'method' => 'get']) !!}
                    {{ Form::text('search_word', $search ?? null , ['class' => "form-control", 'placeholder' => "Search this site"]) }}                      
                     {!! Form::button('<i class="fas fa-search"></i>',['class' => "btn btn-secondary btn", 'type' => "submit"]) !!}
                 {!! Form::close() !!}
                </div>
           
             
           
            
                
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- お気に入りページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.favorites', 'Favorites', ['id' => Auth::user()])!!}</li>
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                        </ul>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>