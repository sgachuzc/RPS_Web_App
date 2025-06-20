<x-admin-layout>
  <h1>Dashboard</h1>
  <hr class="hr_section" style="margin: 10px 0 30px">
  <div class="container_charts">
    <div class="chart">
      <canvas id="topCourses"></canvas>
    </div>
    <div class="chart">
      <canvas id="topAuditories"></canvas>
    </div>
  </div>
</x-admin-layout>

<script type="text/javascript">
  window.topCourses = @json($topCourses);
  window.topAuditories = @json($topAuditories);
</script>