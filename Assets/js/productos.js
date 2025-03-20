actualizarTabla()

setModal({
    trigger: 'btnCrearProducto',
    modal: 'SetProductoModal',
    ids: ['productModalTitle','btnCrear'],
    values:['Crear Producto', 'Guardar'],
    fields:['txtCodigo','txtNombreProducto','txtDescripcion','txtPrecio','txtStatus'],
})

setButtonPermit({
    id:'btnCrearProducto',
    permitType:'create',
  })

setSubmit({
    form:'frmSetProducto',
    uri:'/productos/crearProducto',
    modal:'SetProductoModal',
    tableFunction:actualizarTabla
})

function actualizarTabla(){
    setTableFromUri({
        src:'/productos/listarProductos',
        table:'tablaProductos',
        columns:['codigo','nombre','precio'],
        crud:{
            id:'id',
            delete:{
                src:'/productos/eliminarProducto',
                text:'',
                icon:'trash',
                tableFunction:actualizarTabla,
                dialog:{
                    title:'Eliminar producto',
                    text:'¿Desea eliminar el producto?',
                    confirmButtonText:'Sí',
                    denyButtonText:'No',
                    icon:'warning',
                },
                response:{
                    statusTrue:{
                        title:'Eliminar',
                        icon:'success',
                    },
                    statusFalse:{
                        title:'Error',
                        text: 'No se pudo eliminar el producto',
                        icon:'error'
                    }
                },
            },
            update:{
                src:'/productos/actualizarProducto',
                text:'',
                icon:'pencil',
                form:'frmSetProducto',
                modal:{
                    id:'SetProductoModal',
                    srcElement:'/productos/listarProductoId',
                    setValues:{
                        ids:['txtCodigo','txtNombreProducto','txtDescripcion','txtPrecio','txtStatus'],
                        values:['codigo','nombre','descripcion','precio','status'],
                    },
                    replace:{
                        ids:['productModalTitle'],
                        values:['Actualizar Producto'],
                    },
                },
            }
        },
    })
}