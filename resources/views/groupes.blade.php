@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                @foreach($groupes as $g) 
                <div class="card-body">
                {{$g->id}} : {{$g->groupe}}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection