<html>
<head>
   <title>Ejemplos de uso de la función data del core de jQuery</title>
   <script src="../jquery-1.3.2.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){

   $("#guardar").click(function(evento){
      var valor = document.formul.valor.value;
      //Esta misma línea de código se puede codificar así también con jQuery
      //var valor = $("#valor").attr("value");
      $("#division").data("midato",valor);
      $("#division").html('He guardado en este elemento (id="division") un dato llamado "midato" con el valor "' + valor + '"');
   });

   $("#leer").click(function(evento){
      valor = $("#division").data("midato");
      $("#division").html('En este elemento (id="division") leo un dato llamado "midato" con el valor "' + valor + '"');
   });

   $("#eliminar").click(function(evento){
      $("#division").removeData("midato");
      $("#division").html('Acabo de eliminar del elemento (id="division") el dato llamado "midato"');
   });
});
</script>
</head>

<body>

<div id="division">
En esta división (elemento id="division") voy a guardar datos con la función data y luego los voy a leer
</div>
<br>
<form name="formul">
Escribe un valor a guardar, leer o eliminar:
<input type="text" name="valor" id="valor">
<br>
<input type="button" value="guardar dato" id="guardar">
<input type="button" value="leer dato" id="leer">
<input type="button" value="eliminar dato" id="eliminar">
</form>

</body>
</html>
