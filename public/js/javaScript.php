 //javascriptRefrech
const refrech = async(tabela, cmp) => {
var fetchTable = document.getElementById(`${tabela}`);
var i = 1;
const requestata = {
tabela: fetchTable.id,
campo: cmp
}
var constuser = await fetch('../../src/Manipulacao/buscar.php', {
method: 'post',
body: JSON.stringify(requestata)
}).then(response => {
if (!response.ok) { throw new Error("erro") }
return response.json();
}).then(responseData => {
return responseData
})
  if (fetchTable.innerHTML == "") {for (let element of constuser) {
let text = document.createTextNode(element);
var option = document.createElement("option");
option.setAttribute("value", "" + `${i}` + "");
option.appendChild(document.createTextNode(`${text.data}`));
fetchTable.appendChild(option);
i = i + 1
}
}
}