@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            U F A
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'uFAS.store']) !!}

                        @include('u_f_a_s.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
