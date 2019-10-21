@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Krasnodar
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($krasnodar, ['route' => ['krasnodars.update', $krasnodar->id], 'method' => 'patch']) !!}

                        @include('krasnodars.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection