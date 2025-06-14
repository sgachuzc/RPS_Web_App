import './bootstrap';
import 'jquery'
import DataTable from 'datatables.net-dt';
import 'datatables.net-responsive-dt';

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
  language: languajeOptions
});

new DataTable('#servicios',{
  language: languajeOptions
});