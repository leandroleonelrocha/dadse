$("select[name=perfil]").change(function(){
    $('.form_medico').hide();
    $('.form_proveedor').hide();
    var perfil  = $('select[name=perfil]').val();
       
    if(perfil == 'medico'){
        $('.form_medico').show();
    } 
    if(perfil == 'proveedor'){
        $('.form_proveedor').show(); 
    } 
       
});