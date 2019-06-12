


<div class="row">

    <div class="span6">

        <form action="<?php echo site_url('user/register'); ?>" id="register_form" class="form-horizontal" method="post">

            <div class="control-group">
                <label for="" class="control-label">Login</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" name="login">
                </div>
            </div>

            <div class="control-group">
                <label for="" class="control-label">Email</label>
                <div class="controls">
                    <input class="input-xlarge" type="email" name="email">
                </div>
            </div>

            <div class="control-group">
                <label for="" class="control-label">Password</label>
                <div class="controls">
                    <input class="input-xlarge" type="password" name="password">
                </div>
            </div>

            <div class="control-group">
                <label for="" class="control-label">Confirm Password</label>
                <div class="controls">
                    <input class="input-xlarge" type="password" name="confirm_password">
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <input class="btn btn-primary" type="submit" value="Register" name="password">
                    <a class="btn btn-primary" href="<?php echo site_url('home/') ?>">Back</a>
                </div>
            </div>

        </form>



    </div>
</div>


<script type="text/javascript">
    $(document).ready(()=>{
        $('#register_form').on('submit',function(e){
            e.preventDefault();
            let url =  $(this).attr('action');
            let data = $(this).serialize();
            $.post(url,data,function(e){
                if(parseInt(e.result)===1)
                {
                    window.location.href='<?php echo site_url('/dashboard'); ?>';
                }else{

                }

            },'json');
        });
    });
</script>