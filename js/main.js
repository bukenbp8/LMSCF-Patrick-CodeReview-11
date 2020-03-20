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