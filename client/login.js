const form = document.getElementById("login-form");

form.addEventListener('submit', (e)=>{
    e.preventDefault();

    const email_phone = document.getElementById('email-phone').value;
    const pass = document.getElementById("password").value;
    const data = {"email":email_phone, "password": pass};
    console.log(data);


    axios.post("http://localhost/digital-wallet/server/user/v1/login.php",{data},{headers: {"Content-Type":"application/json"}})
    .then(res => console.log(res));
})