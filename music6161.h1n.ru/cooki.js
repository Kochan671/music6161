function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}
let cookiecook = getCookie("cookiecook"),
cookiewin = document.getElementsByClassName('cookie_notice')[0];    
if (cookiecook != "no") {
    cookiewin.style.display="block";
    document.getElementById("cookie_close").addEventListener("click", function(){
        cookiewin.style.display="none";    
        let date = new Date;
        date.setDate(date.getDate() + 1);    
        document.cookie = "cookiecook=no; path=/; expires=" + date.toUTCString();               
    });
}

document.getElementById("accept").addEventListener("click", function(){
    let date = new Date;
    date.setDate(date.getDate() + 1);    
    document.cookie = "cookiecook=no; path=/; expires=" + date.toUTCString();      
});

document.getElementById("cancel").addEventListener("click", function(){
    window.location = "https://kanc-mir-plus.ru/";
});

let accept = getElementById('accept')
