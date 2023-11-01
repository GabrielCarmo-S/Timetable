async function cadastrar() {
    overlay.style.display = 'flex';

    removerInputsErros();

    const form = document.querySelector('#form');

    const formData = new FormData(form);

    formData.append('foto', form.querySelector('input[name="foto"]').files[0]);

    const data = await formCreateRoute(window.location.origin + '/usuarios', formData);

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

    const data = await getByIdRoute(window.location.origin + '/usuarios', id);

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

    const data = await formUpdateRoute(window.location.origin + '/usuarios', formData);

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

    const divFoto = document.getElementById('divFoto');
    const divPassword = document.getElementById('divPassword');

    divFoto.classList.add('d-none');
    divPassword.classList.add('d-none');

    document.getElementById("salvarCadastrarButton").classList.remove("d-none");
    document.getElementById("salvarEdicaoButton").classList.add("d-none");

    return true;
}

function fecharModal() {
    const divFoto = document.getElementById('divFoto');
    const divPassword = document.getElementById('divPassword');

    divFoto.classList.add('d-flex');
    divPassword.classList.add('d-flex');

    document.getElementById("salvarCadastrarButton").classList.remove("d-none");
    document.getElementById("salvarEdicaoButton").classList.add("d-none");

    $("#cadastrar").modal("hide");

    return true;
}

function inserirDadosModal(data) {
    document.getElementById("salvarCadastrarButton").classList.add("d-none");
    document.getElementById("salvarEdicaoButton").classList.remove("d-none");

    const divFoto = document.getElementById('divFoto');
    const divPassword = document.getElementById('divPassword');

    const id = document.getElementById('id');
    const prefixo = document.getElementById('prefixo');
    const nome_completo = document.getElementById('nome_completo');
    const nome_abrev = document.getElementById('nome_abrev');
    const level = document.getElementById('level');
    const email = document.getElementById('email');

    id.value = data.id;
    prefixo.value = data.prefixo;
    nome_completo.value = data.nome_completo;
    nome_abrev.value = data.nome_abrev;
    level.value = data.level;
    email.value = data.email;

    divFoto.classList.add('d-none');
    divPassword.classList.add('d-none');
}

function removerDadosModal() {
    const id = document.getElementById('id');
    const prefixo = document.getElementById('prefixo');
    const nome_completo = document.getElementById('nome_completo');
    const nome_abrev = document.getElementById('nome_abrev');
    const level = document.getElementById('level');
    const email = document.getElementById('email');

    id.value = '';
    prefixo.value = '';
    nome_completo.value = '';
    nome_abrev.value = '';
    level.value = '';
    email.value = '';
}

async function excluir(id) {
    overlay.style.display = 'flex';

    const data = await excluirRoute(window.location.origin + '/usuarios', id);

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

