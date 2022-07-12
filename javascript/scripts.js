btnCadastrarCliente.addEventListener('click', async () => {
    const email = document.getElementById("email").value
    const usuario = document.getElementById("usuario").value
    const senha = document.getElementById("senha").value

    const body = new FormData()
      body.append('email', email)
      body.append('usuario', usuario)
      body.append('senha', senha)

      const response = await fetch(`${baseUrl}salvarCliente.php`, {
          method: "POST",
          body
      })
  })