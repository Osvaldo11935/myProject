 //javascriptRefrech
 const refrech = async(tabela, cmp) => {
     var fetchTable = document.getElementById(`${tabela}`);
     var i = 1;
     const requestata = {
             tabela: fetchTable.id,
             campo: cmp
         }
         //fetchTable.innerHTML = "";
     var constuser = await fetch('../../src/Manipulacao/buscar.php', {
         method: 'post',
         body: JSON.stringify(requestata)
     }).then(response => {
         if (!response.ok) { throw new Error("erro") }
         return response.json();
     }).then(responseData => {
         return responseData
     })
     if (fetchTable.innerText == "") {
         for (let element of constuser) {
             var texto = element.split("/");
             let text = document.createTextNode(element);
             var option = document.createElement("option");
             option.setAttribute("value", "" + `${texto[1]}` + "");
             option.appendChild(document.createTextNode(`${texto[0]}`));
             fetchTable.appendChild(option);
             i = i + 1
         }
     }
 }