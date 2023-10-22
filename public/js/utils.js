// document.getElementById("overlay").style.display = "block";
const overlay = document.getElementById("overlay");

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

function removerInputsErros() {
    const errorsDivs = document.querySelectorAll('.is-invalid');

    errorsDivs.forEach(div => {
        div.classList.remove('is-invalid');

        const feedbackDiv = div.parentNode.querySelector('.invalid-feedback');
        if (feedbackDiv) {
            div.parentNode.removeChild(feedbackDiv);
        }
    });
}

function gerarInputsErrors(errors) {
    for (const objeto in errors) {
        const element = document.getElementById(objeto);

        let div = document.createElement('div');

        div.className = 'invalid-feedback';

        errors[objeto].forEach(error => {
            div.innerHTML += `${error}`;
        });

        element.classList.add('is-invalid');
        element.parentNode.appendChild(div);
    }
}

// document.querySelector('#form');

async function formCreateRoute(route, formData) {
    try {
        let url = new URL(`${route}/incluir`);

        const settings = {
            method: 'POST',
            body: formData,
        }

        let response = await fetch(url, settings);

        const data = await response.json();

        return data;
    } catch (error) {
        return { 'status': 'error', 'message': error.message };
    }
}


async function excluirRoute(route, id) {
    try {
        let url = new URL(`${route}/excluir`);

        const settings = {
            method: 'DELETE'
        }

        const params = new URLSearchParams();
        params.append('id', id);

        url.search = params.toString();

        let response = await fetch(url, settings);

        const data = await response.json();

        return data;
    } catch (error) {
        return { 'status': 'error', 'message': error.message };
    }
}
