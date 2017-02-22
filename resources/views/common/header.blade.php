<a href="{{route('admin.login')}}">Администратор</a>

@if(Auth::check())
<a href="{{route('admin.logout')}}">Выйти</a>
    @endif
