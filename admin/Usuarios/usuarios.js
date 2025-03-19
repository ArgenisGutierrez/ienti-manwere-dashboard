$(function() {
  $('#usuarios_table').DataTable({
    columnDefs: [
      {
        targets: [0, 1, 2],
        with: "30%",
        orderable: true,
        searchable: true,
        className: "columna-descripcion" // Restaura clase por defecto
      },
      {
        targets: [3, 4], // -1 representa la última columna
        width: "5%",
        orderable: false,
        searchable: false,
        className: "columna-botones",
        className: "dt-head-no-sorting" // Clase para ocultar símbolos
      }
    ],
    autoWidth: false, // Desactiva el ajuste automático
    language: {
      emptyTable: "No hay información",
      info: "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
      infoEmpty: "Mostrando 0 a 0 de 0 Usuarios",
      infoFiltered: "(Filtrado de _MAX_ total Usuarios)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Mostrar _MENU_ Usuarios",
      loadingRecords: "Cargando...",
      processing: "Procesando...",
      search: "Buscador:",
      zeroRecords: "Sin resultados encontrados",
      paginate: {
        first: "Primero",
        last: "Ultimo",
        next: "Siguiente",
        previous: "Anterior"
      }
    }
  });
});
