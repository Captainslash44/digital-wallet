
const register = document.getElementById("signup-button");

register.addEventListener('click', (e) => {
    e.preventDefault();
    console.log("nice");

    const name = document.getElementById("name").value.trim();
    const last_name = document.getElementById("last-name").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone-num").value.trim();
    const password = document.getElementById("pass").value.trim();
    const confirmed_password = document.getElementById("confirmed-pass").value.trim();
    
    let checker = false;
    let alert_message = "";
    const data = new FormData();
    if(confirmed_password != password){
        alert_message += "Passwords don't match;"
        console.log("incorrect")
    }else{
        if (checkContent(name)&&
        checkContent(last_name)&&
        checkContent(email)&&
        checkContent(phone)&&
        checkContent(password)&&
        checkContent(confirmed_password)){
        data.append("name", name);
        data.append("lastname", last_name);
        data.append("email", email);
        data.append("password", password);
        data.append("phone", phone);
        console.log("correct.")
        checker = true;
        }else{
        alert("Please fil out all fields.")
        console.log("Incorrect");
        console.log(checkContent(name));
    }
    }

    if (!validateEmail(email)){
        checker = false;
        alert_message += " Invalid Email;"
    }
    
    if (!validatePassword(password) || password.length < 8){
        checker = false;
        alert_message += " Invalid Password Format;"
    }

    if (phone.length < 8){
        checker = false;
        alert_message += " Invalid phone number;"
    }
    

    if(checker){
        const checkCredentials = async () =>{
            const response = await axios.post("http://localhost/digital-wallet/server/user/v1/checkCredentials.php", data);
            if (response.data["message"]){
                return true;
            }else{
                return false;
            }
        }

        if(checkCredentials){
            axios.post("http://localhost/digital-wallet/server/user/v1/signup.php", data)
            .then(response => {const message =  response.data.message;
                if(message == "already exists"){
                    alert("User already exists");
                }else{
                    console.log("we have contact");
                    window.location.href = "../index.html";
                }
            });

            
            
            
        }



    }else{
        alert(alert_message);
    }
    
}
)

const checkContent = (content)=>{
    if (content == ""){
        return false;
    }else{
        return true;
    }
}

const validateEmail = (email)=> {
    
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
    return emailPattern.test(email);
        
};

const validatePassword = (password) => {
    const passwordPattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    return passwordPattern.test(password);
}
