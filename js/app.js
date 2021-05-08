//Al cargar la pagina------------------------------------------------------------------------------
window.addEventListener('load', () => {
  fetch("php/obtener_tipo.php", {
    method: "GET",
    headers: {
      "Content-Type": "application/json"
    }
  }).then(res => {
    if(res.ok){
      res.json().then(data => {
        document.getElementById('inputTipo').innerHTML = ''
        for (const valor of data) {
          document.getElementById('inputTipo').innerHTML += `
            <option>${valor.tipo}</option>
          `
        }
      })
    }else{
      alert('Algo salio mal')
    }
  })

  getUsers()
})

//Guardado de la info-------------------------------------------------------------------------------
var formRegistro = document.getElementById('formRegistro')

formRegistro.addEventListener('submit', async event => {
  event.preventDefault()
  var user = new FormData(formRegistro)
  
  fetch("php/registrar.php", {
    method: 'POST',
    body: user
  }).then(res => res.json())
    .then(data => {
      console.log(data)
      getUsers()
    })
})

//obtener usuarios
function getUsers(){
  fetch("php/obtener_user.php", {
    method: "GET",
    headers: {
      "Content-Type": "application/json"
    }
  }).then(res => {
    if(res.ok){
      res.json().then(data => {
        document.getElementById('body').innerHTML = ''
        for (const valor of data) {
          document.getElementById('body').innerHTML += `
            <tr>
              <th scope="row">${valor.id}</th>
              <td>${valor.nombre}</td>
              <td>${valor.correo}</td>
              <td>${valor.tipo}</td>
            </tr>
          `
        }
      })
    }else{
      alert('Algo salio mal')
    }
  })
}
