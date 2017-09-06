/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function openleftNav() {
    document.getElementById("mySideleftnav").style.width = "350px";
}

function closeleftNav() {
    document.getElementById("mySideleftnav").style.width = "0";
}

function openrightNav() {
    document.getElementById("mySiderightnav").style.width = "350px"; 
}

function closerightNav() {
    document.getElementById("mySiderightnav").style.width = "0";    
}

function openLogin() {
    var hideShowDiv;
    document.getElementById("myloginbox").style.width = "550px";
    hideShowDiv = document.getElementById('default'); 
    hideShowDiv.style.display = 'none';
}

function closeLogin() {
    var hideShowDiv;
    document.getElementById("myloginbox").style.width = "0"; 
    hideShowDiv = document.getElementById('default'); 
    hideShowDiv.style.display = 'block';
}

function openSignup() {
    document.getElementById("mysignupbox").style.width = "850px"; 
}

function closeSignup() {
    var hideShowDiv1;
    var hideShowDiv2;
    hideShowDiv1 = document.getElementById('mylogin'); 
    hideShowDiv2 = document.getElementById('mysignup'); 

    hideShowDiv1.style.display = 'block';
    hideShowDiv2.style.display = 'none';    
    document.getElementById("mysignupbox").style.width = "0";    
}

function openNav1() {
    document.getElementById("myleft1").style.width = "350px";
    document.getElementById("myleft2").style.width = "0";
    document.getElementById("main1").style.marginLeft = "350px"; 
};

function closeNav1() {
    document.getElementById("myleft1").style.width = "0";
    document.getElementById("main1").style.marginLeft= "0";
};

function openNav2() {
    document.getElementById("myleft1").style.width = "0";
    document.getElementById("myleft2").style.width = "350px";
    document.getElementById("main1").style.marginLeft = "350px";
};
function openNav2_() {
    document.getElementById("myleft2").style.width = "350px";
    document.getElementById("main1").style.marginLeft = "350px";
};

function closeNav2() {
    document.getElementById("myleft2").style.width = "0";
    document.getElementById("main1").style.marginLeft= "0";
};


//function openLogin() {
//    document.getElementById("myright").style.width = "350px";
//    document.getElementById("main1").style.marginLeft = "380px";
//};
//
//function closeLogin() {
//    document.getElementById("myright").style.width = "0";
//    document.getElementById("main1").style.marginLeft = "380px";
//};

function openCreateAccount() {
    document.getElementById("main2").style.marginLeft = "350px";
    document.getElementById("main1").style.marginLeft = "0";
};

function closeCreateAccount() {
    document.getElementById("main1").style.marginLeft = "350px";
    document.getElementById("main2").style.marginLeft = "0";
};