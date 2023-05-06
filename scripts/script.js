let search = document.getElementsByClassName('search_result')[0];
let json_url = "/data/movie.json";
let search_input = document.getElementById('search_input');
let card = document.getElementsByClassName('card');

fetch(json_url).then(Response => Response.json()).then((data) => {
  // code to display movie data
  data.forEach(ele => {
    let {name, date, poster, genre, type, url} = ele;
    let card = document.createElement('a');
    card.classList.add('card');
    card.href = url;
    card.href = `/movies/${name.toLowerCase().replace(/\s+/g, '-')}.html`;
    card.innerHTML = `
     <img src="${poster}" alt="${name}">
     <div class="cont">
       <h3>${name}</h3>
       <p>${genre} <span>${type}</span> | <span>${date}</span>
       </p>
     </div> `
    search.appendChild(card);
  });
}).catch((error) => {
  console.error('Error:', error);
});

// search filter
search_input.addEventListener('keyup', ()=>{
  let filter = search_input.value.toUpperCase();
  let a = search.getElementsByClassName('cont');
  for (var index = 0; index < a.length; index++) {
    let b = a[index];
    let TextValue = b.textContent || b.innerText;
    if (TextValue.toUpperCase().indexOf(filter) > -1) {
      b.parentNode.style.display = "flex";
      search.style.visibility = "visible";
      search.style.opacity = "1";
    } else {
      b.parentNode.style.display = "none";
    }
    if (search_input.value == 0) {
      search.style.visibility = "hidden";
      search.style.opacity = "0";
    }
  }
});
