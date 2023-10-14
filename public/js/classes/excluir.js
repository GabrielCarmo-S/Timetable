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
