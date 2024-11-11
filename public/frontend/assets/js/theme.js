
const body = document.querySelector('body');
const nav = document.querySelector('nav');
const theme = document.getElementById('theme');   //الأب للأيقونتين

let getMode = localStorage.getItem("mode");
if(getMode && getMode === "dark-mode"){
    body.classList.add("dark-mode")
}

theme.addEventListener('click' , () => {
    theme.classList.toggle("active");
    body.classList.toggle('dark-mode');

    if (!body.classList.contains("dark-mode")){
        localStorage.setItem("mode" , "light-mode");
    }else{
        localStorage.setItem("mode" , "dark-mode");
    }
});

