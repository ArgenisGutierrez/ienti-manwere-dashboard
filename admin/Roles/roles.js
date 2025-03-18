
$(function() {
  $('#role_table').DataTable({
    columnDefs: [
      // Primera columna: habilita todo
      {
        targets: [0],
        with: "70%",
        orderable: true,
        searchable: true,
        className: "columna-descripcion" // Restaura clase por defecto
      },
      // Columnas de botones (asumiendo que es la última columna)
      {
        targets: [1, 2, 3], // -1 representa la última columna
        width: "10%",
        orderable: false,
        searchable: false,
        className: "columna-botones",
        className: "dt-head-no-sorting" // Clase para ocultar símbolos
      }
    ],
    autoWidth: false, // Desactiva el ajuste automático
    language: {
      url: '//cdn.datatables.net/plug-ins/2.0.7/i18n/es-ES.json'
    }
  });
});
