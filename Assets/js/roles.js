actualizarTabla()

setModal({
    trigger: 'btnCrearRol',
    modal: 'crearRolModal',
    ids: ['titleModal','btnCrear'],
    values:['Crear Rol', 'Guardar'],
    fields:['txtNombre', 'txtDescripcion','selStatus'],
})

//TODO: está facil...
//Arreglar el submitset para que se pueda agregar varios formularios con varios submits...
//con el evento e del submit se puede leer el formulario que se envia
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
                            src:'/permisos/getPermiso',
                            table:'tablePermisosRol',
                            columns:['nombre','r','w','u','d'],
                            replaceData:[
                                {
                                    column:'r',
                                    values:['0','1'],
                                    newValues:[
                                        '<div class="form-check form-switch"><input name="r" class="form-check-input" type="checkbox"></div>',
                                        '<div class="form-check form-switch"><input name="r" class="form-check-input" type="checkbox" checked=""></div>'
                                    ],
                                },
                                {
                                    column:'w',
                                    values:['0','1'],
                                    newValues:[
                                        '<div class="form-check form-switch"><input name="w" class="form-check-input" type="checkbox"></div>',
                                        '<div class="form-check form-switch"><input name="w" class="form-check-input" type="checkbox" checked=""></div>'
                                    ],
                                },
                                {
                                    column:'u',
                                    values:['0','1'],
                                    newValues:[
                                        '<div class="form-check form-switch"><input name="u" class="form-check-input" type="checkbox"></div>',
                                        '<div class="form-check form-switch"><input name="u" class="form-check-input" type="checkbox" checked=""></div>'
                                    ],
                                },
                                {
                                    column:'d',
                                    values:['0','1'],
                                    newValues:[
                                        '<div class="form-check form-switch"><input name="d" class="form-check-input" type="checkbox"></div>',
                                        '<div class="form-check form-switch"><input name="d" class="form-check-input" type="checkbox" checked=""></div>'
                                    ],
                                },
                            ]
                        }
                    }
                }
            ],
        }
    })
}