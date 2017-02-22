@extends('layouts.master')
@section('content')
    <style>
        .input__group label{
            text-align: left;
        }
    </style>
    @if(count($errors)>0)
        <section class="box__info">
            <ul class="box__info fail">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach

            </ul>

        </section>
    @endif
    @if(Session::has('fail'))
        <section class="box__info">
            <ul class="box__info fail">
                {{Session::get('fail')}}

            </ul>
        </section>
    @endif
<form action="{{route('admin.login')}}" method="post">
    <div class="input__group">
        <label for="name">Ваше имя:</label>
        <input class="input__group_btn" type="text" name="name" id="name" placeholder="Введите имя">
    </div>
    <div class="input__group">
        <label for="password">Ваш пароль:</label>
        <input class="input__group_btn" type="password" name="password" id="password" placeholder="Введите пароль">
    </div>
    <button type="submit">Войти</button>
    <input type="hidden" name="_token" value="{{ Session::token() }}">
</form>
    @endsection