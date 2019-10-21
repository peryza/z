@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sochi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sochi, ['route' => ['sochis.update', $sochi->id], 'method' => 'patch']) !!}

                        @include('sochis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection