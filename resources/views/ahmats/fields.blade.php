<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Age Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Age', 'Age:') !!}
    {!! Form::text('Age', null, ['class' => 'form-control']) !!}
</div>

<!-- Work Foot Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Work_Foot', 'Work Foot:') !!}
    {!! Form::text('Work_Foot', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ahmats.index') !!}" class="btn btn-default">Cancel</a>
</div>
