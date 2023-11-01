async function cadastrar() {
    overlay.style.display = 'flex';

    removerInputsErros();

    const form = document.querySelector('#form');

    const formData = new FormData(form);

    const data = await formCreateRoute(window.location.origin + '/cursos', formData);

    if (!data.status) {
        gerarInputsErrors(data.errors);

        Toast.fire({ icon: 'error', title: data.message }).then(() => {
            overlay.style.display = 'none';
        });

        return false;
    }

    Toast.fire({ icon: 'success', title: data.message }).then(() => {
        document.location.reload();
    });

    return true;
}

async function editar(id) {
    overlay.style.display = 'flex';

    removerInputsErros();

    removerDadosModal();

    const data = await getByIdRoute(window.location.origin + '/cursos', id);

    if (!data.status) {
        Toast.fire({ icon: 'error', title: data.message }).then(() => {
            overlay.style.display = 'none';
        });

        return false;
    }

    overlay.style.display = 'none';

    inserirDadosModal(data.data);

    $("#cadastrar").modal("show");
}

async function salvarEdicao() {
    overlay.style.display = 'flex';

    const form = document.querySelector('#form');
    const formData = new FormData(form);

    const data = await formUpdateRoute(window.location.origin + '/cursos', formData);

    if (!data.status) {
        gerarInputsErrors(data.errors);

        Toast.fire({ icon: 'error', title: data.message }).then(() => {
            overlay.style.display = 'none';
        });

        return false;
    }

    Toast.fire({ icon: 'success', title: data.message }).then(() => {
        document.location.reload();
    });

    document.getElementById("salvarCadastrarButton").classList.remove("d-none");
    document.getElementById("salvarEdicaoButton").classList.add("d-none");

    const divFoto = document.getElementById('divFoto');

    divFoto.classList.add('d-none');

    return true;
}

function fecharModal() {
    document.getElementById("salvarCadastrarButton").classList.remove("d-none");
    document.getElementById("salvarEdicaoButton").classList.add("d-none");

    $("#cadastrar").modal("hide");

    return true;
}

function inserirDadosModal(data) {
    document.getElementById("salvarCadastrarButton").classList.add("d-none");
    document.getElementById("salvarEdicaoButton").classList.remove("d-none");

    const id = document.getElementById('id');
    const nome = document.getElementById('nome');

    id.value = data.id;
    nome.value = data.nome;
}

function removerDadosModal() {
    const id = document.getElementById('id');
    const nome = document.getElementById('nome');

    id.value = '';
    nome.value = '';
}

async function excluir(id) {
    overlay.style.display = 'flex';

    const data = await excluirRoute(window.location.origin + '/cursos', id);

    if (!data.status) {
        console.log(data);

        Toast.fire({ icon: 'error', title: data.message }).then(() => {
            overlay.style.display = 'none';
        });

        return false;
    }

    Toast.fire({ icon: 'success', title: data.message }).then(() => {
        document.location.reload();
    });

    return true;
}
