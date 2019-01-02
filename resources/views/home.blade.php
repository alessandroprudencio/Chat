@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sobre</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bem vindo ao Chat Real Time desenvolvido por mim Alessandro Prudencio utilizando vuejs e laravel...
                    
                    @if(session('alert'))
                    <div class="alert alert-success">
                    {{  session('status')}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
