const frontendUrl = '//localhost/julia/redesocial_frontend/'
const goHome = `${frontendUrl}home.php`
const privateUrl = `${frontendUrl}privado/index.php`

const logout = (redirect = true) => {
    localStorage.removeItem('token')
    localStorage.removeItem('cliente')
    if (redirect)
        location.href=goHome
}