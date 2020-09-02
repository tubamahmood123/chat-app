@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #212529;">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" style="background-color: #dee2e6;
    text-shadow: 0 0 1px black;
    color: #09294a;">We code Messenger</div>

                <div class="card-body" id='#app' style="padding: 0;">

                   <!--- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     
                    You are logged in!--->
                <chat-app :user="{{ auth()->user() }}"></chat-app>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
