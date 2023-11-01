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
            Foto
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Prefixo
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Nome Completo
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Nome Abrev
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            E-mail
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Profissão
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
                  <img width="36px" height="100%" class="img-profile rounded-circle"
                    src="{{ $item->foto == null ? asset('img/undraw_profile.svg') : Storage::url($item->foto) }}" alt="Foto do Usuário"
                    style="object-position: center center; object-fit: cover;">
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->prefixo }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->nome_completo }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->nome_abrev }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->email }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->level == 0 ? 'Professor' : 'Coordenador' }}
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
          <h5 class="modal-title">Cadastrar Usuários</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="form" enctype="multipart/form-data">
            <div class="row d-flex">
              <div class="col-sm-12 col-md-12 col-lg-12 mb-3 d-none">
                <label for="id">Id</label>
                <input type="text" name="id" id="id" class="form-control" required>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12 mb-3" id="divFoto">
                <label for="foto">Foto</label>
                <input class="form-control" type="file"name="foto" id="foto" accept="image/png,image/jpeg"
                  required>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                <label for="prefixo">Prefixo</label>
                <input type="text" name="prefixo" id="prefixo" class="form-control" required>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                <label for="nome_completo">Nome Completo</label>
                <input type="text" name="nome_completo" id="nome_completo" class="form-control" required>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                <label for="nome_abrev">Nome Abrev</label>
                <input type="text" name="nome_abrev" id="nome_abrev" class="form-control" required>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                <label for="level">Profissão</label>
                <select class="form-control" id="level" name="level">
                  <option selected value="0">Professor</option>
                  <option value="1">Coordenador</option>
                </select>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 mb-3" id="divPassword">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" class="form-control" required>
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
  <script src="{{ asset('js/usuarios/index.js') }}"></script>
@endsection
