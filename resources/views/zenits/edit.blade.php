@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Zenit
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($zenit, ['route' => ['zenits.update', $zenit->id], 'method' => 'patch']) !!}

                        @include('zenits.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection