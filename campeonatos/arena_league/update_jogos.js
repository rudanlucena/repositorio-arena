$('#update_jogos').load("update_jogos_andamento.php");
var tempo = window.setInterval(carrega, 60000);
function carrega()
{
	$('#update_jogos').load("update_jogos_andamento.php");
}

