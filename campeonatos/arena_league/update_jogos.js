var tempo = window.setInterval(carrega, 1000);
function carrega()
{
	$('#update_jogos').load("update_jogos_andamento.php");
}

