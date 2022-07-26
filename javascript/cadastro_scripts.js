
//CADASTRAR

onload = async () => {
  // const token = localStorage.getItem('token')
  // if (token === null) location.href = "//localhost/julia/redesocial_frontend/criarConta.php"

  btnCadastrarCliente = document.getElementById("cadastrarCliente")

  btnCadastrarCliente.addEventListener('click', async () => {
    const email = document.getElementById("email").value
    const usuario = document.getElementById("usuario").value
    const senha = document.getElementById("senha").value
 
      const body = new FormData()
        body.append('email', email)
        body.append('usuario', usuario)
        body.append('senha', senha)
 
        const response = await fetch(`../redesocial_backend/salvarCliente.php`, {
            method: "POST",
            body
        })
  })
}


//LOGOUT

