let submitSet
let deleteParams = {}
let updateParams = {}
let modalParams = []
let updating = {
  status: false,
  id: null
}

document.addEventListener('click', (e)=>{

  let target = e.target.closest('button')

  if (target){

    modalParams.forEach((modal) => {
      if (target.id == modal.trigger){
        $('#'+modal.modal).modal('show')
        updating.status = false
        updating.id = null
        modal.fields.forEach((field) => {
          let campo = document.querySelector('#'+field)
          campo.value = ""
        })

        modal.ids.forEach((id, index) => {
          let campo = document.querySelector('#'+id)
          campo.innerText = modal.values[index]
        })
        
      }
    })

    if (target.dataset.action == 'delete'){
      Swal.fire({
        title: deleteParams.dialog.title,
        text: deleteParams.dialog.text,
        showDenyButton: true,
        confirmButtonText: deleteParams.dialog.confirmButtonText,
        denyButtonText: deleteParams.dialog.denyButtonText,
        icon: deleteParams.dialog.icon
      }).then((result) => {
        if (result.isConfirmed) {
          //Eliminar registro
          deleteFromUri(target.dataset.id, deleteParams.src)
        }
      })
    }
  
    if (target.dataset.action == 'update'){
      if (updateParams) {
        $('#'+updateParams.modal.id).modal('show')
        updating.status = true
        updating.id = target.dataset.id
        if ('replace' in updateParams.modal){
          updateParams.modal.replace.ids.forEach((id, index) => {
            let element = document.querySelector('#'+id)
            element.innerHTML = updateParams.modal.replace.values[index]
          })
        }

        let ids = updateParams.modal.setValues.ids
        let values = updateParams.modal.setValues.values

        fetch(base_url + updateParams.modal.src_element + '/' + target.dataset.id)
        .then((res) => res.json())
        .then((data) => {

          ids.forEach((id, index) => {
            let campo = document.querySelector('#'+id)
            campo.value = data[0][values[index]]
          })

        })
        
      }
    }
  }

})

document.addEventListener('submit', (e) => {
  e.preventDefault()

  if (!updating.status){
    if ('form' in submitSet && 'uri' in submitSet){ 
      
      let form =  new FormData(document.querySelector('#'+submitSet.form))
      fetch(base_url + submitSet.uri, {
        method: 'POST',
        body: form
      })
      .then((res) => res.json())
      .then((data) => {
        if (data.status) {
          Swal.fire({
            title: "Registro",
            text: data.msg,
            icon: "success"
          });
          'modal' in submitSet ? $('#'+submitSet.modal).modal('hide') : ''
          'tableFunction' in submitSet ? submitSet.tableFunction() : ''
        }else{
          Swal.fire({
            title: "Error",
            text: data.msg,
            icon: "error"
          });
        }
      })
      .catch((err) => {
        //console.log(err)
      })
      
    }
  }else{
    //aqui se actualiza el registro, se procede a llamar los updateParams
    let form =  new FormData(document.querySelector('#'+updateParams.form))

    fetch(base_url + updateParams.src + '/' + updating.id, {
      method: 'POST',
      body: form
    })
    .then((res) => res.json())
    .then((data) => {
      if (data.status) {
        Swal.fire({
          title: "Registro",
          text: data.msg,
          icon: "success"
        });
        'modal' in updateParams ? $('#'+updateParams.modal.id).modal('hide') : ''
        'tableFunction' in submitSet ? submitSet.tableFunction() : ''
      }else{
        Swal.fire({
          title: "Error",
          text: data.msg,
          icon: "error"
        });
      }
    })
    .catch((err) => {
      ///console.log(err)
    })
  }
  
})


//funcion que me trae parametros del submit
function setSubmit(params){
  submitSet = params
}
  
function setModal(params){
  modalParams.push(params)
}

function setTableFromUri(params){

  if ('crud' in params && 'delete' in params.crud){
    deleteParams = params.crud.delete
  }

  if ('crud' in params && 'update' in params.crud){
    updateParams = params.crud.update
  }

  fetch(base_url + params.src)
  .then((res) => res.json())
  .then((data) => {
    let table = document.getElementById(params.table)
    let html = ''
    let rowId = ''
      
    data.forEach(row => {
      html += `<tr>`

      if('crud' in params && 'id' in params.crud){
        rowId = row[params.crud.id]
      }
      
      Object.entries(row).forEach(([key, value]) => {

        let dataValue = value

        if ('replaceData' in params) {
          params.replaceData.forEach((el) =>{
            if (key == el.column) {
              el.values.forEach((elValue, index) =>{
                if (elValue == value) {
                  dataValue = el.newValues[index]
                }
              })
            }
          })
        }

        if('columns' in params){
          params.columns.forEach((column) => {
            if(key == column){
              html += `<td>${dataValue}</td>`
            }
          })
        }else{
          html += `<td>${dataValue}</td>`
        }
      })

      if('crud' in params && 'id' in params.crud){
        html += `<td>`
        if ('delete' in params.crud){
          html += `<button class="btn btn-danger" data-action="delete" data-id="${rowId}"> <i class="bi bi-${'icon' in params.crud.delete ? params.crud.delete.icon : 'trash' }"></i>  ${ 'text' in params.crud.delete ? params.crud.delete.text : 'Delete'}</button>`
        }

              
        if ('update' in params.crud) {
          html += ' '
          html += `<button class="btn btn-primary" data-action="update" data-id="${rowId}"> <i class="bi bi-${'icon' in params.crud.update ? params.crud.update.icon : 'trash' }"></i>  ${ 'text' in params.crud.update ? params.crud.update.text : 'Update'}</button>` 
        }

        html += `</td>`
      }
        html += `</tr>`
    })
      
    table.innerHTML = html
  })
  .catch(()=>{
      ///Exception occured do something
  })
}   

///funcion interna para eliminar registros

function deleteFromUri(id, src){
  console.log(base_url + src + '/' + id)
  fetch(base_url + src + '/' + id)
  .then((res) => res.json())
  .then((data) => {
    console.log(data)
    if (data.status) {
      let dataText
      'text' in deleteParams.response.statusTrue ? dataText = deleteParams.response.statusTrue.text : dataText = data.msg
      Swal.fire({
        title: deleteParams.response.statusTrue.title,
        text: dataText,
        icon: deleteParams.response.statusTrue.icon
      });
      submitSet.tableFunction()
    }else{
      Swal.fire({
        title: "Error",
        text: data.msg,
        icon: "error"
      });
    }
  }) 
}
