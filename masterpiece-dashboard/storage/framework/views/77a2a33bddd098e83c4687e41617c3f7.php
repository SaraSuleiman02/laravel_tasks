

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="content">
            <!-- Card Profile -->
            <div class="card card-default card-profile">

                <div class="card-header-bg" style="background-image:url(<?php echo e(asset('assets/img/user/user-bg-01.jpg')); ?>)"></div>

                <div class="card-body card-profile-body">
                    <div class="profile-avata">
                        <img class="rounded-circle" src="<?php echo e(asset('assets/images/user/user-md-01.jpg')); ?>" alt="Avata Image">
                        <a class="h5 d-block mt-3 mb-2" href="#">Albrecht Straub</a>
                        <a class="d-block text-color" href="#">albercht@example.com</a>
                    </div>
                </div>

                <div class="card-footer card-profile-footer">
                    <ul class="nav nav-border-top justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="user-profile.html">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-activities.html">Activities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="user-profile-settings.html">Settings</a>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Full-width Profile Settings -->
            <div class="card card-default mt-4">
                <div class="card-header">
                    <h2 class="mb-5">Profile Settings</h2>
                </div>

                <div class="card-body">
                    <form>
                        <div class="form-group row mb-6">
                            <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">
                                Image</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="custom-file mb-1">
                                    <input type="file" class="custom-file-input" id="coverImage" required>
                                    <label class="custom-file-label" for="coverImage">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom
                                        file feedback</div>
                                </div>
                                <span class="d-block">Upload a new cover image, JPG
                                    1200x300</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mb-2 btn-pill">Update
                                Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\laravel_tasks\masterpiece-dashboard\resources\views/dashboard/profile.blade.php ENDPATH**/ ?>