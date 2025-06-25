
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

export{eliminarAlmacen}