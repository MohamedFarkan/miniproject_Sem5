//alert('hi');
const form = document.getElementById('form');
const userName = document.getElementById('username');
const eMail = document.getElementById('email');
const Pass = document.getElementById('password');
alert(userName);
//validation();
/*form.addEventListener('submit',e =>{
    e.preventDefault()

    validation()
}) */
validation();
function validation()
{
   
//const validation = () =>{
    usernameValue = userName.value.trim()
    emailValue = eMail.value.trim()
    passwordValue = Pass.value.trim()
    alert(usernameValue);
    if(usernameValue === ''){
        alert(userName, 'Username Cannot Be Empty !!')
    }
        else{
            alert(userName);
        }
    if(emailValue === ''){
        alert(eMail, 'Email Cannot Be Empty !!')
    }
        else{
            alert(eMail);
        }
    if((passwordValue === '') && (passwordValue < 8)){
        alert(Pass, 'Password Must Contain More Than 8 Characters !!')
    }
        else{
            alert(userName);
        }
}