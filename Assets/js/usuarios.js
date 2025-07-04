actualizarTabla()

setModal({
    trigger: 'btnCrearUsuario',
    modal: 'crearUsuarioModal',
    ids: ['titleModal','btnEnviar'],
    values: ['Crear Usuario','Enviar'],
    fields: ['txtDocumento','txtNombre','txtApellido','txtPass','txtEmail','tipoDocumento','tipoRol'],
    setSelect:{
        src:'/roles/listarRoles',
        id:'tipoRol',
        optionValue:'id',
        tagContent:'nombre'
    }
})

setSubmit({
    form: 'frmCrearUsuario',
    uri: '/usuarios/crearUsuario',
    modal: 'crearUsuarioModal',
    tableFunction: actualizarTabla
})

function actualizarTabla(){
    setTableFromUri({
        src: '/usuarios/listarUsuarios',
        table: 'tableUsuarios',
        columns: ['documento', 'nombres', 'apellidos','rol'],
        crud:{
            id : 'id',
            delete:{
                src: '/usuarios/eliminarUsuario',
                text: '',
                tableFunction:actualizarTabla,
                icon:'trash',
                dialog:{
                    title: 'Eliminar Usuario',
                    text: '¿Desea eliminar el usuario?',
                    confirmButtonText: 'Sí',
                    denyButtonText: 'Nope',
                    icon: 'warning'
                },
                response:{
                    statusTrue:{
                      title: 'Eliminar',
                      icon: "success",
                    },
                    statusFalse:{
                      title: "Error",
                      text: "No se pudo eliminar el registro",
                      icon: "error"
                    }
                }
            },
            update:{
                src: '/usuarios/actualizarUsuario',
                text: '',
                icon:'pencil',
                form: 'frmCrearUsuario',
                modal:{
                    id:'crearUsuarioModal',
                    srcElement: '/usuarios/traerUsuario/',
                    setValues:{
                        ids:['txtDocumento','txtNombre','txtApellido','txtEmail','tipoDocumento'],
                        values:['documento','nombres','apellidos','email','tipo_documento']
                    },
                    setSelect:{
                        src:'/roles/listarRoles',
                        id:'tipoRol',
                        optionValue:'id',
                        optionValueFromSrcElement:'rol_id',
                        tagContent:'nombre'
                    },
                    replace:{
                        ids:['btnEnviar', 'titleModal'],
                        values:['Actualizar', 'Actualizar Usuario']
                      }
                }
            },
        }
    })
}