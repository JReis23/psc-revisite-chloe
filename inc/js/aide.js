
/* 4B */
var spanAideNbCommunes4B=document.getElementById("nbCommunes4B")

spanAideNbCommunes4B.addEventListener("focus",function(){
    document.getElementById("aide_nbCommunes4B").textContent="2 chiffres maximum"
})

spanAideNbCommunes4B.addEventListener("blur",function(){
    document.getElementById("aide_nbCommunes4B").textContent=""
})



var spanAideNbHabitants4B=document.getElementById("nbHabitants4B")

spanAideNbHabitants4B.addEventListener("focus",function(){
    document.getElementById("aide_nbHabitants4B").textContent="5 chiffres maximum"
})

spanAideNbHabitants4B.addEventListener("blur",function(){
    document.getElementById("aide_nbHabitants4B").textContent=""
})




/* LTD */
var spanAideNbCommunesLTD=document.getElementById("nbCommunesLTD")


spanAideNbCommunesLTD.addEventListener("focus",function(){
    document.getElementById("aide_nbCommunesLTD").textContent="2 chiffres maximum"
})

spanAideNbCommunesLTD.addEventListener("blur",function(){
    document.getElementById("aide_nbCommunesLTD").textContent=" "
})



var spanAideNbHabitantsLTD=document.getElementById("nbHabitantsLTD")

spanAideNbHabitantsLTD.addEventListener("focus",function(){
    document.getElementById("aide_nbHabitantsLTD").textContent="5 chiffres maximum"
})

spanAideNbHabitantsLTD.addEventListener("blur",function(){
    document.getElementById("aide_nbHabitantsLTD").textContent=""
})

