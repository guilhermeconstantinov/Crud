/*window.onload = function () {
    const dashboard = document.getElementById('dashboard-consulta').addEventListener('submit',e=>{
        var str = document.getElementById('input-consulta');
        var resultado = document.getElementById('resultado');
        e.preventDefault();

            var http = new XMLHttpRequest();
            http.responseType = "json";
            http.onreadystatechange = function(){

                if(this.readyState === 4 && this.status === 200){

                    let result = this.response[0];

                    if(result){
                        if(str.name == "consulta-placa"){
                            resultado.innerHTML = "<table>" +
                                "<tr>"+
                                    "<th>Nome do usuário</th>"+
                                    "<th>CPF</th>"+
                                    "<th>Placa do carro</th>"+
                                    "<th>Modelo</th>"+
                                    "<th>Empresa</th>"+
                                    "<th>Ações</th>"+
                                "</tr>"+
                                "<tr>"+
                                    `<td>${result['nome_c']}</td>`+
                                    `<td>${result['cpf_c']}</td>`+
                                    `<td>${result['placa']}</td>`+
                                    `<td>${result['modelo']}</td>`+
                                    `<td>${result['nome_emp']}</td>`+
                                     "<td><a href=\"update.php?\"></a></td>";

                        }

                    }else{
                        resultado.innerHTML = "<p>Nada encontrado, faça outra pesquisa</p>";
                    }


                }
            };




        http.open("POST", "../controller/user-panel.php", true);
        http.setRequestHeader("Content-type", "application/x-www-dashboard-urlencoded");
        http.send(`${str.name}=${str.value}`);
    });
}*/

