$(document).ready(function (){

    function loadNotiOT(){
        var envar=[];
        $.ajax({ 
            url:"notification/model/load_notiOT.php",
            type:"POST",
            success:function(retval)
            {
                envar = retval;
                $('#notiNoOT').html(envar);
                $('#notiOT').html(envar);
            }
        })
    }

    setInterval(loadNotiOT, 1000);

    function loadNotiPIF(){
        var envar=[];
        $.ajax({ 
            url:"notification/model/load_notiPIF.php",
            type:"POST",
            success:function(retval)
            {
                envar = retval;
                $('#notiNoPIF').html(envar);
                $('#notiPIF').html(envar);
            }
        })
    }

    setInterval(loadNotiPIF, 1000);


});