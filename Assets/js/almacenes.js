const almacenesList = document.querySelector('#almacenesList')

getAlmacenes()
getForm()

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

setSubmit({
    form:'configBillReport',
    uri:'/almacenes/setconfig',
    tableFunction:getForm
})

function getForm(){
    setForms([{
        form:'configBillReport',
        uri:'/almacenes/getconfig',
        dataKey:'config_value',
        setValues:{
        ids:[
            'title',
            'secondTitle',
            'documentType',
            'storeName',
            'storeNit',
            'storeAddress',
            'storeEmail',
            'reportSuffix',
            'reportFooter1',
            'reportFooter2',
            'storePhone',
            ],
        values:[
            'title',
            'secondTitle',
            'documentType',
            'storeName',
            'storeNit',
            'storeAddress',
            'storeEmail',
            'reportSuffix',
            'reportFooter1',
            'reportFooter2',
            'storePhone',
            ]
        },
    }])
}

function getAlmacenes(){
    fetch(base_url + '/almacenes/view')
    .then((res) => res.json())
    .then((data) =>{
        let html = ''
        data.forEach(almacen => {        
            html = ''

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