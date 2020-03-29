document.getElementById('username').addEventListener("keyup", event => {
    let searchInput = new FormData()
    searchInput.set('uid', event.target.value)
    axios({method: 'post', url: 'signup.php', data: searchInput, headers: {'Content-Type': 'multipart/form-data' }})
    .then(function(response) {
      console.log(response)
  })
  })