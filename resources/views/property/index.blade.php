@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4"><h3>Gestão de Números</h3></div>
                        <div class="col-md-2 col-md-offset-4">
                            <button class=".btn-default" onclick="location.href='{{ url('/dashboard') }}'">Ver Dashboard</button>
                        </div>
                        <div class="col-md-2">
                            <button class=".btn-default" onclick="location.href='{{ url('/property/add') }}'">Novo Número</button>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    @include('layouts.messages')
                    @if(count($props) > 0)
                    <table>
                        <thead>
                            <td>ID          </td>
                            <td>Título      </td>
                            <td>Valor       </td>
                            <td>Data / Hora </td>
                        </thead>
                        @foreach($props as $prop)
                            <tr>
                                <td>{{ $prop->id         }}</td>
                                <td>{{ $prop->name       }}</td>
                                <td>{{ $prop->value      }}</td>
                                <td>{{ $prop->updated_at }}</td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>Sem Números Cadastrados.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
