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
