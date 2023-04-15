$(document).ready(function() {
  setInterval(function(){
    $("#cekkartu").load('app/views/scan/bacakartu.php');
  }, 2000);
});