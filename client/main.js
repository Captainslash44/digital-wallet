const credits = (name, lastname) => ` ${name} ${lastname}`;

if(localStorage.length == 0){
    alert("resubmission required");
    window.location.href = "../index.html";
}
const data = new FormData();
data.append("id", localStorage.getItem("id"));


const loadCredits = async ()=>{
    const response = await axios.post("http://localhost/digital-wallet/server/user/v1/loadUser.php",data);

    const {name, lastname} = response.data;
    document.getElementById("main-title").innerHTML += credits(name, lastname);

    
}

loadCredits();

const logout_button = document.getElementById("logout-button");
logout_button.addEventListener("click", ()=>{
    localStorage.clear();
    window.location.href = "../index.html";
})