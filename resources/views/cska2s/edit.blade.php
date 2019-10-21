@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cska2
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cska2, ['route' => ['cska2s.update', $cska2->id], 'method' => 'patch']) !!}

                        @include('cska2s.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection