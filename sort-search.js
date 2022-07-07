var milih   = document.getElementById("sortProduct");
var data    = document.getElementById("data");

milih.addEventListener("change", function () {
var ObjAjax = new XMLHttpRequest();

ObjAjax.onreadystatechange = function () {
    if (ObjAjax.readyState == 4 && ObjAjax.status == 200) {
    data.innerHTML = ObjAjax.responseText;
    }
};

ObjAjax.open("get", "./sort.php?milih=" + milih.value, true);
ObjAjax.send();
});

var ngetik = document.getElementById("namaProduk");
var data = document.getElementById("data");

ngetik.addEventListener("keyup", function () {
var ObjAjax = new XMLHttpRequest();

ObjAjax.onreadystatechange = function () {
    if ((ObjAjax.readyState = 4 && ObjAjax.status == 200)) {
    data.innerHTML = ObjAjax.responseText;
    }
};
ObjAjax.open("get", "./search.php?ngetik=" + ngetik.value, true);
ObjAjax.send();
});