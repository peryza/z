<!-- Model Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Model', 'Model:') !!}
    {!! Form::text('Model', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cars.index') !!}" class="btn btn-default">Cancel</a>
</div>
