const displayProducts = document.getElementById('displayProducts')
const codigo = document.querySelector('#codigo')
const totalBill = document.querySelector('#totalBill')
const totalBase = document.querySelector('#totalBase')
const totalImpuesto = document.querySelector('#totalImpuesto')
const totalRecibido = document.querySelector('#totalRecibido')
const descuento = document.querySelector('#descuento')
const metodoPago = document.querySelector('#metodoPago')
const comentarios = document.querySelector('#comentarios')
const totalAbono = document.querySelector('#totalAbono')
const totalToPay = document.querySelector('#totalToPay')
const displayClient = document.querySelector('#displayClient')
const documentClientModal = document.querySelector('#cedulaClienteModal')
const cedulaClienteModal = document.querySelector('#cedulaClienteModal')
const btnSetPayment = document.querySelector('#btnSetPayment')

let setBillForm = document.querySelector('#setBillForm')

let clientSelected = {
    nombre:null,
    documento:null,
    telefono: null, 
}

let tablaProductos = null
let productListHtml = ''
let isEditingAbono = false
let isEditingRecibido = false
let createClientModalDocument = null

document.addEventListener('click', ({target}) => {
    if (target.dataset.action == 'getproductByCode') {
        agregarItem(codigo.value)
    }
    if (target.dataset.action == 'getproduct') {
        let code = target.dataset.code
        agregarItem(code)
    }
    if (target.dataset.action == 'addClient') {
        $('#clientesModal').modal('show')
    }
    if (target.dataset.action == 'searchClient') {
        const clientDocument = document.querySelector('#cedulaClienteModal')
        getClientByDocument(clientDocument.value)
    }
    if (target.dataset.action == 'addClientModal') {
        printClientOnDisplay()
    }
})

documentClientModal.addEventListener('change', ({target}) => {
    createClientModalDocument = target.value
})

cedulaClienteModal.addEventListener('keydown', (e) =>{
    if (e.key == 'Enter') {
        const clientDocument = document.querySelector('#cedulaClienteModal')
        getClientByDocument(clientDocument.value)
    }
})

setSubmit({
    form:'frmSetCliente',
    uri:'/clientes/crearCliente',
    modal:'SetClientesModal',
    tableFunction:setCreatedClient
})

document.addEventListener('change', ({target}) =>{
    let targetId = target.id
    target.value < 0 ? target.value = 1 : ''
    targetId == 'totalAbono' ? isEditingAbono = true : ''
    targetId == 'totalRecibido' ? isEditingRecibido = true : ''
    updateBill()
})

////

function agregarItem(value){
    fetch(base_url + '/productos/listarProductoCodigo/' + value)
    .then((response) => response.json())
    .then((data) => {
        if(data.length > 0){

            let product = data[0]

            if (buscarProducto(product)) {
                let producto = document.getElementById(product.id)
                let cantidad = producto.getElementsByTagName('input')
                let contador = parseInt(cantidad[0].value)
                contador++
                cantidad[0].value = contador
                updateBill()
            }else{
                agregarProducto(product)
                updateBill()
            }

            codigo.value = "";
        }else{
            codigo.value = "";
            $('#productosModal').modal('show')
                if (tablaProductos == null) {
                loadProductosModal()
            }
        }
    })
}

function agregarProducto(product){
//append child and create elements
    let rowProduct = document.createElement('div')

    let html = 
    `
        <div class="row product" id="${product.id}">
            <div class="alert border-secondary alert-dismissible fade show" role="alert">
                <div class="row">
                    <div class="col-5">
                        <small class="text-primary">${product.nombre}</small>
                        <h5><b>${product.codigo}</b></h5>
                        <div class="input-group">
                            <span class="input-group-text">Cantidad</span>
                            <input type="text" class="form-control" data-item-price="${product.precio}" value="1" onkeypress="{return controlTag(event)}">
                        </div>
                    </div>
                    <div class="col-4">
                        <h5><b>${product.precio}</b></h5>
                        <p>${product.descripcion}</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    `
    let frag = document.createRange().createContextualFragment(html);
    displayProducts.appendChild(frag)
}

