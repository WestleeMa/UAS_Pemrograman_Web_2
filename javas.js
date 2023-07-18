function Buy(){
    alert("Contact: 081234567890\nJl. Duren mangga raya No.10, RT.6/RW.9.");
}

function stock(){
    document.getElementById("stocker").innerHTML="In Stock";
    document.getElementById("stocker1").innerHTML="In Stock";

    const item3 = document.getElementById("stocker2")
    item3.innerHTML="Out of Stock";
    item3.style.color="red";
    
    document.getElementById("stocker3").innerHTML="In Stock";
}

function stocksoft(){
    document.getElementById("stocker").innerHTML="In Stock";
    document.getElementById("stocker1").innerHTML="In Stock";
    document.getElementById("stocker2").innerHTML="In Stock";
}

function search(){
    alert("Mohon Maaf! Fungsi pencarian sedang dalam tahap pengembangan")
}

function balik(){
    window.history.go(-1);
    return false;
}