@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Asd
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($asd, ['route' => ['asds.update', $asd->id], 'method' => 'patch']) !!}

                        @include('asds.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection