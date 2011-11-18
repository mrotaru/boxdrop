function onClickLogin() {
    window.location="login.html";
}

function onClickRegister() {
    window.location="register.html";
}

// rudimentary function to morph from one colour to another
function changeElementColour( element, R2, G2, B2, current_step, total_steps ) {
    
    color1 = window.getComputedStyle( element ).backgroundColor;
    alert( color1 );

//    R1 = element.style.backgroundColor;
//    G1 = element.style.backgroundColor;
//    B1 = element.style.backgroundColor;
    
    rd = R2 - R1;
    gd = G2 - G1;
    bd = B2 - B1;

    R2 += rd / total_steps * current_step;
    G2 += gd / total_steps * current_step;
    B2 += bd / total_steps * current_step;

}
