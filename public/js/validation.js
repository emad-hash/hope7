
document.getElementById("cardholderName").onblur= function() {
    let isName = /^[a-zA-Z\s]+$/igm.test(document.getElementById("cardholderName").value);
    if(!isName) {
        document.getElementById("cardholderNames").innerHTML="* Name Must Be Letters Only";
    } 
    else {
        document.getElementById("cardholderNames").innerHTML="*";
    }
}

document.getElementById("cardNo").onblur= function() {
    let isName = /^\d{16}$/igm.test(document.getElementById("cardNo").value);
    if(!isName) {
        document.getElementById("cardNos").innerHTML="* cardNo Number Must Be 16 Numbers";
    }
    else {
        document.getElementById("cardNos").innerHTML="*";
    }
}

document.getElementById("zip").onblur= function() {
    let isName = /\d{6}$/igm.test(document.getElementById("zip").value);
    if(!isName) {
        document.getElementById("zips").innerHTML="* zip Must 6 Numbers";
    }
    else {
        document.getElementById("zips").innerHTML="*";
    }
}

document.getElementById("donationAmount").onblur= function() {
    let isName = /\d+/igm.test(document.getElementById("donationAmount").value);
    if(!isName) {
        document.getElementById("donationAmounts").innerHTML="* Donation Amount Number Must Be Numbers";
    }
    else {
        document.getElementById("donationAmounts").innerHTML="*";
    }
}


document.getElementById("billingAddress").onblur= function() {
    let isName = /^[a-zA-Z\s0-9-/,]+$/igm.test(document.getElementById("billingAddress").value);
    if(!isName) {
        document.getElementById("billingAddresss").innerHTML="* Address Must Be Letters Only";
    }
    else {
        document.getElementById("billingAddresss").innerHTML="*";
    }
}




