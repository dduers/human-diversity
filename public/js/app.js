fetch('/token')
    .then(response => response.json())
    .then(data => {
        oFormObject = document.forms['csrf_form'];
        oFormObject.elements["_token"].value = data.token;
    });