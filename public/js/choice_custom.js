document.addEventListener("DOMContentLoaded", function (event) {
    var multipleFetch = new Choices('#choices-multiple-remote-fetch', {
        placeholder: true,
        removeItemButton: true,
        placeholderValue: 'Pick an Strokes record',
        maxItemCount: 1
    }).setChoices(function () {
        return fetch(
            routeTags
        ).then(function (response) {
            return response.json();
        }).then(function (data) {
            return data.map(function (tag) {
                return { value: tag.id, label: tag.title };
            });
        });
    });
});