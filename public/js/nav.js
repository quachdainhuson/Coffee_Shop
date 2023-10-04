

window.addEventListener("scroll", function(){ 
    var header = document.querySelector("header"); 
    header.classList.toggle("sticky", window.scrollY > 0); 
})

let searchForm = document.querySelector('.search-form');
document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active')
}

function toggleSearchBar() {
    var searchBar = document.getElementById('search_bar');
    if (searchBar.style.display === 'none' || searchBar.style.display === '') {
        searchBar.style.display = 'block';
    } else {
        searchBar.style.display = 'none';
    }
}