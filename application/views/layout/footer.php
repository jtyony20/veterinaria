
 <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2015
                </div>
            </div>

        </div>
        </div>

	<script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/moment.min.js"></script>
    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/jquery/jquery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
 	<script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Data tables -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>

<!--script del proyecto-->

<script type="text/javascript" >
	var baseurl = "<?php echo base_url(); ?>";
</script>

<?php if ($this->uri->segment(1)=='cdatatable'): ?>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/persona.js"></script>
	
<?php endif ?>
<?php if ($this->uri->segment(1)=='chorarios'): ?>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/horarios.js"></script>
	
<?php endif ?>

<?php if ($this->uri->segment(1)=='clogin'): ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/usuario.js"></script>
	
<?php endif ?>

<?php if ($this->uri->segment(1)=='cusuarios'): ?>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/usuario.js"></script>
	
<?php endif ?>

<?php if ($this->uri->segment(1)=='cpacientes'): ?>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/paciente.js"></script>
	
<?php endif ?>
<?php if ($this->uri->segment(1)=='cficha'): ?>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/ficha.js"></script>
	
<?php endif ?>
<?php if ($this->uri->segment(1)=='cclientes'): ?>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/cliente.js"></script>
	
<?php endif ?>

<?php if ($this->uri->segment(1)=='chistoria'): ?>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/historia.js"></script>
	
<?php endif ?>
<?php if ($this->uri->segment(1)=='ceventos'): ?>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/eventos.js"></script>
	
<?php endif ?>
</body>

</html>


