
<script>

    //get year by model
    $(document).ready(function() {


        $("#modelDrp").click(function() {

            /*dropdown post */
            $.ajax({
                url: "<?php echo base_url();?>/product/buildDropYear",
                data: {id: $(this).val()},
                type: "POST",
                success: function(data) {
                    $("#name").val('');
                    $("#yearDrp").html(data);
                }
            });

        });

        $("#id_make").click(function() {

            /*dropdown post */
            $.ajax({
                url: "<?php echo base_url();?>/product/buildDropModel",
                data: {id: $(this).val()},
                type: "POST",
                success: function(data) {
                    $("#name").val('');
                    $("#modelDrp").html(data);
                }

            });

        });
        //get name product
        $("#yearDrp").click(function() {
            $(this).children().clearQueue();
            $.ajax({
                url: "<?php echo base_url();?>/product/buildDropNameProduce",
                data: {id: $(this).val()},
                type: "POST",
                success: function(data) {
                    $("#name").val(data);
                }

            });

        });

    });

//check user exits
    $(function() {
        $('#chk_avail').click(function() {
            var name = $('#email').val();
            $.post('<?php echo base_url();?>/users/chk_email', {email: name}, function(d) {
                alert(d);
                if (d !== 1)
                {
                    $('#msgbx_success').css('display', 'none');
                    $('#msgbx_err').css('display', 'block');
                }
                else
                {
                    $('#msgbx_err').css('display', 'none');
                    $('#msgbx_success').css('display', 'block');
                }
            });
        });
    });


//input number
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }


</script>



<footer>
    <div class="container">
        <div class="row clearfix">
            <div class="col_12"> <span class="left">&copy; 2015 NOVALAND.</span> <span class="right">Powered by Hung&Phan</span> </div>
        </div>
    </div>
</footer>
</body></html>