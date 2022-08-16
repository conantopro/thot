// $("#departamento_origen").change(function(event){
//     $.get("/alliances/tcc/rates-paq/municipios/" + event.target.value + "", function(response, state){
//         $("#municipio_origen").empty();
//         $("#municipio_origen").append("<option>== Seleccionar Municipio ==</option>");
//         for(i=0; i<response.length; i++){
//             $("#municipio_origen").append("<option value='"+response[i].id_municipio+"'>"+response[i].municipio+"</option>");
//         }
//     })
// });

// Utilizando EcmaScript 6
$("#departamento_origen").change(event => {
    $.get(`/alliances/tcc/rates-paq/municipios/${event.target.value}`, function(response, state){
        $("#municipio_origen").empty();
        $("#municipio_origen").append("<option>-- Seleccionar Municipio --</option>");
        response.forEach(element => {
            $("#municipio_origen").append(`<option value=${element.id_municipio}>${element.municipio}</option>`)
        });
    })
});

$("#departamento_destino").change(event => {
    $.get(`/alliances/tcc/rates-paq/municipios/${event.target.value}`, function(response, state){
        $("#municipio_destino").empty();
        $("#municipio_destino").append("<option>-- Seleccionar Municipio --</option>");
        response.forEach(element => {
            $("#municipio_destino").append(`<option value=${element.id_municipio}>${element.municipio}</option>`)
        });
    })
});