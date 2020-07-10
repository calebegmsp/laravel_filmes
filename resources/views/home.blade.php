@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <a href="https://calebepereira-tec.firebaseapp.com/" target="_black">Clique aqui para acessar meu portifólio</a>
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8">
              {{ __('Painel de controle') }}
            </div>
            <div class="col-md-4 button-new-movie">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adicionarModal"
                data-whatever="@mdo">{{ __('Adicionar novo filme') }}</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table id="table" class="table table-striped">
            <thead>
              <tr class="row">
                <th class="col-md-3" scope="col">Título</th>
                <th class="col-md-5" scope="col">Resumo</th>
                <th class="col-md-2" scope="col">Gênero</th>
                <th class="col-md-2" scope="col">Ação</th>
              </tr>
            </thead>
            <tbody>
              @foreach (App\Filme::all() as $key => $item)
              <tr class="row">
                <td class="col-md-3">{{ $item->titulo }}</td>
                <td class="col-md-5">{{ $item->resumo }}</td>
                <td class="col-md-2">{{ $item->genero->nome }}</td>
                <td class="col-md-2 action-filmes">
                  <div class="row">
                    <div class="col-md-6">
                      <button onclick="javascript:editarFilme({{ $item->id }});" type="button" class="btn-icon" title="Editar"
                        onclick="javascript:remove_elem('row-00001');">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square"
                          fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                          <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                      </button>
                    </div>
                    <div class="col-md-6">
                      <button onclick="javascript:excluirFIlme({{ $item->id }});" type="button" class="btn-icon"
                        title="Excluir" onclick="javascript:remove_elem('row-00001');">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="adicionarModal" tabindex="-1" role="dialog" aria-labelledby="adicionarModal"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form id="formAddFilme" method="POST" action="{{ route('filme.salvar') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adicionarModal">Adicionar novo filme</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Titulo:</label>
                <input type="text" class="form-control" id="recipient-name" name="titulo" required maxlength="190">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Resumo:</label>
                <textarea class="form-control" id="message-text" name="resumo" maxlength="190"></textarea>
              </div>
              <div class="form-group">
                <div id="div_genero" class="form-group">
                  <label for="select_genero">Gênero</label>
                  <select onchange="javascript:new_genero(this)" class="form-control" id="select_genero"
                    name="genero_id" required>
                    <option value="">Selecione um gênero</option>
                    @foreach (App\Genero::all() as $item)
                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                    <option value="0">Adicionar novo gênero</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <label for="recipient-name" class="col-form-label">Elenco:</label>
                  </div>
                </div>
                <div class="div_scroll">
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-striped">
                        <thead>
                          <tr class='row'>
                            <th class="col-md-10">Nome</th>
                            <th class="col-md-2">Ação</th>
                          </tr>
                        </thead>
                        <tbody id="tbody_ators">
                          <tr id="row-00001" class='row'>
                            <td class="col-md-10">
                              <input type="text" name="ator[]" placeholder="Nome do ator" class="form-control"
                                id="recipient-name" maxlength="190">
                            </td>
                            <td class="col-md-2">
                              <div class="row">
                                <div class="col-md-6">
                                  <button type="button" class="btn-icon" title="Excluir"
                                    onclick="javascript:remove_elem('row-00001');">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill"
                                      fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd"
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                    </svg>
                                  </button>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                          <button type="button" onclick="javascript:add_row();"
                            class="btn btn-primary btn-max-width">{{ __('Adicionar ator') }}</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <input type="submit" class="btn btn-primary" value="Adicionar Filme" />
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form id="formAddFilme" method="POST" action="{{ route('filme.alterar') }}">
      <input type="hidden" id="filme_id" name="filme_id">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarModal">Editar filme</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Titulo:</label>
                <input id="titulo" type="text" class="form-control" id="recipient-name" name="titulo" required maxlength="190">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Resumo:</label>
                <textarea id="resumo" class="form-control" id="message-text" name="resumo" maxlength="190"></textarea>
              </div>
              <div class="form-group">
                <div id="div_genero_edit" class="form-group">
                  <label for="select_genero_edit">Gênero</label>
                  <select id="select_genero_edit" onchange="javascript:new_genero_edit(this)" class="form-control" id="select_genero"
                    name="genero_id" required>
                    <option value="">Selecione um gênero</option>
                    @foreach (App\Genero::all() as $item)
                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                    <option value="0">Adicionar novo gênero</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <label for="recipient-name" class="col-form-label">Elenco:</label>
                  </div>
                </div>
                <div class="div_scroll">
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-striped">
                        <thead>
                          <tr class='row'>
                            <th class="col-md-10">Nome</th>
                            <th class="col-md-2">Ação</th>
                          </tr>
                        </thead>
                        <tbody id="tbody_ators_editar">
                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                          <button type="button" onclick="javascript:add_row_edit();"
                            class="btn btn-primary btn-max-width">{{ __('Adicionar ator') }}</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <input type="submit" class="btn btn-primary" value="Salvar Alterações" />
        </div>
      </div>
    </form>
  </div>
</div>

@push('js')

<script>


  function editarFilme(id){
    $.ajax({
      type: 'post',
      url: '{{ route('filme.buscar') }}',
      data: {id:id, _token: '{{ csrf_token() }}'},
      success: function (response) {
        if(response.status == 'ok'){
          $('#filme_id').val(response.filme.id);
          $('#titulo').val(response.filme.titulo);
          $('#resumo').val(response.filme.resumo);
          $("#select_genero_edit>option[value="+response.filme.genero_id+"]").attr("selected", true);
          $('#editarModal').modal('show');
          $('#tbody_ators_editar').html('');

          function logArrayElements(element, index, array) {
            add_row_value(element.nome);
              console.log("a[" + index + "] = " + element);
          }
       
          response.filme.atores.forEach(logArrayElements);

        } else {

        }
      }
    })
  }

</script>

@endpush

@endsection