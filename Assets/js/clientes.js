updateTable()

setModal({
    trigger: 'btnCrearCliente',
    modal: 'SetClientesModal',
    ids: ['clienteModalTitle'],
    values:['Nuevo Cliente'],
    fields:['txtDocumento','txtNombre','txtDireccion','txtemail','txtTelefono'],
})

setSubmit({
    form:'frmSetCliente',
    uri:'/clientes/crearCliente',
    modal:'SetClientesModal',
    tableFunction:updateTable
})

function updateTable(){
    setTableFromUri({
        src:'/clientes/listarClientes',
        table:'tablaClientes',
        columns:['documento', 'nombre'],
        crud:{
            id:'id',
            delete:{
                src:'/clientes/eliminarCliente',
                text:'',
                icon:'trash',
                tableFunction:updateTable,
                dialog:{
                    title:'Eliminar cliente',
                    text:'¿Está seguro que desea eliminar el cliente?',
                    confirmButtonText:'Sí',
                    denyButtonText:'No',
                    icon:'warning',
                },
            },
            update:{
                src:'/clientes/actualizarCliente',
                text:'',
                icon:'pencil',
                form:'frmSetCliente',
                modal:{
                    id:'SetClientesModal',
                    srcElement:'/clientes/listarClienteId',
                    setValues:{
                        ids:['txtDocumento','txtNombre','txtDireccion','txtemail','txtTelefono'],
                        values:['documento','nombre','direccion','email','telefono'],
                    },
                    replace:{
                        ids:['clienteModalTitle'],
                        values:['Actualizar Cliente'],
                    },
                },
            },
        },
    })
}