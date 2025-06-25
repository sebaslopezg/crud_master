import {
    setdataTable, 
    showBillDetails,
    setCreatedClient,
    printClientOnDisplay,
    billFormSetter,
    updateBill,
    getClientByDocument
} from './ventas/facturas.js'

import {agregarItem} from './ventas/ventas.js'
import {eliminarAlmacen, getForm} from './ventas/configurar.js'
import {anular} from './ventas/anulaciones.js'

const codigo = document.querySelector('#codigo')
const documentClientModal = document.querySelector('#cedulaClienteModal')
const cedulaClienteModal = document.querySelector('#cedulaClienteModal')
const btnSetPayment = document.querySelector('#btnSetPayment')

/* let setBillForm = document.querySelector('#setBillForm') */

let createClientModalDocument = null

document.addEventListener('click', ({target}) => {
    if (target.dataset.action == 'getproductByCode') {
        agregarItem(codigo.value)
    }
    if (target.dataset.action == 'getproduct') {
        let code = target.dataset.code
        agregarItem(code)
    }
    if (target.dataset.action == 'getBill') {
        const id = target.dataset.id
        showBillDetails(id)
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
    if (target.dataset.action == 'deleteStore') {
        eliminarAlmacen(almacenData)
    }
    if (target.dataset.action == 'getBillAnulation') {
        anular(almacenData)
    }
})

documentClientModal.addEventListener('change', ({target}) => {
    createClientModalDocument = target.value
})

cedulaClienteModal.addEventListener('keydown', (e) =>{
    if (e.key == 'Enter'){
        const clientDocument = document.querySelector('#cedulaClienteModal')
        getClientByDocument(clientDocument.value)
    }
})

document.addEventListener('change', ({target}) =>{
    let targetId = target.id
    target.value < 0 ? target.value = 1 : ''
    targetId == 'totalAbono' ? isEditingAbono = true : ''
    targetId == 'totalRecibido' ? isEditingRecibido = true : ''
    updateBill()
})

setSubmit({
    form:'frmSetCliente',
    uri:'/clientes/crearCliente',
    modal:'SetClientesModal',
    tableFunction:setCreatedClient
})

//// FACTURA

btnSetPayment.addEventListener('click', (e) => {
    billFormSetter()
})

/// FACTURAS ////

setdataTable()

/// CONFIG ////

getForm()

setSubmit({
    form:'configBillReport',
    uri:`/ventas/setconfig/${almacenData}`,
})