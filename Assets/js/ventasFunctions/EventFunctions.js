const displayProducts = document.querySelector('#displayProducts')
const GetProductsByCode = () =>{
    document.addEventListener('click', ({target}) => {
        if (target.dataset.action == 'getproductByCode') {
            const codigo = document.querySelector('#codigo')
            fetch(base_url + '/productos/listarProductoCodigo/' + codigo.value)
                .then((res) => res.json())
                .then((data) =>{
                    if (data.length > 0) {

                        let html = ''
                        let product = data[0]
                        html = `
                        <div class="row">
                            <div class="alert border-secondary alert-dismissible fade show" role="alert">
                                <div class="row">
                                    <div class="col-5">
                                        <small class="text-primary">${product.nombre}</small>
                                        <h5><b>${product.codigo}</b></h5>
                                        <div class="input-group">
                                            <span class="input-group-text">Cantidad</span>
                                            <input type="number" class="form-control">
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
                        console.log(displayProducts)
                        displayProducts.innerHTML += html
                    }else{
                        $('#productosModal').modal('show')
                    }
                })
        }
    })
}

export {GetProductsByCode}