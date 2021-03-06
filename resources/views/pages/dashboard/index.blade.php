@extends('layouts.fullscreen')

@section('title')
    @lang('title.dashboard')
@endsection

@section('content')
    <script>
        window.addEventListener('load', function() {
            const app = new Vue({
                el: '#app'
            });
        });
    </script>
    <div id="app">
        <events></events>
        <active-games></active-games>
    </div>
@endsection