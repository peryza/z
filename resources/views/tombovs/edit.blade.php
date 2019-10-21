@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tombov
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tombov, ['route' => ['tombovs.update', $tombov->id], 'method' => 'patch']) !!}

                        @include('tombovs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection