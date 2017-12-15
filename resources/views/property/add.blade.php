@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="float-left">Adicionar Número</div>
                </div>

                <div class="panel-body">
                  @include('layouts.messages')
                  {!! Form::open(['url' => 'property/submit']) !!}
                      <div class="form-group">
                        {{ Form::label('name', 'Nome do Número') }}
                        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nome do Número']) }}
                      </div>
                      <div class="form-group">
                        {{ Form::label('value', 'Valo do Número') }}
                        {{ Form::number('value', '', ['class' => 'form-control', 'placeholder' => 'Valor do Número']) }}
                      </div>
                      <div>
                        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
                      </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
