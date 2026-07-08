// Search Table

const searchInput = document.querySelector("#searchRoom");

if(searchInput){

searchInput.addEventListener("keyup",function(){

    let keyword=this.value.toLowerCase();

    let rows=document.querySelectorAll("tbody tr");

    rows.forEach(row=>{

        row.style.display=row.innerText.toLowerCase().includes(keyword)
        ? ""
        : "none";

    });

});

}

console.log("Room Page Loaded");