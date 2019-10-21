@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Orenburg
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($orenburg, ['route' => ['orenburgs.update', $orenburg->id], 'method' => 'patch']) !!}

                        @include('orenburgs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection