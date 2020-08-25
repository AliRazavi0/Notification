@extends('partial')

@section('title')
    {{ __('title.login') }}
@endsection

@section('content')

    <form action="/login" method="POST">
        @csrf
        <input type="text" name="name" id="name" placeholder="{{ __('input.placeholder', ['input' => 'نام']) }}"
            value="{{ old('name') }}">
        <input type="password" name="password" id="password"
            placeholder="{{ __('input.placeholder', ['input' => 'پسورد']) }}" value="{{ old('password') }}">
        <button>
            {{ __('public.login') }}
        </button>
    </form>

@endsection
