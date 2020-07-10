
function datatimeRandom() {
    return ((new Date().getTime() / 1000) * Math.random());
}


function add_row() {
    var id = datatimeRandom();
    $("#tbody_ators").append(
        `<tr id="row-` + id + `" class='row'>
                            <td class="col-md-10">
                                <input type="text" name="ator[]" placeholder="Nome do ator" class="form-control" id="recipient-name">
                            </td>
                            <td class="col-md-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn-icon" title="Excluir" onclick="javascript:remove_elem('row-` + id + `');">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>`
    );

}

function add_row_edit() {
    var id = datatimeRandom();
    $("#tbody_ators_editar").append(
        `<tr id="row-` + id + `" class='row'>
                            <td class="col-md-10">
                                <input type="text" name="ator[]" placeholder="Nome do ator" class="form-control" id="recipient-name">
                            </td>
                            <td class="col-md-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn-icon" title="Excluir" onclick="javascript:remove_elem('row-` + id + `');">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>`
    );

}

function add_row_value(value) {
    var id = datatimeRandom();
    $("#tbody_ators_editar").append(
        `<tr id="row-` + id + `" class='row'>
                            <td class="col-md-10">
                                <input type="text" value="`+value+`" name="ator[]" placeholder="Nome do ator" class="form-control" id="recipient-name">
                            </td>
                            <td class="col-md-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn-icon" title="Excluir" onclick="javascript:remove_elem('row-` + id + `');">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>`
    );

}



function remove_elem(argument) {
    var el = document.getElementById(argument);
    el.parentNode.removeChild(el);
}

function remove_elem_genero(argument) {
    var el = document.getElementById(argument);
    el.parentNode.removeChild(el);
    document.getElementById('select_genero').style.display = "";
    document.getElementById('select_genero').disabled = false;
}


function new_genero(elem) {

    if (elem.value == '0') {
        var id = datatimeRandom();
        document.getElementById('select_genero').style.display = "none";
        document.getElementById('select_genero').disabled = true;
        document.getElementById('div_genero').innerHTML +=
            `<div id="genero` + id + `" class="row">
                              <div class="col-md-10">
                                  <input type="text" class="form-control" id="genero-name" name="genero_nome" required>
                              </div>
                              <div class="col-md-2">
                                <button type="button" class="btn-icon" title="Cancelar" onclick="javascript:remove_elem_genero('genero` + id + `');">
                                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                    <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                                  </svg>
                                </button>
                              </div>
                            </div>`;
    }
}

function remove_elem_genero_edit(argument) {
    var el = document.getElementById(argument);
    el.parentNode.removeChild(el);
    document.getElementById('select_genero_edit').style.display = "";
    document.getElementById('select_genero_edit').disabled = false;
}

function new_genero_edit(elem) {

    if (elem.value == '0') {
        var id = datatimeRandom();
        document.getElementById('select_genero_edit').style.display = "none";
        document.getElementById('select_genero_edit').disabled = true;
        document.getElementById('div_genero_edit').innerHTML +=
            `<div id="genero` + id + `" class="row">
                              <div class="col-md-10">
                                  <input type="text" class="form-control" id="genero-name" name="genero_nome" required>
                              </div>
                              <div class="col-md-2">
                                <button type="button" class="btn-icon" title="Cancelar" onclick="javascript:remove_elem_genero_edit('genero` + id + `');">
                                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                    <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                                  </svg>
                                </button>
                              </div>
                            </div>`;
    }
}


