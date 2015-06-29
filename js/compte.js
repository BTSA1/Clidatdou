$('#modifierMdp').click(function(){
    $('#popin').css({ 'display': 'block' });
});

$('#fermerMdp').click(function(){
    $('#popin').css({ 'display': 'none' });
});

$('#validerMdp').click(function(){
    $.post(
        'models/modifierMdp.php',
        { 
            ancienMdp : $('#ancienMdp').val(),
            nouveauMdp1 : $('#nouveauMdp1').val(),
            nouveauMdp2 : $('#nouveauMdp2').val(),
        },
            
        function(data){
            if(data == 'Success'){
                $('#resultMdp').html('Le mot de passe à été modifié avec succès');
                $('#erreurMdp').html('');
                $('#popin').css({ 'display': 'none' });
            }else{
                $('#erreurMdp').html(data);
                $('#resultMdp').html('');
            }
            $('#ancienMdp').val('');
            $('#nouveauMdp1').val('');
            $('#nouveauMdp2').val('');
        },
        
        'text'
    );
});
