let tablaFacturas
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
    table.ajax.reload()
}

const showBillDetails = (id) =>{
    const displayBillDetails = document.querySelector('#displayBillDetails')
    let html = ""
    $('#facturasModal').modal('show')
    fetch(`${base_url}/ventas/getbill/${almacenData}/${id}`)
    .then((response) => response.json())
    .then((rawData) => {
        let data = rawData[0]
        console.log(data);
        
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

export{
    setdataTable,
    showBillDetails,
    reloadTableFacturas,
}