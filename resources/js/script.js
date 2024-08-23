// menu burger
document.getElementById('menu-burger').addEventListener('click', (event) => {
    document.getElementById('burger-container').classList.toggle('menu-burger__container');
    document.getElementById('burger-container').classList.toggle('gradient');
    document.getElementById('menu-burger').classList.toggle('menu-burger__quit');
    document.querySelectorAll('.js-menu-burger').forEach(function (jsBurger) {
        jsBurger.classList.toggle('menu-burger__itm');
    })
})

const error = {
    'longerPassword': 'Veuillez saissir un mot de passe de plus de 5 caractères.',
    'smallerPassword': 'Veuillez saissir un mot de passe de moins de 30 caractères.',
    'longerUser': 'Veuillez saissir un nom d\'utilisateur de plus de 5 caractères.',
    'smallerUser': 'Veuillez saissir un nom d\'utilisateur de moins de 30 caractères.'
};

//on click, call the API and call the function to print it in the html
function clickToUnrollStory() {
    // On click on a button, the story goes on 
    document.getElementById('history-container').addEventListener('click', function (event) {
        if (!event.target.classList.contains('history__btn')) return;
        const choice = event.target.dataset.id;
        callAPI('POST', { action: 'choice', id: choice })
            .then(jsonStory => {
                //remove the previous story...
                document.getElementById('playGroundContent').remove();
                //...and inject the next one
                letTheStoryGoesOn(jsonStory);
                console.log(jsonStory[0].object);
                //then, do it again and again
                clickToUnrollStory();
            })
    })
}



/**
 * Get the Json file and inject it in the html
 * @param {array} jsonStory the json file
 */
function letTheStoryGoesOn(jsonStory) {
    //inject story's text
    const story = document.importNode(document.getElementById('storyTemplate').content, true);
    story.getElementById('history').textContent = jsonStory[0].text;
    document.getElementById('playGround').appendChild(story);
    //inject story's button
    const btnContainer = document.getElementById('history-container');
    jsonStory.forEach(choice => {
        const btn = document.importNode(document.getElementById('buttonTemplate').content, true);
        btn.querySelector('.js-btn').textContent = choice.choice;
        btn.querySelector('.js-btn').dataset.id = choice.id;
        btnContainer.appendChild(btn);
    })
}


async function callAPI(method, params) {
    try {
        let obj = {}
        if (method != 'GET') {
            obj = {
                method: method,
                body: JSON.stringify(params),
                headers: {
                    'Content-type': 'application/json'
                }
            };
            params = '';
        }
        else {
            params = '?' + constructRequest(params);
        }
        const response = await fetch(`../php/api.php${params}`, obj);
        const json = await response.json();
        return json
    }
    catch (error) {
        console.error("Something went wrong : " + error);
    }
}


function constructRequest(params) {
    let request = '';
    for (const value in params) {
        request += `${value}=${params[value]}&`;
    }
    //return the string whitout the last '&'
    return request.slice(0, -1);
}


// callAPI('POST', {action: 'choice', id: 0}).then(jsonStory => {
//   letTheStoryGoesOn(jsonStory);
//   clickToUnrollStory();
// })



function displayError(error, locationP, locationS) {
    const errormessage = document.createElement('p');
    errormessage.classList = 'error js-error';
    errormessage.textContent = error;
    locationP.insertBefore(errormessage, locationS);
}

