window.onload = function () {
    const form = document.getElementById('form-consulta').addEventListener('submit',e=>{
        var str = document.getElementById('input-consulta');
        console.log(str);

        var http = new XMLHttpRequest();
        http.responseType = "json";
        http.onreadystatechange = function(){
            if(this.readyState === 4 && this.status === 200){
                if(this.response){
            }
                let result = this.response[0];
                console.log(result);

            }
        };
        http.open("POST", "../controller/user-panel.php", true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send(str.name+"="+str.value);
    });
}


function pesquisar(){
    var radios = document.getElementsByName('tipo-entrada');
    var campo = document.getElementById('input-consulta');

    var tipoPesquisa;

    radios.forEach(e=>{
        if(e.checked){
            if(e.value == 1){
                tipoPesquisa = 'cnpj';
                campo.placeholder = "Digite o CNPJ"
                campo.value = "";
                campo.pattern = "(\\d{3})\\.(\\d{3})\\.(\\d{3})\\/(\\d{4})-(\\d{2})";
                campo.title = "Formato esperado 000.000.000/0000-00";
                campo.setAttribute('name',"consulta-cnpj");
            }else{
                tipoPesquisa = 'placa';
                campo.placeholder = "Digite a placa do carro";
                campo.value = "";
                campo.pattern = "^([a-zA-Z0-9]{7}$";
                campo.title = "Placa deve conter apenas letras e números";
                campo.setAttribute('name',"consulta-placa");
            }
        }
    });


}