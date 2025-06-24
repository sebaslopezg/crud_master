
const eliminarAlmacen = (idAlmacen) =>{
    console.log(`Eliminar almacen: ${almacenData}`);


    Swal.fire({
        title: "Eliminar almacen",
        icon:"warning",
        text:"¿Está seguro de que desea eliminar el almacén? Todos los datos se perderán",        
        showDenyButton: true,
        confirmButtonText: "Eliminar",
        denyButtonText: `Cancelar`
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`${base_url}/almacenes/deleteone/${idAlmacen}`,{
                method:'post',
            })
            .then((response) => response.json())
            .then((data) =>{
            if (data.status) {
                window.location=`${base_url}/dashboard`
            }
            })
        }
    })    
}

const getForm = () =>{
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

export{eliminarAlmacen, getForm}