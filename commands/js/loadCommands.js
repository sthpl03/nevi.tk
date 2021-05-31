const categories = [
    'animal',
    'fun',
    'management',
    'miscellaneous',
    'moderation',
];

let selectedCategory = categories[0];

function loadCommands(c) {
    $.getJSON(`./commands/${c}.json`, commands => {
        $('#commands').empty();
        commands.forEach(command => {
            $('#commands').append(`<div class='command' id='${command.name}'></div>`);
            Object.keys(command).forEach(key => {
                let capitalizedKey = key[0].toUpperCase() + key.slice(1);
                if(Array.isArray(command[key])) {
                    capitalizedKey = `${capitalizedKey} [${command[key].length}]`;
                    command[key] = command[key].join(', ');
                }
                if(key == 'usage') command.usage = `=${command.name} ${command.usage}`;
                $(`#${command.name}`).append(`<p><strong>${capitalizedKey}:</strong> ${command[key]}</p>`);
            });
        });
    });
}

categories.forEach(category => {
    const capitalizedCategory = category[0].toUpperCase() + category.slice(1);
    $('#categories').append(`<button id='${category}'>${capitalizedCategory}</button>`);
    if(category == selectedCategory) {
        $(`#${selectedCategory}`).addClass('active');
        loadCommands(selectedCategory);
    }
    $(`#${category}`).on('click', () => {
        if(selectedCategory == category) return;
        $(`#${selectedCategory}`).removeClass('active');
        $(`#${category}`).addClass('active');
        loadCommands(category);
        selectedCategory = category;
    });
});