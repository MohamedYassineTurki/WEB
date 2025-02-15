let difficulty=document.querySelector("#difficulty");
let attemptsmessage=document.querySelector("#attempts-message");
let startbutton=document.querySelector("#start-button");
let attemptsvalue=document.querySelector("#attempts-value");
let guessinput=document.querySelector("#guess")
let submitbutton=document.querySelector("#submit-button");

let attempts;
let number;
let gamestarted=false;

difficulty.addEventListener("change",AttemptsMessage);
startbutton.addEventListener("click",StartGame);
submitbutton.addEventListener("click",SubmitGuess);


function AttemptsMessage(){
    let difficultyValue=difficulty.value;
    let message;
    if(difficultyValue=="easy") message="You will have 10 attempts ";
    else if(difficultyValue=="medium") message="You will have 5 attempts ";
    else if(difficultyValue=="hard") message="You will have 3 attempts ";

    attemptsmessage.textContent=message;
}

function StartGame(){
    let difficultyValue=difficulty.value;
    if(difficultyValue=="easy") attempts=10;
    else if(difficultyValue=="medium") attempts=5;
    else if(difficultyValue=="hard") attempts=3;
    else{
        alert("Please select a difficulty.");
        return;
    }
    gamestarted=true;

    number=Math.floor(Math.random()*100)+1;

    attemptsvalue.textContent=`you have ${attempts} attempts left`;
}

function SubmitGuess(){
    if(!gamestarted){
        alert("Please start a new game.");
        return;
    }
    if (attempts <= 0) {
        alert("No attempts left. Please start a new game.");
        return;
    }
    let guess=Number(guessinput.value);
    if(isNaN(guess) || guess<1 || guess>100){
        alert("Please enter a valid number.");
        return;
    }
    attempts--;
    if(guess==number){
        alert("Congratulations! You guessed the number.");
        attemptsvalue.textContent='';
    }
    else if(guess<number){
        alert("Too low! Guess again.");
        attemptsvalue.textContent=`You have ${attempts} attempts left`;
        guessinput.value='';
    }
    else{
        alert("Too high! Guess again.");
        attemptsvalue.textContent=`You have ${attempts} attempts left`;
        guessinput.value='';
    }
}

