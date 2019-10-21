@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Firm
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($firm, ['route' => ['firms.update', $firm->id], 'method' => 'patch']) !!}

                        @include('firms.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection