const base_api = "";

const form = document.getElementById("login-form");

form.addEventListener('submit', (e)=>{
    e.preventDefault();

    const email_phone = document.getElementById('email-phone').value;
    const pass = document.getElementById("password").value;
    const data = new FormData();
    if (validateEmail(email_phone)){
        data.append("email", email_phone);
    }else{
        data.append("phone", email_phone);
    }
    
    data.append("password", pass);
    console.log(data);


    const checkLogin = async ()=>{
        const response = await axios.post("http://localhost/digital-wallet/server/user/v1/login.php", data);
        if(response.data.id == false){
            alert("Wrong credentials");
        }else{
            console.log("we have contact");
            localStorage.setItem("id", response.data.id);
            window.location.href = "./client/mainclient.html";
        }
    }

    checkLogin();
})



const validateEmail = (email)=> {
    
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
    return emailPattern.test(email);
        
};