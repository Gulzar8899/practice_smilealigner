<script>
    var url = "<?php echo base_url();?>";
</script>
<script src="<?php echo base_url("assets/superadmin/js/jquery.validate.min.js?".time())?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap.min.js?".time())?>"></script>
<script src="<?php echo base_url("assets/superadmin/js/administrator_dashboard.js?".time())?>"></script>
<script src="<?php echo base_url('assets/superadmin/js/my_account.js')?>"></script>
<?php
if($this->router->fetch_class()=="superadmin") {
    if($this->router->fetch_method() == "login") {?>
        <script src="<?php echo base_url("assets/superadmin/js/login_main.js?".time())?>"></script>
    <?php }
}
?>
</body>
</html>