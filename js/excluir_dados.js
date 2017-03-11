$(".excluir_clube").click(function(){
	$("#listar_clubes").hide();
   	$("#termo_excluir_clube").show();
});

$(".termo .cancelar").click(function(){
    $("#termo_excluir_clube").hide();
    $("#listar_clubes").show();
});