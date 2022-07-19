// btnCadastrarCliente.addEventListener('click', async () => {
//     const email = document.getElementById("email").value
//     const usuario = document.getElementById("usuario").value
//     const senha = document.getElementById("senha").value

//     const body = new FormData()
//       body.append('email', email)
//       body.append('usuario', usuario)
//       body.append('senha', senha)

//       const response = await fetch(`${baseUrl}salvarCliente.php`, {
//           method: "POST",
//           body
//       })
//   })

onload = async () => {
    btnEntrar = document.getElementById("entrar")

  btnEntrar.addEventListener('click', async () => {
    const inputEmail = document.getElementById('email').value
    const inputSenha = document.getElementById('senha').value

    const body = new FormData()
    body.append('email', inputEmail)
    body.append('senha', inputSenha)

    const response = await fetch(`autenticar.php`, {
      method: "POST",
      body
    })
    const data = await response.json();

    if (data.error) {
      document.getElementById('alert').classList.toggle('d-none')
      setTimeout(() => {
        document.getElementById('alert').classList.toggle('d-none')
      }, 2000)
      logout(false)
    }else {
      const {token, cliente} = data
      localStorage.setItem('token', token)
      localStorage.setItem('cliente', JSON.stringify(cliente))
      location.href="//localhost/julia/redesocial_frontend/clubeRomance.php";
    }
  })
}

  onload = async () => {
    const token = localStorage.getItem('token')
    if (token === null) location.href = "//localhost/julia/redesocial_frontend/criarConta.php"
  }
