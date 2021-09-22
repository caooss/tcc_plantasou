/*alert("Eu sou um alert!");*/

$("a").click(function() {
  $("div").removeClass('in');
});

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}

$('textarea').autoResize();
document.getElementById("textarea").scrollTop = document.getElementById("textarea").scrollHeight

function confirmacao_p(id){
    var resultado=confirm("Você deseja mesmo deletar este item?");
    if(resultado){
      alert("Item excluido com sucesso!");
      location.href="../php/remover_produto.php?id="+id;
    }else{
      /*location.href="../php/produtos.php";*/
    }
}

function confirmacao_c(id){
  var resultado=confirm("Você deseja mesmo deletar este item?");
  if(resultado){
    alert("Item excluido com sucesso!");
    location.href="../php/remover_cultivo.php?id="+id;
  }else{
    /*location.href="../php/produtos.php";*/
  }
}

function confirmacao_o(id){
  var resultado=confirm("Você deseja mesmo deletar este item?");
  if(resultado){
    alert("Item excluido com sucesso!");
    location.href="../php/remover_orcamento.php?remover=tabela&id="+id;
  }else{
    /*location.href="../php/produtos.php";*/
  }
}

function confirmacao_ot(){
  var resultado=confirm("Você deseja mesmo remover esta tabela?");
  if(resultado){
    alert("Tabela excluido com sucesso!");
    location.href="../php/excluir_orcamento.php";
  }else{
    /*location.href="../php/produtos.php";*/
  }
}

function salvar_ot(){
  var resultado=confirm("Você deseja mesmo salvar esta tabela?");
  if(resultado){
    alert("Tabela salva com sucesso!");
    location.href="../php/historico.php?num=1";
  }else{

  }
}

function confirmacao_h(id){
  var resultado=confirm("Você deseja mesmo remover esta tabela?");
  if(resultado){
    alert("Tabela excluido com sucesso!");
    location.href="../php/remover_historico.php?id="+id;
  }else{
    /*location.href="../php/produtos.php";*/
  }
}