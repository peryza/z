@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dinamo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dinamo, ['route' => ['dinamos.update', $dinamo->id], 'method' => 'patch']) !!}

                        @include('dinamos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection