@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dinamo2
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dinamo2, ['route' => ['dinamo2s.update', $dinamo2->id], 'method' => 'patch']) !!}

                        @include('dinamo2s.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection