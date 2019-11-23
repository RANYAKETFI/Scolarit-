@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                @foreach($groupes as $g) 
                <div class="card-body">
                {{$g->groupe}}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div id="example"></div>
<!--<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>-->

@endsection