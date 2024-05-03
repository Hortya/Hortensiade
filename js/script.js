// menu burger
document.getElementById('menu-burger').addEventListener('click', (event) => {
    document.getElementById('burger-container').classList.toggle('menu-burger__container');
    document.getElementById('burger-container').classList.toggle('gradient');
    document.getElementById('menu-burger').classList.toggle('menu-burger__quit');
    document.querySelectorAll('.js-menu-burger').forEach(function (jsBurger) {
        jsBurger.classList.toggle('menu-burger__itm');
    })
})






fetch('../json/main-branch.json').then(response => {
    return response.json();
}).then(jsonStory => {

  letTheStoryGoesOn(jsonStory);
  clickToUnrollStory();

})

//on click, get the json file and call the function to print it in the html
function clickToUnrollStory(){
    // On click, the story goes on 
    document.getElementById('history-container').addEventListener('click', function (event) {
        if (!event.target.classList.contains('history__btn')) return;
        const choice = event.target.dataset.id;
        fetch(`../json/branch-${choice}.json`).then(response => {
            return response.json();
        }).then(jsonStory => {
            document.getElementById('playGroundContent').remove();
            letTheStoryGoesOn (jsonStory);
            clickToUnrollStory();
        })
    })
}



/**
 * Get the Json file and inject it in the html
 * @param {array} jsonStory 
 */
function letTheStoryGoesOn (jsonStory){
    const story = document.importNode(document.getElementById('storyTemplate').content, true);
    story.getElementById('history').textContent = jsonStory[0].story;
    document.getElementById('playGround').appendChild(story);
    let i = 1;
    const btnContainer = document.getElementById('history-container');
    jsonStory[0].choices.forEach(choice =>{
        const btn = document.importNode(document.getElementById('buttonTemplate').content, true);
        btn.querySelector('.js-btn').textContent = choice.txt;
        btn.querySelector('.js-btn').dataset.id = choice.id;
        btnContainer.appendChild(btn);
        i++;
    })
}