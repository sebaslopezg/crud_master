

document.addEventListener('click', ({target}) =>{
    if (target.dataset.section) {
        Object.entries(sections).forEach((section) => {
            if (target.dataset.section == section[0]) {
                section[1]()
            }
        });
    }
})

const ventaSection = () =>{
    console.log('Seccion de ventas')
}

const enarSection = () =>{
    console.log('Seccion de enar')
}

const abonoSection = () =>{
    console.log('Seccion de abonos')
}

const cambioSection = () =>{
    console.log('Seccion de cambios/devoluciones')
}

const facturasSection = () =>{
    console.log('Seccion de facturas')
}

const configSection = () =>{
    console.log('Seccion de configuracion')
}

const sections = {
    venta:ventaSection,
    enar:enarSection,
    abono:abonoSection,
    cambio:cambioSection,
    facturas:facturasSection,
    config:configSection,
}