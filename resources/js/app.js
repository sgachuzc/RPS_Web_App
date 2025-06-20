import './bootstrap';
import 'jquery'
import DataTable from 'datatables.net-dt';
import 'datatables.net-responsive-dt';
import Chart from 'chart.js/auto';

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

new DataTable('#usuarios',{
  responsive: true,
  language: languajeOptions
});

new DataTable('#servicios',{
  responsive: true,
  language: languajeOptions
});

new DataTable('#inscripciones',{
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