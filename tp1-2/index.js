let textcolor=document.querySelector("#text-color");
let textsize=document.querySelector("#text-size");
let textfont=document.querySelector("#text-font");
let text=document.querySelector("#text");

textcolor.addEventListener("input",Changetextcolor);
textsize.addEventListener("input",Changetextsize);
textfont.addEventListener("change",Changetextfont);

function Changetextcolor(){
    text.style.color=textcolor.value;
}

function Changetextsize(){
    text.style.fontSize=textsize.value+"px";
}

function Changetextfont(){  
    text.style.fontFamily=textfont.value;
}   