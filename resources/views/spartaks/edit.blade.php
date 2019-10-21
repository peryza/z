@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Spartak
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($spartak, ['route' => ['spartaks.update', $spartak->id], 'method' => 'patch']) !!}

                        @include('spartaks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection