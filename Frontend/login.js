const username = document.getElementById('username')
const password = document.getElementById('password')


form.addEventListener('submit', (e) => {
    let message = []
    if(username.value === '' || username.value == null){
        messages.push('username is required')
    }
if(messeges.length > 0 ){
    e.preventDefault()
    errorElement.innerText = messages.join(',')
}
})
