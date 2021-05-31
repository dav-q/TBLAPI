<div class="form-group">
    <label for="exampleInputname">Nombre</label>
    {!! Form::text('name', $array_data[0]['name'] ?? null, ['required'=>'true','class'=>'form-control','placeholder'=>'Cédula de ciudadanía']) !!}
</div>
<div class="form-group">
    <label for="exampleInputname">Nombre corto</label>
    {!! Form::text('short_name', $array_data[0]['short_name'] ?? null, ['required'=>'true','class'=>'form-control','placeholder'=>'C.C']) !!}
</div>

