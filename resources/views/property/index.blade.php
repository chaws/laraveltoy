@extends('layouts.app')

@section('page-js')
<script type="text/javascript">
    function confirmDeletion(id) {
        if(confirm('Deseja realmente excluir este número?')) {
            location.href="{{ url('/property/del')}}/" + id;
        }
    };
</script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                    <table class="table">
                        <thead>
                            <td>ID          </td>
                            <td>Título      </td>
                            <td>Valor       </td>
                            <td>Data / Hora </td>
                            <td>Ações </td>
                        </thead>
                        @foreach($props as $prop)
                            <tr>
                                <td>{{ $prop->id         }}</td>
                                <td>{{ $prop->name       }}</td>
                                <td>{{ $prop->value      }}</td>
                                <td>{{ $prop->updated_at }}</td>
                                <td>
                                    <button class=".btn-default" onclick="location.href='{{ url('/property/edit') .'/'. $prop->id }}'">Editar</button>
                                    <button class=".btn-default del" onclick="confirmDeletion({{ $prop->id }});">Excluir</button>
                                </td>
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
