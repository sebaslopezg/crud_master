const displayProducts = document.getElementById('displayProducts')
const codigo = document.querySelector('#codigo')
const totalBill = document.querySelector('#totalBill')
const totalRecibido = document.querySelector('#totalRecibido')
const totalAbono = document.querySelector('#totalAbono')
const totalToPay = document.querySelector('#totalToPay')

let tablaProductos = null
let productListHtml = ''
let isEditingAbono = false
let isEditingRecibido = false

document.addEventListener('click', ({target}) => {
    if (target.dataset.action == 'getproductByCode') {
        agregarItem(codigo.value)
    }
    if (target.dataset.action == 'getproduct') {
        let code = target.dataset.code
        agregarItem(code)
    }
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
    //displayProducts.innerHTML += html
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
    isEditingRecibido? '' : totalRecibido.value = total
}