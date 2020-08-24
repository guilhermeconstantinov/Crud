window.onload = function(){

    function hideShow(element){
        if(element.style.display === 'block'){
            element.style.display = 'none';
        }else{
            element.style.display = 'block';
        }
    }

    //Botão para esconder o menu
    let btn =  document.querySelector("#group-header .btn-resp");
    let menu = document.querySelector("#menu");
    btn.addEventListener('click', ()=>{
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
    var btnClose = document.querySelector('.closeModal')
    btnClose.addEventListener('click',function(){
        hideShow(modal);
    });

    var urlCurrent = document.URL;
    if( urlCurrent.indexOf('ver') || urlCurrent.indexOf('update')){
        console.log('entrei');
        hideShow(modal);

    }



}

function FormData(str){

    let http = new XMLHttpRequest();
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


