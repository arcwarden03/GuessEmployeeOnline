$(document).ready(function (){

    function loadNotiHN(){
        var envar=[];
        $.ajax({ 
            url:"../../../notification/model/load_notiHN.php",
            type:"POST",
            success:function(retval)
            {
                envar = retval;
                $('#notiNoHN').html(envar);
                $('#notiHN').html(envar);
            }
        })
    }

    setInterval(loadNotiHN, 1000);

    function loadNotiMR(){
        var envar=[];
        $.ajax({ 
            url:"../../../notification/model/load_notiMR.php",
            type:"POST",
            success:function(retval)
            {
                envar = retval;
                $('#notiNoMR').html(envar);
                $('#notiMR').html(envar);
            }
        })
    }

    setInterval(loadNotiMR, 1000);

    function loadNotiET(){
        var envar=[];
        $.ajax({ 
            url:"../../../notification/model/load_notiET.php",
            type:"POST",
            success:function(retval)
            {
                envar = retval;
                $('#notiNoET').html(envar);
                $('#notiET').html(envar);
            }
        })
    }

    setInterval(loadNotiET, 1000);


});