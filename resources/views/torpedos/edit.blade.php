@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Torpedo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($torpedo, ['route' => ['torpedos.update', $torpedo->id], 'method' => 'patch']) !!}

                        @include('torpedos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection