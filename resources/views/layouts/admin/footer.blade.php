@php
    $countall = \App\User::whereIsActive(1)->whereUserTypeId(3)->count();
    $countunverify = \App\User::whereIsActive(0)->whereUserTypeId(3)->count();
    $countblock = \App\User::whereIsActive(2)->whereUserTypeId(3)->count();
    $total = $countall + $countunverify + $countblock;
    $data[] = ($countunverify/$total) * 100;
    $data[] = ($countall/$total) * 100;
    $data[] = ($countblock/$total) * 100;
    $data = json_encode($data);
@endphp
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; {{ date("Y") }}</span>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="signout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('v2/js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('v2/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('v2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('v2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('v2/js/sb-admin-2.min.js') }}"></script>
  <script src="{{ asset('v2/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('v2/js/demo/chart-area-demo.js') }}"></script>
  <!-- <script src="{{ asset('v2/js/demo/chart-pie-demo.js') }}"></script> -->

  <!-- Page level plugins -->
  <script src="{{ asset('v2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('v2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('v2/js/demo/datatables-demo.js') }}"></script>

  <script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Not Verified %", "Verified %", "Blocked %"],
    datasets: [{
    //   data: registration->statistics());,
      data: {{$data}},
      backgroundColor: ['#ffc107', '#17a673', '#dc3545'],
      hoverBackgroundColor: ['#ffc107', '#17a673', '#dc3545'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: true,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

  </script>
</body>

</html>
