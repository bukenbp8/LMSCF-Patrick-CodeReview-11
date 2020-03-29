window.onload = function() {
    window.setTimeout(fadeout, 1000);
    window.setTimeout(removeDiv, 2000);
}

function fadeout() {
  document.getElementById('fadeout').style.opacity = '0';
}

function removeDiv() {
  document.getElementById('fadeout').style.display = 'none';
}

document.getElementById('search').addEventListener("keyup", event => {
  let searchInput = new FormData()
  searchInput.set('search', event.target.value)
  axios({method: 'post', url: 'pets_output.php', data: searchInput, headers: {'Content-Type': 'multipart/form-data' }})
  .then(function(response) {
    document.getElementById('result').innerHTML = response.data
})
})

