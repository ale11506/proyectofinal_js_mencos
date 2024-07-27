const btnGuardar = document.getElementById('btnGuardar');
const btnModificar = document.getElementById('btnModificar');
const btnBuscar = document.getElementById('btnBuscar');
const btnCancelar = document.getElementById('btnCancelar');
const btnLimpiar = document.getElementById('btnLimpiar');
const tablapacientes = document.getElementById('tablapacientes');
const formulario = document.querySelector('form');

btnModificar.parentElement.style.display = 'none';
btnCancelar.parentElement.style.display = 'none';

const getpacientes = async (alerta = 'si') => {
    const nombre1 = formulario.pac_nombres1.value;
    const nombre2 = formulario.pac_nombres2.value;
    const apellido1 = formulario.pac_apellido1.value;
    const apellido2 = formulario.pac_apellido2.value;
    const url = `/proyecto_js_mencos/controllers/pacientes/index.php?pac_nombres1=${nombre1}pac_nombres2=${nombre2}&pac_apellidos1=${apellido1}&pac_apellidos2=${apellido2}`;
    const config = {
        method: 'GET'
    };

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log(data);

        tablapacientes.tBodies[0].innerHTML = '';
        const fragment = document.createDocumentFragment();
        let contador = 1;
        if (respuesta.status == 200) {

            if(alerta == 'si'){

                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "success",
                    title: 'pacientes encontrados',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();
            }

            if (data.length > 0) {
                data.forEach(paciente => {
                    const tr = document.createElement('tr');
                    const celda1 = document.createElement('td');
                    const celda2 = document.createElement('td');
                    const celda3 = document.createElement('td');
                    const celda4 = document.createElement('td');
                    const celda5 = document.createElement('td');
                    const celda6 = document.createElement('td');
                    const celda7 = document.createElement('td');
                    const celda8 = document.createElement('td');
                    const celda9 = document.createElement('td');
                    const celda10 = document.createElement('td');
                    const buttonModificar = document.createElement('button');
                    const buttonEliminar = document.createElement('button');

                    celda1.innerText = contador;
                    celda2.innerText = paciente.pac_nombre1;
                    celda3.innerText = paciente.pac_nombre2;
                    celda4.innerText = paciente.pac_apellido1;
                    celda5.innerText = paciente.pac_apellido2;
                    celda6.innerText = paciente.pac_dpi;
                    celda7.innerText = paciente.pac_sexo;
                    celda8.innerText = paciente.pac_referido;

                    buttonModificar.textContent = 'Modificar';
                    buttonModificar.classList.add('btn', 'btn-warning', 'w-100');
                    buttonModificar.addEventListener('click', () => llenardatos(paciente));

                    buttonEliminar.textContent = 'Eliminar';
                    buttonEliminar.classList.add('btn', 'btn-danger', 'w-100');
                    buttonEliminar.addEventListener('click', () => eliminarpaciente(paciente.paciente_id));

                    celda9.appendChild(buttonModificar);
                    celda10.appendChild(buttonEliminar);

                    tr.appendChild(celda1);
                    tr.appendChild(celda2);
                    tr.appendChild(celda3);
                    tr.appendChild(celda4);
                    tr.appendChild(celda5);
                    tr.appendChild(celda6);
                    tr.appendChild(celda7);
                    tr.appendChild(celda8);
                    tr.appendChild(celda9);
                    tr.appendChild(celda10);
                    fragment.appendChild(tr);

                    contador++;
                });

            } else {
                const tr = document.createElement('tr');
                const td = document.createElement('td');
                td.innerText = 'No hay pacientes disponibles';
                td.colSpan = 6;

                tr.appendChild(td);
                fragment.appendChild(tr);
            }
        } else {
            console.log('Error al cargar pacientes');
        }

        tablapacientes.tBodies[0].appendChild(fragment);
    } catch (error) {
        console.log(error);
    }
}

getpacientes();

