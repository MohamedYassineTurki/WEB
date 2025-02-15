let colorlist=document.querySelector('#color-list');

colorlist.querySelectorAll('li').forEach(li => {
        li.addEventListener('click', Changecolor);
    });

function Changecolor() {
    this.style.color = getRandomColor(); }

function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}