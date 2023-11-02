@extends('layouts.html')

@section('content')
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ $titleContent }}</h1>
    </div>

    @component('layouts.tables.table', ['tableTitle' => 'Tabela Aulas', 'name' => 'dataTable'])
      @section('dataTable-thead')
        @component('layouts.tables.th')
          @slot('text')
            Nome
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Número
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Tipo de Sala
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Ações
          @endslot
        @endcomponent
      @endsection

      @section('dataTable-tbody')
        @foreach ($data as $item)
          @component('layouts.tables.tr')
            @slot('text')
              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->nome }}
                @endslot
              @endcomponent
              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->numero }}
                @endslot
              @endcomponent
              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->tiposala }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  <button type="button" class="btn btn-warning" onclick="editar({{ $item->id }})">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                  <button type="button" class="btn btn-danger" onclick="excluir({{ $item->id }})">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                @endslot
              @endcomponent
            @endslot
          @endcomponent
        @endforeach
      @endsection
    @endcomponent
  </div>

  <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="cadastrar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cadastrar Sala</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="form">
            <div class="row d-flex">
              <div class="col-sm-12 col-md-12 col-lg-12 mb-3 d-none">
                <label for="id">Id</label>
                <input type="text" name="id" id="id" class="form-control" required>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                <label for="numero">Número</label>
                <input type="text" name="numero" id="numero" class="form-control" required>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                <label for="tiposala">Tipo da Sala</label>
                <select class="form-control" id="tiposala" name="tiposala">
                  <option selected value="0">Selecione</option>
                  <option value="1">Laboratorio</option>
                  <option value="2">Sala teórica</option>
                  <option value="3">Clinica</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer d-flex align-items-center justify-content-between">
          <button type="button" class="btn btn-success" id="salvarCadastrarButton" onclick="cadastrar()">
            <i class="fas fa-plus pr-1"></i>
            Cadastrar
          </button>

          <button type="button" class="btn btn-success d-none" id="salvarEdicaoButton" onclick="salvarEdicao()">
            <i class="fas fa-pencil-alt"></i>
            Editar
          </button>

          <button type="button" class="btn btn-danger" onclick="fecharModal()">
            <i class="fas fa-times pr-1"></i>Fechar
          </button>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/utils.js') }}"></script>
  <script src="{{ asset('js/salas/index.js') }}"></script>
@endsection
