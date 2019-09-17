var check = function () {
    if (document.getElementById('pas').value ==
        document.getElementById('repas').value) {
        document.getElementById("butt").disabled = false;
        document.getElementById('message').style.color = "blue";
        document.getElementById('message').innerHTML = 'Match!';
    }
    else {
        document.getElementById('message').style.color = "red";
        document.getElementById("butt").disabled = true;
        // document.getElementById("repas").className = "inpus";
        document.getElementById('message').innerHTML = 'Do not match!';
    }
    if (document.getElementById('pas').value == "") {
        document.getElementById('message').innerHTML = '';
        document.getElementById("butt").disabled = true;
    }

}

function ConfirmEdit() {
    confirm("Do you want update this profile?");
}
function ConfirmDelete() {
    confirm("Do you want delete this account?");
}