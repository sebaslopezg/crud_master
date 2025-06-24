const subTotal = document.querySelector('#subTotal')
const totalImpuesto = document.querySelector('#totalImpuesto')
const totalRecibido = document.querySelector('#totalRecibido')
const descuento = document.querySelector('#descuento')
const totalDescuento = document.querySelector('#totalDescuento')
const metodoPago = document.querySelector('#metodoPago')
const comentarios = document.querySelector('#comentarios')
const totalAbono = document.querySelector('#totalAbono')
const totalToPay = document.querySelector('#totalToPay')
const displayClient = document.querySelector('#displayClient')
const displayProducts = document.getElementById('displayProducts')

let tablaFacturas
let isEditingAbono = false
let isEditingRecibido = false

let clientSelected = {
    nombre:null,
    documento:null,
    telefono: null, 
}

const setdataTable = () =>{
    tablaFacturas = $('#myTable').dataTable({
        "language": {
            "url": `${base_url}/Assets/vendor/datatables/dataTables_es.json`
        },
        "ajax":{
            "url": `${base_url}/ventas/getbills/${almacenData}`,
            "dataSrc":""
        },
        "columns":[
            {"data":"titulo"},
            {"data":"autor"},
            {"data":"cliente"},
            {"data":"identidad_cliente"},
            {"data":"total"},
            {"data":"comentario"},
            {data: "id" , render : function ( data, type, row, meta ) {
                return  `<button class="btn btn-primary" data-action="getBill" data-id="${data}">Detalle</button>`
            }},
        ],
        "responsive": "true",
        "order":[[0, "asc"]]
    })

}

const reloadTableFacturas = () => {
    tablaFacturas.ajax.reload()
}

const updateBill = () =>{
    let productos = document.querySelectorAll('.product')
    let input
    let stock
    let price
    let total = 0
    productos.forEach((el) =>{
        input = el.children[0].children[2].children[1]
        stock = input.value
        price = input.getAttribute('data-item-price')
        total += stock * price
    })

    descuento.value > 0 ? totalDescuento.value = (total / 100) * descuento.value : ''

    subTotal.value = total
    totalToPay.value = parseInt(total) - parseInt(totalDescuento.value)

    isEditingAbono ? '' : totalAbono.value = total
    isEditingRecibido ? '' : totalRecibido.value = total
}

const showBillDetails = (id) =>{
    const displayBillDetails = document.querySelector('#displayBillDetails')
    let html = ""
    $('#facturasModal').modal('show')
    fetch(`${base_url}/ventas/getbill/${almacenData}/${id}`)
    .then((response) => response.json())
    .then((rawData) => {
        let data = rawData[0]
        
        html += `
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Vendedor(a):</strong> ${data.autor}
                    </li>
                    <li class="list-group-item">
                        <strong>Cliente:</strong> ${data.cliente}
                    </li>
                    <li class="list-group-item">
                        <strong>Documento Cliente:</strong> ${data.identidad_cliente}
                    </li>
                    <li class="list-group-item">
                        <strong>Tipo de pago:</strong> ${data.tipo_pago}
                    </li>
                    <li class="list-group-item">
                        <strong>Numero Factura:</strong> ${data.numero_consecutivo}
                    </li>
                    <li class="list-group-item">
                        <strong>Total:</strong> $${data.total}
                    </li>
                </ul>
            </div>
        <ul class="list-group">
        `
        fetch(`${base_url}/ventas/getbilldetail/${almacenData}/${id}`)
        .then((res) => res.json())
        .then((detailsData) => {
            detailsData.forEach(el => {                
                html += `
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">${el.producto_nombre}</div>
                        <p>${el.producto_codigo}</p>
                        <p>Total: ${el.total}</p>
                      </div>
                    </li>
                `
            })
            html += `</ol>`
            console.log(html)
            displayBillDetails.innerHTML = html
        })
    })
    
}

const printClientOnDisplay = () =>{
    let html = ''
    clientSelected.documento == null ? '' : html = `
    
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <span>${clientSelected.documento}</span> | <span><b>${clientSelected.nombre}</b></span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>          
    `
    displayClient.innerHTML = html
}

const getClientByDocument = (clientDocument, onlyData = false) =>{
    fetch(base_url + '/clientes/listarClienteDocumento/' + clientDocument)
        .then((res) => res.json())
        .then((data) => {

            if (!onlyData) {    
                if (data) {
                    clientSelected.nombre = data.nombre
                    clientSelected.documento = data.documento
                    clientSelected.telefono = data.telefono
        
                    const displayClientModal = document.querySelector('#displayClientModal')
                    let html = `
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

const setCreatedClient = () =>{
    let clientDocument = createClientModalDocument
    getClientByDocument(clientDocument, true)
}

const clearSellData = () =>{
    displayProducts.innerHTML = ''
    displayClient.innerHTML = ''
    totalAbono.value = '0'
    totalRecibido.value = '0'
    totalDescuento.value = '0'
    metodoPago.value = 0
    comentarios.value = ''
    totalToPay.value = '0'
    subTotal.value = '0'
    totalDescuento.value = '0'
    totalImpuesto.value = '0'
}

const billFormSetter = () =>{
    const formData = new FormData()
    formData.append('subtotal', subTotal.value)
    formData.append('impuesto', totalImpuesto.value)
    formData.append('total', totalToPay.value)
    formData.append('descuento', totalDescuento.value) 
    formData.append('abono', totalAbono.value)
    formData.append('recibido', totalRecibido.value)
    formData.append('metodoPago', metodoPago.value)
    formData.append('comentarios', comentarios.value)

    clientSelected.nombre ? formData.append('cliente', clientSelected.nombre) : ''
    clientSelected.documento ? formData.append('identidad_cliente', clientSelected.documento) : ''
    clientSelected.telefono ? formData.append('telefono_cliente', clientSelected.telefono) : ''

    let productos = document.querySelectorAll('.product')
    let productosList = []
    let input
    productos.forEach((el) =>{
        input = el.children[0].children[2].children[1]
        productosList.push({
            stock: input.value,
            price: input.getAttribute('data-item-price'),
            id: input.getAttribute('data-item-id'),
            code: input.getAttribute('data-item-code'),
            itemName: input.getAttribute('data-item-name'),
            total: parseInt(input.value) * parseFloat(input.getAttribute('data-item-price'))
        })
    })

    formData.append('items', JSON.stringify(productosList))

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
        clearSellData()
        reloadTableFacturas()
      }else{
        Swal.fire({
          title: "Error",
          text: data.msg,
          icon: "error"
        });
      }
    })
}

export{
    setdataTable,
    showBillDetails,
    getClientByDocument,
    setCreatedClient,
    printClientOnDisplay,
    billFormSetter,
    updateBill
}