@extends('section')
@yield('content', 'home')
<p>Update User: <a href={{route('user.update')}}>{{Session::get('name')}}</a></p>
