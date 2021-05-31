<div class="form-group">
    <label for="exampleInputname">Nombres</label>
    {!! Form::text('names', $array_data['names'] ?? null, ['required'=>'true','class'=>'form-control']) !!}
</div>
<div class="form-group">
    <label for="exampleInputname">Apellidos</label>
    {!! Form::text('last_names', $array_data['last_names'] ?? null, ['required'=>'true','class'=>'form-control']) !!}
</div>
<div class="form-group">
    <label for="exampleInputname">Tipo de documento</label>
    {!! Form::select('type_document_id', $type_docs ?? [], $array_data['type_document_id'] ?? null, ['required'=>'true','class'=>'form-control']) !!}
</div>
<div class="form-group">
    <label for="exampleInputname">Número de documento </label>
    {!! Form::number('number_document', $array_data['number_document'] ?? null, ['required'=>'true','class'=>'form-control']) !!}
</div>
<div class="form-group">
    <label for="exampleInputname">Fecha de nacimiento</label>
    {!! Form::date('birthday', $array_data['birthday'] ?? null, ['required'=>'true','class'=>'form-control']) !!}
</div>
<div class="form-group">
    <label for="exampleInputname">Email</label>
    {!! Form::email('email', $array_data['email'] ?? null, ['required'=>'true','class'=>'form-control', isset($array_data) ? 'disabled' :'']) !!}
</div>
<div class="form-group">
    <label for="exampleInputname">Contraseña</label>
    {!! Form::password('password', ['required'=>'true','class'=>'form-control awesome']) !!}
    <small>{{ isset($array_data) ? 'Por favor confirme la contraseña nuevamente' :'' }}</small>
</div>
