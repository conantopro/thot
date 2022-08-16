
$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    var name = button.data('name'); // Extract info from data-* attributes

    action = $('.form-delete').attr('data-action').slice(0, -1);
    action += id;
    $('.form-delete').attr('action', action);

    var modal = $(this);
    modal.find('.modal-title').text('Eliminar usuario: ' + name);
})

$('#delete-company').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    var name = button.data('name'); // Extract info from data-* attributes

    action = $('.form-delete').attr('data-action').slice(0, -1);
    action += id;
    $('.form-delete').attr('action', action);

    var modal = $(this);
    modal.find('.modal-title').text('Eliminar empresa: ' + name);
})

$('#delete-permission').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    var name = button.data('name'); // Extract info from data-* attributes

    action = $('.form-delete').attr('data-action').slice(0, -1);
    action += id;
    $('.form-delete').attr('action', action);

    var modal = $(this);
    modal.find('.modal-title').text('Eliminar empresa: ' + name);
})


$('#delete-role').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    var name = button.data('name'); // Extract info from data-* attributes

    action = $('.form-delete').attr('data-action').slice(0, -1);
    action += id;
    $('.form-delete').attr('action', action);

    var modal = $(this);
    modal.find('.modal-title').text('Eliminar empresa: ' + name);
})


$('#delete-rate-paq').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    var name = button.data('name'); // Extract info from data-* attributes

    action = $('.form-delete').attr('data-action').slice(0, -1);
    action += id;
    $('.form-delete').attr('action', action);

    var modal = $(this);
    modal.find('.ruta').text('Eliminar registro: ' + name);
})