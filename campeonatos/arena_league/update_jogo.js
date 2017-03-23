var url = window.location.href;
console.log(url);
var parametrosDaUrl = url.split("=")[1];
console.log(parametrosDaUrl);

$('#update_jogo').load("update_jogo_andamento.php?"+"id_partida="+parametrosDaUrl);
var tempo = window.setInterval(carrega, 60000);
function carrega()
{
	$('#update_jogo').load("update_jogo_andamento.php?"+"id_partida="+parametrosDaUrl);
}

