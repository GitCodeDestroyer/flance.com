@extends('layouts.app')

@section('content')
    <div>
        <router-view></router-view>
        <hr>
        <router-link to="/" exact>Home</router-link>
        <router-link :to="{ name: 'about' }">About</router-link>
    </div>
@endsection
