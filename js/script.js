document.getElementById('history-container').addEventListener('click', function (event){
    if(!event.target.classList.contains('history__btn')) return;
    document.getElementById('history').innerHTML = 'lol';
})