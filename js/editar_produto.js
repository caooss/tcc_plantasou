$('body').on("click", '#mudar', function() {
    
    alert("oi");

    $('#nome').val($(this).parents('tr').find('td').eq(1).text());
    
});