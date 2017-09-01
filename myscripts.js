/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function expandCollapse(showHide,expand) {
    var hideShowDiv;
    var label;        

    hideShowDiv = document.getElementById(showHide);      
    label = document.getElementById(expand);

    if (hideShowDiv.style.display == 'none') {
        label.innerHTML = label.innerHTML.replace("[+]", "[-]");
        hideShowDiv.style.display = 'block';            
    } else {
        label.innerHTML = label.innerHTML.replace("[-]", "[+]");
        hideShowDiv.style.display = 'none';

    }
} 

function expandSection(showHide1,showHide2,button){
    var hideShowDiv1;
    var hideShowDiv2;
    var mybutton;
    hideShowDiv1 = document.getElementById(showHide1); 
    hideShowDiv2 = document.getElementById(showHide2);
    mybutton = document.getElementById(button)
    
    if (hideShowDiv1.style.display == 'none') {
        hideShowDiv1.style.display = 'block';
        hideShowDiv2.style.display = 'none';
        mybutton.value = 'Search Congregation';
    } else {
        hideShowDiv1.style.display = 'none';
        hideShowDiv2.style.display = 'block';
        mybutton.value = 'Create Congregation';
    }  
     
}