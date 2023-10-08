async function cadastrar() {
    overlay.style.display = 'flex';

    removerInputsErros();

    const form = document.querySelector('#form');

    const data = await formCreateRoute(window.location.origin + '/modulos', form);

    if (!data.status) {
        gerarInputsErrors(data.errors);
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
