actualizarTabla()

setModal({
    trigger: 'btnCrearProducto',
    modal: 'SetProductoModal',
    ids: ['titleModal','btnCrear'],
    values:['Crear Producto', 'Guardar'],
    fields:['txtCodigo'],
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
        columns:['id','codigo','nombre','precio'],
        crud:{
            id:'id',
            delete:{
                src:'/',
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
                src:'/',
                text:'',
                icon:'pencil',
                form:'frmSetProducto',
                modal:{
                    id:'SetProductoModal',
                    srcElement:'',
                    setValues:{
                        ids:[],
                        values:[],
                    }
                },
            }
        },
    })
}