
actualizarTabla()

setSubmit({
  form: 'frmCrearRetistro',
  uri: '/registros/crearRegistro',
  modal: 'crearRegistroModal',
  tableFunction: actualizarTabla
})

setButtonPermit({
  id:'btnCrearRegistro',
  permitType:'create',
})

setModal({
  trigger: 'btnCrearRegistro',
  modal: 'crearRegistroModal',
  ids: ['titleModal','btnCrear'],
  values: ['Crear Registro','Crear'],
  fields: ['txtNombre','txtApellido'],
})

function actualizarTabla(){
  setTableFromUri({
    src: '/registros/getRegistros',
    table: 'myTable',
    columns: ['nombre', 'apellido'],
    crud: {
      id : 'id',
      delete:{
        src: '/registros/eliminarRegistro',
        text: '',
        icon:'trash',
        setPermit:true,
        tableFunction:actualizarTabla,
        dialog:{
          title: 'Eliminar registro',
          text: '¿Desea eliminar el registro?',
          confirmButtonText: 'Sí',
          denyButtonText: 'NO',
          icon: 'error'
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
        src: '/registros/actualizarRegistro',
        form: 'frmCrearRetistro',
        setPermit:true,
        modal: {
          id:'crearRegistroModal',
          srcElement: '/registros/getRegistrosById',
          setValues:{
            ids:['txtNombre','txtApellido'],
            values:['nombre','apellido']
          },
          replace:{
            ids:['btnCrear', 'titleModal'],
            values:['Actualizar', 'Actualizar Registro']
          }
        }
      }
    }
  })
}