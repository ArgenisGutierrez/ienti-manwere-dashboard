$(function() {
  $('#material_normativo_table').DataTable({
    columnDefs: [
      // Primera columna: habilita todo
      {
        targets: [0],
        with: "85%",
        orderable: true,
        searchable: true,
        className: "columna-descripcion" // Restaura clase por defecto
      },
      // Columnas de botones (asumiendo que es la última columna)
      {
        targets: [1, 2, 3], // -1 representa la última columna
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
      info: "Mostrando _START_ a _END_ de _TOTAL_ Recursos",
      infoEmpty: "Mostrando 0 a 0 de 0 Recursos",
      infoFiltered: "(Filtrado de _MAX_ total Recursos)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Mostrar _MENU_ Recursos",
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

$(function() {
  $('#material_capacitacion_table').DataTable({
    columnDefs: [
      // Primera columna: habilita todo
      {
        targets: [0],
        with: "85%",
        orderable: true,
        searchable: true,
        className: "columna-descripcion" // Restaura clase por defecto
      },
      // Columnas de botones (asumiendo que es la última columna)
      {
        targets: [1, 2, 3], // -1 representa la última columna
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
      info: "Mostrando _START_ a _END_ de _TOTAL_ Recursos",
      infoEmpty: "Mostrando 0 a 0 de 0 Recursos",
      infoFiltered: "(Filtrado de _MAX_ total Recursos)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Mostrar _MENU_ Recursos",
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

$(function() {
  $('#material_complementario_table').DataTable({
    columnDefs: [
      // Primera columna: habilita todo
      {
        targets: [0],
        with: "85%",
        orderable: true,
        searchable: true,
        className: "columna-descripcion" // Restaura clase por defecto
      },
      // Columnas de botones (asumiendo que es la última columna)
      {
        targets: [1, 2, 3], // -1 representa la última columna
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
      info: "Mostrando _START_ a _END_ de _TOTAL_ Recursos",
      infoEmpty: "Mostrando 0 a 0 de 0 Recursos",
      infoFiltered: "(Filtrado de _MAX_ total Recursos)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Mostrar _MENU_ Recursos",
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

$(document).ready(function() {
  // Modal generar campo
  document
    .getElementById("recurso_tipo")
    .addEventListener("change", function() {
      const tipo = this.value;
      const materialField = document.getElementById("materialField");
      const materialLabel = document.getElementById("materialLabel");
      const materialInput = document.getElementById("recurso_contenido");

      materialField.hidden = false;

      if (tipo === "Url" || tipo === "Video") {
        materialLabel.textContent = tipo === "Url" ? "URL" : "URL";
        materialInput.type = "text";
        materialInput.setAttribute("required", "true");
      } else if (tipo === "Archivo") {
        materialLabel.textContent = "Archivo";
        materialInput.type = "file";
        materialInput.setAttribute("required", "true");
      } else {
        materialField.hidden = true;
        materialInput.removeAttribute("required");
      }
    });
});
