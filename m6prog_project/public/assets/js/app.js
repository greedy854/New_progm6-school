function searchPersoon(event){
    event.preventDefault();

    let form = event.target;
    const data = new FormData(form);
    let url = "searchNaw.php?search="+data.get("searchPersoon");

    console.log(url);

    fetch(url)
    .then(async (response)=>
    {
        console.log(response);
        let json = await response.json();
        console.log(json);
    });
}

const searchForm = document.getElementById("searchForm");

searchForm.addEventListener("submit",(event) =>{
    searchPersoon(event);
    event.preventDefault();
});

function showPerson(json){
    let person = json[0];

    document.getElementById("naam").textContent = person.naam;
    document.getElementById("straat").textContent = person.naam;
    document.getElementById("huisnummer").textContent = person.naam;
    document.getElementById("postcode").textContent = person.naam;
    document.getElementById("email").textContent = person.naam;
}

fetch(url)
    .then(async (response) =>{
        console.log(response);
        let json = await response.json();
        console.log(json); 
        showPerson(json); 
    });