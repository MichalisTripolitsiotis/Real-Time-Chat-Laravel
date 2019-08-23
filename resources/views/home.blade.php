@extends('layouts.app')

@section('content')

                     
<div class="container">
    <div class="row">
      <div id="chat-sidebar" style="width:80%;">
        <div class="card col-sm-4 " style="overflow:auto;">
          <ul class="list-group list-group-flush">
            @foreach ($users as $user)
            <li class="list-group-item">
              <div id="sidebar-user-box" class="{{$user->id}}" >
                 <a href="{{ route('chat',$user->id) }}" id="addClass">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$user->name}}</h5>
                   
                </div>
                </a>  
              </div>
            </li>
           
            @endforeach
          </ul>
        </div>
      </div>
        
       
    </div>
</div>
<script>
   $(function(){
$("#addClass").click(function () {
          $('#qnimate').addClass('popup-box-on');
            });
          
            $("#removeClass").click(function () {
          $('#qnimate').removeClass('popup-box-on');
            });
  })
  </script>
@endsection
