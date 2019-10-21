@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ahmat
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ahmat, ['route' => ['ahmats.update', $ahmat->id], 'method' => 'patch']) !!}

                        @include('ahmats.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection