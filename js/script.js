// menu burger
document.getElementById('menu-burger').addEventListener('click', (event)=>{
    document.getElementById('burger-container').classList.toggle('menu-burger__container');
    document.getElementById('burger-container').classList.toggle('gradient');
    document.getElementById('menu-burger').classList.toggle('menu-burger__quit');
    document.querySelectorAll('.js-menu-burger').forEach(function (jsBurger){
        jsBurger.classList.toggle('menu-burger__itm');
    })
})





let json = [];
fetch('../json/main-branch.json').then(response => {
    return json = response.json();
}).then(jsonStory => {
    const storyTemplate = document.getElementById('storyTemplate');
    const story = document.importNode(storyTemplate.content, true);
    story.getElementById('history').textContent = jsonStory[0].story;
   
    story.getElementById('historyBtn1').textContent = jsonStory[0]['choice-1-txt'];
    story.getElementById('historyBtn1').dataset.id = jsonStory[0]['choice-1-id'];
    
    story.getElementById('historyBtn2').textContent = jsonStory[0]['choice-2-txt'];
    story.getElementById('historyBtn2').dataset.id = jsonStory[0]['choice-2-id'];
    
    story.getElementById('historyBtn3').textContent = jsonStory[0]['choice-3-txt'];
    story.getElementById('historyBtn3').dataset.id = jsonStory[0]['choice-3-id'];

    document.getElementById('playGround').appendChild(story)

})







// document.getElementById('history-container').addEventListener('click', function (event){
//     if(!event.target.classList.contains('history__btn')) return;
//     document.getElementById('history').innerHTML = getRandomBinaryText();
//     event.target.innerHTML = getRandomBinaryText();
// })

// function getRandomBinaryText(){
//     const max = Math.floor(Math.random() * 100) + 1;
//     let txt = '';
//     for(let i = 0; i < max; i++){
//         txt += Math.floor((Math.random() * 50) % 2).toString(36);
//     }
//     console.log(txt);
//     return txt;
// }