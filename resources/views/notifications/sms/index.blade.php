@extends('layouts.layout')
@section('title', __('title.notification.sms'))

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
                  <div class="card-header">@lang('title.notification.sms')</div>
                  <div class="card-body">
                      <form action="{{route('notifiction.send.sms')}}" method="POST">
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
                              <label for="message">{{__('input.notification.sms')}}</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="{{__('input.placeholder',['input'=>'متن پیام کوتاه'])}}"></textarea>
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
