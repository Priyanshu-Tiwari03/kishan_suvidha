 <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('admin-assets/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('admin-assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	 <script src="{{asset('admin-assets/vendor/chart-js/chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/custom.min.js')}}"></script>
	<script src="{{asset('admin-assets/js/deznav-init.js')}}"></script>
	
	<script src="{{asset('admin-assets/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js')}}"></script>
	<!-- Apex Chart -->
	<script src="{{asset('admin-assets/vendor/apexchart/apexchart.js')}}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{asset('admin-assets/js/dashboard/dashboard-1.js')}}"></script>

	   <!-- Toastr -->
	   <script src="{{asset('admin-assets/vendor/toastr/js/toastr.min.js')}}"></script>

	   <!-- All init script -->
	   <script src="{{asset('admin-assets/js/plugins-init/toastr-init.js')}}"></script>
	   <script src="{{asset('admin-assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
	   <script src="{{asset('admin-assets/js/plugins-init/sweetalert.init.js')}}"></script>
	   <script>
		$(document).ready(function(){
			// SmartWizard initialize
			$('#smartwizard').smartWizard(); 
		});
	</script>
<!-- Include jQuery and Bootstrap JS -->

<!-- Datatable -->
<script src="{{asset('admin-assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/js/plugins-init/datatables.init.js')}}"></script>
	

<script>
    // Wait for the DOM to fully load
    document.addEventListener('DOMContentLoaded', function() {
        // Select the success message element
        var successMessage = document.getElementById('success-message');

        // Check if the success message exists
        if (successMessage) {
            // Set a timeout to hide the message after 10 seconds (10000 milliseconds)
            setTimeout(function() {
                successMessage.style.display = 'none'; // Hide the message
            }, 5000); // Change this value to 15000 for 15 seconds
        }
    });
</script>
	