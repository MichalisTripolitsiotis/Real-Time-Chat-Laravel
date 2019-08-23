@extends('layouts.app')

@section('content')
      <div class="container">
                <div class="col">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="media align-items-center">
                            <img alt="Image" src="https://source.unsplash.com/Nm70URdtf3c/336x336" style="width:20%; height:20%;" class="avatar avatar-sm" />
                            <div class="media-body">
                                <h6 class="mb-0 d-block">{{$users->name}}</h6>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-no-arrow" type="button" id="Button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-sm" aria-labelledby="Button">   
                                <a class="dropdown-item" href="#">Delete chat</a>
                            </div>
                        </div>
                    </div>
                    
                        
                   
                        <div class="card-body overflow-auto">
                            @foreach($conversation as $row)
                            @if ($row->user_one==$users->id) <br>
                        <div class="row justify-content-start">
                            <div class="col-auto">
                                <div class="card bg-secondary">
                                    <div class="card-body p-2">
                                        <p class="mb-0">
                                         {{$row->text}}
                                        </p>
                                        <div>
                                            <small class="opacity-60">{{$row->time}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else <br>
                        <div class="row justify-content-end text-right">
                            <div class="col-auto">
                                <div class="card bg-primary text-white">
                                    <div class="card-body p-2">
                                        <p class="mb-0">
                                          {{$row->text}}
                                        </p>
                                        <div>
                                            <i class="icon-check text-small"></i>
                                            <small class="opacity-60">{{$row->time}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                            <!--end of col-->
                        </div>
                    </div>
                   
                    
                    
                    <div class="card-footer">
                         
                        <form method="post" action="{{route("store")}}" class="d-flex align-items-center">
                             {{ csrf_field() }}
                        <input type="hidden" value="{{$users->id}}" name="usert"> 

                                <div class="input-group input-group-lg">
                                <input autocomplete="off" class="form-control" type="text" placeholder="Type a message" name="message" />
                            </div>
                            <button class="btn btn-info">
                            <span class="h5">Submit</span>
                            </button>
                        </form>
                    </div>
                    </div>
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
        </div>
    </section>
    
</div>    
      </div>
@endsection