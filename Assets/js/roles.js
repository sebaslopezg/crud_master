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
setSubmit({
    form:'frmsetPermisos',
    uri:'/permisos/setPermisos',
    hiddenInput:'rolId',
    modal:'permisosRolModal',
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
                tableFunction:actualizarTabla,
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
                    srcElement:'/roles/listarRolId',
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
                        srcElement:'/roles/listarRolId',
                        setValues:{
                            ids:['rolId'],
                            values:['id']
                        },
                        setTable:{
                            src:'/permisos/getPermiso',
                            idParameter: true,
                            table:'tablePermisosRol',
                            columns:['nombre','r','w','u','d'],
                            replaceData:[
                                {
                                    column:'r',
                                    values:['0','1'],
                                    setIdValue:'idModulo',
                                    newValues:[
                                        '<div class="form-check form-switch"><input name="modulos[idModulo][r]" class="form-check-input" type="checkbox"></div>',
                                        '<div class="form-check form-switch"><input name="modulos[idModulo][r]" class="form-check-input" type="checkbox" checked></div>'
                                    ],
                                },
                                {
                                    column:'w',
                                    values:['0','1'],
                                    setIdValue:'idModulo',
                                    newValues:[
                                        '<div class="form-check form-switch"><input name="modulos[idModulo][w]" class="form-check-input" type="checkbox"></div>',
                                        '<div class="form-check form-switch"><input name="modulos[idModulo][w]" class="form-check-input" type="checkbox" checked=""></div>'
                                    ],
                                },
                                {
                                    column:'u',
                                    values:['0','1'],
                                    setIdValue:'idModulo',
                                    newValues:[
                                        '<div class="form-check form-switch"><input name="modulos[idModulo][u]" class="form-check-input" type="checkbox"></div>',
                                        '<div class="form-check form-switch"><input name="modulos[idModulo][u]" class="form-check-input" type="checkbox" checked=""></div>'
                                    ],
                                },
                                {
                                    column:'d',
                                    values:['0','1'],
                                    setIdValue:'idModulo',
                                    newValues:[
                                        '<div class="form-check form-switch"><input name="modulos[idModulo][d]" class="form-check-input" type="checkbox"></div>',
                                        '<div class="form-check form-switch"><input name="modulos[idModulo][d]" class="form-check-input" type="checkbox" checked=""></div>'
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