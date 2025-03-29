const almacenesList = document.querySelector('#almacenesList')

getAlmacenes()

setModal({
    trigger: 'btnNew',
    modal: 'SetAlmacenModal',
})

setSubmit({
    form:'frmSetAlmacen',
    uri:'/almacenes/create',
    modal:'SetAlmacenModal',
    tableFunction:getAlmacenes
})

function getAlmacenes(){
    fetch(base_url + '/almacenes/view')
    .then((res) => res.json())
    .then((data) =>{
        html = ''
        data.forEach(almacen => {        
            console.log(almacen)
            let html = ''

            let elementStatus = {
                text:'-',
                class:'secondary'
            }

            almacen.status == 1 ? (
                elementStatus.text = 'Activo',
                elementStatus.class = 'success'
            ) : (
                elementStatus.text = 'Inactivo',
                elementStatus.class = 'danger'
            )

        html += `
                <a href="${base_url}/ventas/almacen/${almacen.id}" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">${almacen.nombre}</h5>
                        <span class="badge bg-${elementStatus.class}">${elementStatus.text}</span>
                    </div>
                    <p class="mb-1">${almacen.descripcion}</p>
                </a>
        ` 

        almacenesList.innerHTML += html
    });
    })
}