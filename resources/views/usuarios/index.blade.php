@extends('layouts.html')

@section('content')
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ $titleContent }}</h1>
    </div>

    @component('layouts.tables.table', ['tableTitle' => 'Tabela Usuários', 'name' => 'dataTable'])
      @section('dataTable-thead')
        @component('layouts.tables.th')
          @slot('text')
            ID
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Nome
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Email
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Level Permissão
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
                  {{ $item->user_id }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->user_name }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->user_email }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->user_level }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar"><i
                      class="fas fa-pencil-alt"></i></button>
                  <button type="button" class="btn btn-danger" onclick="excluir({{ $item->user_id }})"><i
                      class="fas fa-trash-alt"></i></button>
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
          <h5 class="modal-title">Cadastrar Usuários</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row d-flex">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
              <label for="user_name">Nome</label>
              <input type="text" name="user_name" id="user_name" class="form-control" required>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
              <label for="user_email">E-mail</label>
              <input type="email" name="user_email" id="user_email" class="form-control" required>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
              <label for="user_password">Senha</label>
              <input type="password" name="user_password" id="user_password" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="modal-footer d-flex align-items-center justify-content-between">
          <button type="button" class="btn btn-success" onclick="cadastrar()"><i class="fas fa-plus pr-1"></i>
            Cadastrar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i
              class="fas fa-times pr-1"></i>Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Usuários</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="form">
            <div class="row d-flex">
              <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                <label for="user_name">Nome</label>
                <input type="text" name="user_name" id="user_name" class="form-control" required>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                <label for="user_email">E-mail</label>
                <input type="email" name="user_email" id="user_email" class="form-control" required>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                <label for="user_password">Senha</label>
                <input type="password" name="user_password" id="user_password" class="form-control" required>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer d-flex align-items-center justify-content-between">
          <button type="button" class="btn btn-success"><i class="fas fa-plus pr-1"></i> Editar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i
              class="fas fa-times pr-1"></i>Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/utils.js') }}"></script>
  <script src="{{ asset('js/usuarios/cadastrar.js') }}"></script>
  <script src="{{ asset('js/usuarios/excluir.js') }}"></script>
@endsection
