const facuraAnular = document.querySelector('#facuraAnular')

const anular = (id) =>{
    facuraAnular
    fetch(`${base_url}/ventas/anulargeneral/${facuraAnular.value}`)
    .then((response) => response.json())
    .then((data) => {
        data.status ? (
            Swal.fire({
            title: "Registro",
            text: data.msg,
            icon: "success"
            })
        ) : (
            Swal.fire({
            title: "Error",
            text: data.msg,
            icon: "error"
            })
        )

    })
    .catch((error) => {
            Swal.fire({
            title: "Error",
            text: error,
            icon: "error"
            })  
    })
}

export{anular}