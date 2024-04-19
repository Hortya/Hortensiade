document.getElementById('menu-burger').addEventListener('click', (event)=>{
    document.getElementById('burger-container').classList.toggle('menu-burger__container');
    document.getElementById('burger-container').classList.toggle('gradient');
    document.getElementById('menu-burger').classList.toggle('menu-burger__quit');
    document.querySelectorAll('.js-menu-burger').forEach(function (jsBurger){
        jsBurger.classList.toggle('menu-burger__itm');
    })
})













document.getElementById('history-container').addEventListener('click', function (event){
    if(!event.target.classList.contains('history__btn')) return;
    document.getElementById('history').innerHTML = getRandomBinaryText();
    event.target.innerHTML = getRandomBinaryText();
})

function getRandomBinaryText(){
    const max = Math.floor(Math.random() * 100) + 1;
    let txt = '';
    for(let i = 0; i < max; i++){
        txt += Math.floor((Math.random() * 50) % 2).toString(36);
    }
    console.log(txt);
    return txt;
}