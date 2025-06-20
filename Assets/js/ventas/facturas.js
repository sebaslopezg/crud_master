const SetdataTable = () =>{
    let table = $('#myTable').dataTable({
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

const showBillDetails = (id) =>{
    const displayBillDetails = document.querySelector('#displayBillDetails')
    let html = ""
    $('#facturasModal').modal('show')
    fetch(`${base_url}/ventas/getbill/${almacenData}/${id}`)
    .then((response) => response.json())
    .then((rawData) => {
        let data = rawData[0]
        
        html += `
            <p>Fecha: ${data.timestamp}</p>
            <p>Vendedor(a): ${data.autor}</p>
            <p>Cliente: ${data.cliente}</p>
            <p>Documento Cliente: ${data.identidad_cliente}</p>
            <p>Documento Cliente: ${data.tipo_pago}</p>
            <p>Numero Factura: ${data.numero_consecutivo}</p>

            <ol class="list-group list-group-numbered">
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
    SetdataTable,
    showBillDetails,
}