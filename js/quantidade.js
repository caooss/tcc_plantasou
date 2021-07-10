$(document).ready(function(){
    $('#menos').click(function(){
        var menos = document.getElementById("qtd").value;
        menos --;
        document.getElementById("qtd").value= menos;
    });
});