const guardarpaciente = async (e) => {
    e.preventDefault();
    btnGuardar.disabled = true;

    const url = '/proyecto_final_mencos/controllers/pacientes/index.php';
    const formData = new FormData(formulario);
    formData.append('tipo', 1);
    formData.delete('paciente_id');
    const config = {
        method: 'POST',
        body: formData
    };

    try {
        console.log('Enviando datos:', ...formData.entries());
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log('Respuesta recibida:', data);
        const { mensaje, codigo, detalle } = data;
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "success",
            title: mensaje,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();

        if (codigo == 1 && respuesta.status == 200) {
            getpacientes(alerta = 'no');
            formulario.reset();
        } else {
            console.log(detalle);
        }

    } catch (error) {
        console.log(error);
    }
    btnGuardar.disabled = false;
}

const llenardatos = (paciente) => {
    formulario.paciente_id.value = paciente.paciente_id;
    formulario.pac_nombres1.value = paciente.pac_nombres1;
    formulario.pac_nombres2.value = paciente.pac_nombres2;
    formulario.pac_apellidos1.value = paciente.pac_apellidos1;
    formulario.pac_dpi.value = paciente.paci_dpi;
    formulario.pac_sexo.value = paciente.pac_sexo;
    formulario.pac_referido.value = paciente.pac_referido;
    btnBuscar.parentElement.style.display = 'none';
    btnGuardar.parentElement.style.display = 'none';
    btnLimpiar.parentElement.style.display = 'none';
    btnModificar.parentElement.style.display = '';
    btnCancelar.parentElement.style.display = '';
}

const modificar = async (e) => {
    e.preventDefault();
    btnModificar.disabled = true;

    const url = '/proyecto_js_mencos/controllers/pacientes/index.php';
    const formData = new FormData(formulario);
    formData.append('tipo', 2);
    const config = {
        method: 'POST',
        body: formData
    };

    try {
        console.log('Enviando datos:', ...formData.entries());
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log('Respuesta recibida:', data);
        const { mensaje, codigo, detalle } = data;
        if (respuesta.ok && codigo === 1) {
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                title: mensaje,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
            formulario.reset();
            getpacientes(alerta = 'no');
            btnBuscar.parentElement.style.display = '';
            btnGuardar.parentElement.style.display = '';
            btnLimpiar.parentElement.style.display = '';
            btnModificar.parentElement.style.display = 'none';
            btnCancelar.parentElement.style.display = 'none';
        } else {
            console.log('Error:', detalle);
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "error",
                title: 'Error al guardar',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
        }
    } catch (error) {
        console.log('Error de conexión:', error);
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "error",
            title: 'Error de conexión',
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();
    }
    btnModificar.disabled = false;
}

const eliminarpaciente = async (paciente_id) => {
    const url = '/proyecto_js_mencos/controllers/pacientes/index.php';
    const formData = new FormData();
    formData.append('paciente_id', paciente_id);
    formData.append('tipo', 3);
    const config = {
        method: 'POST',
        body: formData
    };

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log('Respuesta recibida:', data);
        const { mensaje, codigo } = data;
        if (respuesta.ok && codigo === 1) {
            Swal.mixin({
                toast: true,
                position: "top-start",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                title: mensaje,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
            getpacientes(alerta = 'no');
        } else {
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "error",
                title: data.mensaje || 'Error al eliminar',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
        }
    } catch (error) {
        console.log('Error de conexión:', error);
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "error",
            title: 'Error de conexión',
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();
    }
}


const cancelar = (e) => {
    e.preventDefault();
    formulario.reset();
    btnBuscar.parentElement.style.display = '';
    btnGuardar.parentElement.style.display = '';
    btnLimpiar.parentElement.style.display = '';
    btnModificar.parentElement.style.display = 'none';
    btnCancelar.parentElement.style.display = 'none';
}

formulario.addEventListener('submit', guardarpaciente);
btnBuscar.addEventListener('click', getpacientes);
btnModificar.addEventListener('click', modificar);
btnCancelar.addEventListener('click', cancelar);

