<?php
include('verifica_login.php');
include_once("conexao.php");
$result_events = "SELECT id, title, color, start, end FROM events";
$resultado_events = mysqli_query($conexao, $result_events);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset='utf-8' />
	<link rel="stylesheet" href="../css/agenda.css">
	<link href='../css/fullcalendar.min.css' rel='stylesheet' />
	<link href='../css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<link href='../css/personalizado.css' rel='stylesheet' />
	<script src='../js/moment.min.js'></script>
	<script src='../js/jquery.min.js'></script>
	<script src='../js/fullcalendar.min.js'></script>
	<script src='../locale/pt-br.js'></script>
	<script>
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				defaultDate: Date(),
				navLinks: true, // can click day/week names to navigate views
				editable: true,
				eventLimit: true, // allow "more" link when too many events
				events: [
					<?php
					while ($row_events = mysqli_fetch_array($resultado_events)) {
					?> {
							id: '<?php echo $row_events['id']; ?>',
							title: '<?php echo $row_events['title']; ?>',
							start: '<?php echo $row_events['start']; ?>',
							end: '<?php echo $row_events['end']; ?>',
							color: '<?php echo $row_events['color']; ?>',
						},
					<?php
					}
					?>
				]
			});
		});
	</script>
</head>

<body>

	<div id='calendar'></div>
	<br><br><br>

	<div class="divForm">
		<h1>Formulário para o agendamento</h1>

		<form class="form">
			<label for="name">Nome</label>
			<input type="text" name="name" id="name" required />
			<label for="email">E-mail</label>
			<input type="email" name="email" id="email" required />
			<label for="data">Data</label>
			<input type="date" name="data" id="data" required />
			<label for="message">Mensagem</label>
			<textarea name="message" id="message" required></textarea>
			<button type="submit" onclick="alert('Dados enviados, aguarde o retorno... OBRIGADO!')">Enviar</button>

		</form>
	</div>

	<br><br><br>
	<a href="logout.php"><button class="botao">VOLTAR</button></a>
</body>

</html>