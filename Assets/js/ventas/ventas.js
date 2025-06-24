let tablaProductos = null
let isEditingAbono = false
let isEditingRecibido = false

const agregarProducto = (product) =>{
    let html = 
    `
        <div class="row">
            <div class="alert border-secondary alert-dismissible fade show" role="alert">
                <div class="row product" id="${product.id}">
                    <div class="col-5">
                        <small class="text-primary">${product.nombre}</small>
                        <h5><b>${product.codigo}</b></h5>
                        <div class="input-group">
                            <span class="input-group-text">Cantidad</span>
                            <input 
                                type="text" 
                                class="form-control" 
                                data-item-price="${product.precio}" 
                                data-item-id="${product.id}" 
                                data-item-code="${product.codigo}" 
                                data-item-name="${product.nombre}" 
                                value="1" 
                                onkeypress="{return controlTag(event)}"
                                >
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

const loadProductosModal = () =>{
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

const buscarProducto = (json) =>{
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

const agregarItem = (value) =>{
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

export{
    agregarItem,
}