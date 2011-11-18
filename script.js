function onClickLogin() {
    window.location="login.html";
}

function onClickRegister() {
    window.location="register.html";
}

function onClickSearch() {
    alert( "Searching for: " + document.getElementById('search').value );
}

function onClickSearchTextbox() {
        selectAll("search");
}

function selectAll( id ) {
    document.getElementById( id ).select();
}
