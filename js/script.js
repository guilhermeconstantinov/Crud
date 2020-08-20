window.onload = function(){
    function hideShow(element){
        console.log(element);
        if(element.style.display == 'block'){
            element.style.display = 'none';
        }else{
            element.style.display = 'block';
        }
    }

    //Botão para esconder o menu
    var btn =  document.querySelector("#group-header .btn-resp");
    var menu = document.querySelector("#menu");
    btn.addEventListener('click', e=>{
        hideShow(menu);
    });

    //Esconde o menu ou não quando tela aumentar ou diminuir
    window.onresize = function(){
        var w = window.outerWidth;
        if(w < 780){
            menu.style.display = 'none';
        }else{
            menu.style.display = 'block'
        }

    }
    var modal = document.querySelector(".modal");
    document.querySelector('.closeModal').addEventListener('click',function(){
        hideShow(modal);
    });

    var urlCurrent = document.URL;
    if(urlCurrent.indexOf('update')){
        hideShow(modal);
    }



}

function FormData(str){

    var http = new XMLHttpRequest();
    http.responseType = "json";
    http.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            var campos = ['company-nome', 'company-nomef','company-resp', 'company-tel', 'company-cidade','company-estado','company-rua','company-no','company-bairro'];
            var dbcampo =['nome_emp','nome_f','resp_emp','tel_emp','cidade','estado','rua','num','bairro'];
            var result = this.response[0];

            if(result){
                for(let i=0;i<campos.length;i++){
                    document.getElementById(campos[i]).value = result[(dbcampo[i])];
                    document.getElementById(campos[i]).readOnly = true;
                }

            }else{
                for(var i=0;i<campos.length;i++){
                    document.getElementById(campos[i]).value = "";
                    document.getElementById(campos[i]).readOnly = false;
                }
            }
        }
    }
    http.open("POST", "controller/customers_op.php", true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("company-cnpj="+str);

}


