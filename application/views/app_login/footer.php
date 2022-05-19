<!--**********************************
        Scripts
    ***********************************-->
<script src="<?= base_url('assets'); ?>/plugins/common/common.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/custom.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/settings.js"></script>
<script src="<?= base_url('assets'); ?>/js/gleek.js"></script>
<script src="<?= base_url('assets'); ?>/js/styleSwitcher.js"></script>

<script>
    $(document).ready(function() {
        $('#role').click(function() {
            if ($(this).is(':checked')) {
                $('#kec_id').hide(100);
                $('#rolee').attr('value', 1);
            } else {
                $('#rolee').attr('value', 2);
                $('#kec_id').show(100);

            }
        });
    });
</script>
</body>

</html>