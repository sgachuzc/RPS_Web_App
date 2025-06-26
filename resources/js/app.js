import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'jquery'
import DataTable from 'datatables.net-bs5';
import 'datatables.net-responsive-bs5';
import Chart from 'chart.js/auto';

(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

const languajeOptions = {
  "emptyTable":     "No hay resultados que mostrar",
  "info":           "_START_ - _END_ de _TOTAL_ resultados",
  "infoEmpty":      "Sin resultados",
  "infoFiltered":   "",
  "infoPostFix":    "",
  "thousands":      ",",
  "lengthMenu":     "Mostrar _MENU_ resultados",
  "loadingRecords": "Cargando...",
  "processing":     "",
  "search":         "Buscar:",
  "zeroRecords":    "Sin coincidencias",
  "paginate": {
    "first":      "Primera",
    "last":       "Última",
    "next":       ">",
    "previous":   "<"
  },
}

new DataTable('#users',{
  responsive: true,
  language: languajeOptions
});

new DataTable('#services',{
  responsive: true,
  language: languajeOptions
});

new DataTable('#customers',{
  responsive: true,
  language: languajeOptions
});

new DataTable('#inscriptions',{
  responsive: true,
  language: languajeOptions
});

(async function() {
  const data = window.topCourses || [];

  new Chart(
    document.getElementById('topCourses'),
    {
      type: 'bar',
      data: {
        labels: data.map(row => row.name),
        datasets: [
          {
            label: 'Cursos más suscritos',
            data: data.map(row => row.count)
          }
        ]
      },
      options:{
        responsive: true,
        scales: {
          y:{
            beginAtZero: true,
            ticks:{
              stepSize: 1,
              precision: 0
            }
          }
        }
      }
    }
  );
})();

(async function() {
  const data = window.topAuditories || [];

  new Chart(
    document.getElementById('topAuditories'),
    {
      type: 'bar',
      data: {
        labels: data.map(row => row.name),
        datasets: [
          {
            label: 'Auditorías más suscritas',
            data: data.map(row => row.count)
          }
        ]
      },
      options:{
        responsive: true,
        scales: {
          y:{
            beginAtZero: true,
            ticks:{
              stepSize: 1,
              precision: 0
            }
          }
        }
      }
    }
  );
})();