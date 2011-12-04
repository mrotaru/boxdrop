function onClickLogin() {
    window.location="login.php";
}

function onClickRegister() {
    window.location="register.php";
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
