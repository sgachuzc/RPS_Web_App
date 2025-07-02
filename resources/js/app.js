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
  const data = window.topServices || [];

  new Chart(
    document.getElementById('topServices'),
    {
      type: 'bar',
      data: {
        labels: data.map(row => row.name),
        datasets: [
          {
            label: 'Servicios más suscritos',
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
  const data = window.resultsQ1 || [];

  new Chart(
    document.getElementById('resultsQ1'),
    {
      type: 'pie',
      data: {
        labels: data.map(row => row.answer),
        datasets: [
          {
            label: 'Respuestas a: Modalidad',
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
  const data = window.resultsQ2 || [];

  new Chart(
    document.getElementById('resultsQ2'),
    {
      type: 'pie',
      data: {
        labels: data.map(row => row.answer),
        datasets: [
          {
            label: '¿Qué tan satisfecho/a estás con el contenido del curso?',
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
  const data = window.resultsQ3 || [];

  new Chart(
    document.getElementById('resultsQ3'),
    {
      type: 'pie',
      data: {
        labels: data.map(row => row.answer),
        datasets: [
          {
            label: '¿Qué tan satisfecho/a estás con el contenido del curso?',
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
  const data = window.resultsQ4 || [];

  new Chart(
    document.getElementById('resultsQ4'),
    {
      type: 'pie',
      data: {
        labels: data.map(row => row.answer),
        datasets: [
          {
            label: '¿El contenido cubrió tus expectativas y necesidades?',
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
  const data = window.resultsQ5 || [];

  new Chart(
    document.getElementById('resultsQ5'),
    {
      type: 'pie',
      data: {
        labels: data.map(row => row.answer),
        datasets: [
          {
            label: '¿Consideras que los temas tratados fueron claros y bien explicados?',
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
  const data = window.resultsQ6 || [];

  new Chart(
    document.getElementById('resultsQ6'),
    {
      type: 'pie',
      data: {
        labels: data.map(row => row.answer),
        datasets: [
          {
            label: '¿Cómo calificarías el desempeño del instructor?',
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