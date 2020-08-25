@extends('layouts.layout')
@section('title', __('title.notification.email'))

@section('content')
   <div class="container">
      <div class="row">
          <div class="col-md-8 m-auto">
              @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
              @endif

              @if(session('feild'))
                <div class="alert alert-danger">
                    {{session('feild')}}
                </div>
              @endif
              @if($errors->any())
               @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
               @endforeach
              @endif
              <div class="card">
                  <div class="card-header">@lang('title.notification.email')</div>
                  <div class="card-body">
                      <form action="{{route('notifiction.send.email')}}" method="POST">
                          @csrf
                          <div class="form-group">
                              <label for="user">{{__('input.notification.users')}}</label>
                              <select name="user" id="user" class="form-control">
                                  @foreach($users as $key=>$user)
                                      <option value="{{$user->id}}">{{$user->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="user">{{__('input.notification.email')}}</label>
                              <select name="type" id="user" class="form-control">
                                  @foreach($emailTypes as $key=>$type)
                                      <option value="{{$key}}">{{$type}}</option>
                                  @endforeach
                              </select>
                          </div>

                          <div class="form-group">
                              <button class="btn btn-primary" type="submit">ارسال</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
   </div>
@endsection
