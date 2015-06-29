function saveConnexion(){
    $.post(
            'models/saveConnexion.php', 
            'false'
         );
    HorlogeTimeout = setTimeout("saveConnexion()", 120000);
}
var HorlogeTimeout = setTimeout("saveConnexion()", 120000);
