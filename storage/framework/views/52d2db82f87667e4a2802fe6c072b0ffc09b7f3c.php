<?php $__env->startSection('content'); ?>


<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="<?php echo e(route('login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <h1>Login To Nomina</h1>
                    <div>
                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder ="email" required autofocus/>
                        <?php if($errors->has('email')): ?>
                            <span style="color:red">
                               *<?php echo e($errors->first('email')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <input id="password" type="password" placeholder="password" class="form-control" name="password" required/>
                        <?php if($errors->has('password')): ?>
                            <span style="color:red">
                               *<?php echo e($errors->first('password')); ?>

                            </span>
                        <?php endif; ?>
                        <?php if(session()->get('failed_login')): ?>
                            <?php echo e(session()->get('failed_login')); ?>

                        <?php endif; ?>
                    </div>
                    
                        
                        
                            
                        
                    

                    <div style="margin-top:10%">
                        <button class="btn btn-default submit" type="submit">Log in</button>
                        
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-money"></i> Nomina</h1>
                            <p>©2017 All Rights Reserved. PT. Nomina VIP Indonesia Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentikasi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>