function loadProductosModal(){
    tablaProductos = $('#productTable').dataTable({
        "language": {
            "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
        },
        "ajax":{
            "url": " "+base_url+"/productos/listarProductos",
            "dataSrc":""
        },
        "columns":[
            {"data":"codigo"},
            {"data":"nombre"},
            {"data":"precio"},
            {data: "codigo" , render : function ( data, type, row, meta ) {
                return  `<button class="btn btn-primary" data-action="getproduct" data-code="${data}">Agregar</button>`
              }},
        ],
        "responsive": "true",
        "order":[[0, "asc"]]
    })

    tablaProductos.button().add(0, {
        action: function (e, dt, button, config) {
            dt.ajax.reload();
        },
        text: 'Reload table'
    });
}

function buscarProducto(json){
    let respuesta = false
    let id = json.id
    let products = document.getElementsByClassName('product')
    var arrCards = Array.prototype.slice.call(products)
    arrCards.forEach(el => {
        if (id == el.getAttribute('id')) {
            respuesta = true
        }
    });
    return respuesta
}

function getClientByDocument(clientDocument, onlyData = false){
    fetch(base_url + '/clientes/listarClienteDocumento/' + clientDocument)
        .then((res) => res.json())
        .then((data) => {

            if (!onlyData) {    
                if (data) {
                    clientSelected.nombre = data.nombre
                    clientSelected.documento = data.documento
                    clientSelected.telefono = data.telefono
        
                    const displayClientModal = document.querySelector('#displayClientModal')
                    html = `
                        <div class="row mt-4">
                            <div class="col-auto">
                                <span class="badge bg-light text-dark">
                                ${data.documento}</span>
                                <h5><b>${data.nombre}</b></h5>
                            </div>
                        </div>
                    `
                    displayClientModal.innerHTML = html                
                }else{
                    $('#clientesModal').modal('hide')
                    $('#SetClientesModal').modal('show')
                    let documentField = document.querySelector('#txtDocumento')
                    documentField.value = createClientModalDocument
                }
            }else{
                clientSelected.nombre = data.nombre
                clientSelected.documento = data.documento
                clientSelected.telefono = data.telefono
                printClientOnDisplay()
            }

        
        })
}

function setCreatedClient(){
    let clientDocument = createClientModalDocument
    getClientByDocument(clientDocument, true)
}

function printClientOnDisplay(){
    let html = ''
    clientSelected.documento == null ? '' : html = `
    
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <span>${clientSelected.documento}</span> | <span><b>${clientSelected.nombre}</b></span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>          
    `
    displayClient.innerHTML = html
}

function updateBill(){
    productos = document.querySelectorAll('.product')
    let input
    let stock
    let price
    let total = 0
    productos.forEach((el) =>{
        input = el.children[0].children[0].children[0].children[2].children[1]
        stock = input.value
        price = input.getAttribute('data-item-price')
        total += stock * price
    })

    totalBill.value = total
    totalToPay.value = total

    isEditingAbono ? '' : totalAbono.value = total
    isEditingRecibido ? '' : totalRecibido.value = total
}

//// FACTURA

function billItemSetter(){
    productos = document.querySelectorAll('.product')
    console.log(productos)
}

function billFormSetter(){

    //const formData = new FormData(setBillForm)
    const formData = new FormData()
    formData.append('subtotal', totalBill.value)
    formData.append('totalBase', totalBase.value)
    formData.append('impuesto', totalImpuesto.value)
    formData.append('total', totalToPay.value)
    formData.append('descuento', descuento.value)
    formData.append('abono', totalAbono.value)
    formData.append('recibido', totalRecibido.value)
    formData.append('metodoPago', metodoPago.value)
    formData.append('comentarios', comentarios.value)
    formData.append('cliente', clientSelected.nombre)
    formData.append('identidad_cliente', clientSelected.documento)
    formData.append('telefono_cliente', clientSelected.telefono)

    fetch(`${base_url}/ventas/setbill/${almacenData}`,{
        method: 'POST',
        body: formData
    })
    .then((response) => response.json())
    .then((data) => {
      if (data.status) {
        Swal.fire({
          title: "Registro",
          text: data.msg,
          icon: "success"
        });
        billItemSetter()
      }else{
        Swal.fire({
          title: "Error",
          text: data.msg,
          icon: "error"
        });
      }
    })
}

btnSetPayment.addEventListener('click', (e) => {
    billFormSetter()
})


///////

getForm()

//setSubmit({
//    form:'setBillForm',
//    uri: `/ventas/setbill/${almacenData}`,
//})

function getForm(){
    setForms([{
        form:'configBillReport',
        uri: `/ventas/getconfig/${almacenData}`,
        dataKey:'config',
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