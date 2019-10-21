@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rubin
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'rubins.store']) !!}

                        @include('rubins.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
