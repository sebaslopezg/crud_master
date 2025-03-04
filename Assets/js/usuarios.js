actualizarTabla()

setModal({
    trigger: 'btnCrearUsuario',
    modal: 'crearUsuarioModal',
    ids: ['titleModal','btnEnviar'],
    values: ['Crear Usuario','Enviar'],
    fields: ['txtDocumento','txtNombre','txtApellido'],
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
        columns: ['documento', 'nombres', 'apellidos'],
        crud:{
            id : 'id',
            delete:{
                src: '/usuarios/eliminarUsuario',
                text: '',
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
                src: '/',
                text: '',
                icon:'pencil',
                form: 'frmCrearUsuario',
                modal:{
                    id:'crearUsuarioModal',
                    src_element: '',
                }
            },
        }
    })
}