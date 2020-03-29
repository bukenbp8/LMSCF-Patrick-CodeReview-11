let typeAnimal = document.getElementById("typeAnimal");
let small = document.getElementById("website");
let big = document.getElementById("hobbies");
let smallL = document.getElementById("websiteL");
let bigL = document.getElementById("hobbiesL");
let age = document.getElementById("age");
let date = document.getElementById("date");
let dateL = document.getElementById("dateL");


big.hidden = true;
bigL.hidden = true;

date.hidden = true;
dateL.hidden = true;

typeAnimal.addEventListener("change", function(){
  if(typeAnimal.value === "small") {
    small.hidden = false;
    smallL.hidden = false;
    big.hidden = true;
    bigL.hidden = true;
  } else {
    small.hidden = true;
    smallL.hidden = true;
    big.hidden = false;
    bigL.hidden = false;
  }
});

age.addEventListener("keyup", function() {
    if(age.value >= 8) { 
        date.hidden = false;
        dateL.hidden = false;
    } else {
        date.hidden = true;
        dateL.hidden = true;
    }
})
    