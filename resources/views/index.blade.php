@extends('layouts.master')

@section('title')
Страница заметок
    @endsection

@section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    @endsection

@section('content')
    @if(!empty(Request::segment(1)))
        <section class="filter__bar">

                Отфильтрованые записи по имени автора <a href="{{route('index')}}">Показать все записи</a>
        </section>
        @endif
    @if(count($errors)>0)
        <section class="box__info">
            <ul class="box__info fail">
                @foreach($errors->all() as $error)
                      {{$error}}
                    @endforeach

            </ul>

        </section>
        @endif
    @if(Session::has('success'))
        <section class="box__info">
            <ul class="box__info success">
            {{Session::get('success')}}
            </ul>
        </section>
        @endif

<section class="quotes">

<h1 class="latest__quotes">Последние заметки</h1>
    @for($i=0; $i<count($quotes); $i++)
        <article class="quote{{$i % 3 === 0 ? ' first-in-line' : (($i + 1) %3 === 0 ? ' last-in-line' : '')}}">
            <div class="delete"><a href="{{route('delete', ['quote_id'=>$quotes[$i]->id])}}">x</a></div>
           {{$quotes[$i]->quote}}
            <div class="info">Автор: <a href="{{route('index', ['author'=>$quotes[$i]->author->name])}}">{{$quotes[$i]->author->name}}</a><br> Добавлена в: {{$quotes[$i]->created_at}}</div>
        </article>
        @endfor
<div class="pagination">
    @if($quotes->currentPage()!== 1)
        <a href="{{$quotes->previousPageUrl()}}"><span class="fa fa fa-caret-left"></span></a>
        @endif
    @if($quotes->currentPage() !== $quotes->lastPage()&& $quotes->hasPages())
            <a href="{{$quotes->nextPageUrl()}}"><span class="fa fa fa-caret-right"></span></a>
        @endif
</div>



</section>


    <section class="edit__quote">
<h1 class="add_quote">Добавить заметку</h1>
        <form action="{{route('create')}}" method="post">
            <div class="input__group">
                <label for="author">Ваше имя:</label>
                <input class="input__group_btn" type="text" name="author" id="author" placeholder="Введите имя">
            </div>
            <div class="input__group">
                <label for="email">Ваш E-mail:</label>
                <input class="input__group_btn" type="text" name="email" id="email" placeholder="Введите адрес почты">
            </div>
            <div class="input__group">
                <label for="quote">Ваша запись:</label>
                <textarea name="quote" id="quote" rows="6" placeholder="Введите текст"></textarea>
            </div>
            <button type="submit" class="button">Добавить</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </section>


    @endsection