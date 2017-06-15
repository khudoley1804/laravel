@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
      
                    @foreach($users as $user)
                    
                        <h2>{{ $user->name }}</h2>
                    <p>ip - {{ Illuminate\Support\Facades\Cache::get('users#'.$user->id)['ip'] }}</p>
                    <p>time - {{ Illuminate\Support\Facades\Cache::get('users#'.$user->id)['time'] }}</p>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
