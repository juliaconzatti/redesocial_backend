//FAZER LOGIN
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
      const {token, email} = data
      localStorage.setCliente('token', token)
      localStorage.setCliente('cliente', JSON.stringify(email))
      location.href="//localhost/julia/redesocial_frontend/clubeRomance.php";
    }
  })
}