@extends('layouts.app')

@section('content')
   <div class="container-fluid">
     <div class="">
       <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">Search Results</h1>
       </div> 
     </div>
   </div>
   
        {{-- 検索結果 --}}
        @include('shoes.index', ['shoe' => $search]) 
        
    
   
    
@endsection