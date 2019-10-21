@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dog
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dog, ['route' => ['dogs.update', $dog->id], 'method' => 'patch']) !!}

                        @include('dogs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection