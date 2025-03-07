actualizarTabla()

setModal({
    trigger: 'btnCrearRol',
    modal: 'crearRolModal',
    ids: ['titleModal','btnCrear'],
    values:['Crear Rol', 'Guardar'],
    fields:['txtNombre', 'txtDescripcion','selStatus'],
})

setSubmit({
    form:'frmCrearRol',
    uri:'/roles/crearRol',
    modal:'crearRolModal',
    tableFunction:actualizarTabla
})

function actualizarTabla(){
    setTableFromUri({
        src:'/roles/listarRoles',
        table:'tableRoles',
        columns:['nombre','descripcion','status'],
        replaceData:[{
               column:'status',
               values:['1','2'],
               newValues:['<span class="badge bg-success">Activo</span>','<span class="badge bg-danger">Inactivo</span>']
            }, 
        ],
        crud:{
            id:'id',
            delete:{
                src:'/roles/eliminarRol',
                text:'',
                icon:'trash',
                dialog:{
                    title:'Eliminar Rol',
                    text:'¿Desea eliminar el rol?',
                    confirmButtonText:'Sí',
                    denyButtonText:'No',
                    icon:'warning',
                },
                response:{
                    statusTrue:{
                        title:'Elimnar',
                        icon:'success',
                    },
                    statusFalse:{
                        title:'Error',
                        text: 'No se pudo eliminar el registro',
                        icon:'error'
                    }
                },
            },
            update:{
                src:'/roles/actualizarRol',
                text:'',
                icon:'pencil',
                form:'frmCrearRol',
                modal:{
                    id:'crearRolModal',
                    src_element:'/roles/listarRolId',
                    setValues:{
                        ids:['txtNombre','txtDescripcion','selStatus'],
                        values:['nombre','descripcion','status']
                    },
                    replace:{
                        ids:['titleModal','btnCrear'],
                        values:['Actualizar Rol','Actualizar'],
                    },
                },
            },
            buttons:[
                {
                    btnName:'btnPermisosRol',
                    src:'',
                    text:'',
                    icon:'key-fill',
                    style:'btn-secondary',
                    modal:{
                        id:'permisosRolModal',
                        setTable:{
                            src:'/',
                            table:'tablePermisosRol',
                            columns:[''],
                        }
                    }
                }
            ],
        }
    })
}