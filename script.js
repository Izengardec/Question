let els = [];
let a = "chek";
for (let i = 0; i < 6;++i){
    a = "chek";
    a+=i;
    els.push(document.getElementById(a));
    if (!els[i].checked){
        els[i].parentElement.parentElement.childNodes[1].childNodes[0].setAttribute("disabled", "disabled");
        els[i].parentElement.parentElement.childNodes[3].childNodes[0].setAttribute("disabled", "disabled");
    } else {
        els[i].parentElement.parentElement.childNodes[1].childNodes[0].removeAttribute("disabled");
        els[i].parentElement.parentElement.childNodes[3].childNodes[0].removeAttribute("disabled");
    }
    els[i].onclick = function() {
        if (!this.checked){
            this.parentElement.parentElement.childNodes[1].childNodes[0].setAttribute("disabled", "disabled");
            this.parentElement.parentElement.childNodes[3].childNodes[0].setAttribute("disabled", "disabled");
        } else {
            this.parentElement.parentElement.childNodes[1].childNodes[0].removeAttribute("disabled");
            this.parentElement.parentElement.childNodes[3].childNodes[0].removeAttribute("disabled");
        }
    };
}