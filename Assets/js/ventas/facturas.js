const SetdataTable = () =>{
    console.log('data table!');
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
    $('#facturasModal').modal('show')

}

export{
    SetdataTable,
    showBillDetails,
}