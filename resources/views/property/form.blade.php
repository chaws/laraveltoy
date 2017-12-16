{!! Form::open(['url' => 'property/submit']) !!}
  @if(isset($prop))
  {{ Form::hidden('id', $prop->id) }}
  @endif
  <div class="form-group">
    {{ Form::label('name', 'Nome do Número') }}
    {{ Form::text('name', isset($prop) ? $prop->name : '', ['class' => 'form-control', 'placeholder' => 'Nome do Número']) }}
  </div>
  <div class="form-group">
    {{ Form::label('value', 'Valo do Número') }}
    {{ Form::number('value', isset($prop) ? $prop->value : '', ['class' => 'form-control', 'placeholder' => 'Valor do Número']) }}
  </div>
  <div>
    {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
  </div>
{!! Form::close() !!}
