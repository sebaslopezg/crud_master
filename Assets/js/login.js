//

setSubmit({
    form: 'formLogin',
    uri: '/login/loginUser',
    tableFunction: relocate
})

function relocate(){
    window.location = base_url + '/dashboard'
}