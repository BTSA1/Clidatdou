$('#apercu').hide();

$('#return').click(function() {
    InsereBalise("[/]", "", "texte");
});

$('#italique').click(function() {
    InsereBalise("[i]", "[/i]", "texte");
});

$('#gras').click(function() {
    InsereBalise("[b]", "[/b]", "texte");
});

$('#souligne').click(function() {
    InsereBalise("[u]", "[/u]", "texte");
});

$('#gauche').click(function() {
    InsereBalise("[left]", "[/left]", "texte");
});

$('#centre').click(function() {
    InsereBalise("[center]", "[/center]", "texte");
});

$('#droite').click(function() {
    InsereBalise("[right]", "[/right]", "texte");
});

$('#justifier').click(function() {
    InsereBalise("[justify]", "[/justify]", "texte");
});

$('#lien').click(function() {
    InsereBalise('[url="', '"][/url]', "texte");
});

$('#image').click(function() {
    InsereBalise("[img]", "[/img]", "texte");
});

$('#ligne').click(function() {
    InsereBalise("[hr]", "", "texte");
});

$('#taille').change(function() {
    var taille = "";
    $( "select option:selected" ).each(function() {
      taille += $( this ).text();
    });
    InsereBalise("[size=" + taille + "]", "[/size]", "texte");
});


/****** FONCTION ******/

function Visualiser() {
    var texte = $('#texte').val();
    if(texte != ""){
        $.post(
            'models/BBCode.php', 
            {
                texte : texte
            },

            function(data){
                $('#apercu p').html(data);
            },

            'text' 
         );
        $('#apercu').show();
    }else{
        $('#apercu').hide();
    }
    HorlogeTimeout = setTimeout("Visualiser()", 500);
}
var HorlogeTimeout = setTimeout("Visualiser()", 500);

function InsereBalise(startTag, endTag, textareaId) {
    var field  = document.getElementById(textareaId); 
    var scroll = field.scrollTop;
    field.focus();

    /* === Partie 1 : on récupère la sélection === */
    if (window.ActiveXObject) {
        var textRange = document.selection.createRange();            
        var currentSelection = textRange.text;
    } else {
        var startSelection   = field.value.substring(0, field.selectionStart);
        var currentSelection = field.value.substring(field.selectionStart, field.selectionEnd);
        var endSelection     = field.value.substring(field.selectionEnd);               
    }

    /* === Partie 2 : on insère le tout === */
    if (window.ActiveXObject) {
        textRange.text = startTag + currentSelection + endTag;
        textRange.moveStart("character", -endTag.length - currentSelection.length);
        textRange.moveEnd("character", -endTag.length);
        textRange.select();     
    } else {
        field.value = startSelection + startTag + currentSelection + endTag + endSelection;
        field.focus();
        field.setSelectionRange(startSelection.length + startTag.length, startSelection.length + startTag.length + currentSelection.length);
    } 

    field.scrollTop = scroll;     
}

function Remplace(expr,a,b) {
    var i=0;
    while (i!=-1){
        i=expr.indexOf(a,i);
        if (i>=0){
            expr=expr.substring(0,i)+b+expr.substring(i+a.length);
            i+=b.length;
        }
    }
    return expr
}