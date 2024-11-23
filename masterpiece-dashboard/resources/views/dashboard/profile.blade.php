@extends('dashboard.layouts.navbar')

@section('content')
    <div class="content-wrapper">
        <div class="content"><!-- Card Profile -->
            <div class="card card-default card-profile">

                <div class="card-header-bg" style="background-image:url(assets/img/user/user-bg-01.jpg)"></div>

                <div class="card-body card-profile-body">

                    <div class="profile-avata">
                        <img class="rounded-circle" src="images/user/user-md-01.jpg" alt="Avata Image">
                        <a class="h5 d-block mt-3 mb-2" href="#">Albrecht Straub</a>
                        <a class="d-block text-color" href="#">albercht@example.com</a>
                    </div>

                    <ul class="nav nav-profile-follow">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="h5 d-block">1503</span>
                                <span class="text-color d-block">Friends</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="h5 d-block">2905</span>
                                <span class="text-color d-block">Followers</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="h5 d-block">1200</span>
                                <span class="text-color d-block">Following</span>
                            </a>
                        </li>

                    </ul>

                    <div class="profile-button">
                        <a class="btn btn-primary btn-pill" href="user-planing-settings.html">Upgrade Plan</a>
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

            <div class="row">
                <div class="col-xl-3">
                    <!--  -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>Settings</h2>
                        </div>

                        <div class="card-body pt-0">
                            <ul class="nav nav-settings">
                                <li class="nav-item">
                                    <a class="nav-link active" href="user-profile-settings.html">
                                        <i class="mdi mdi-account-outline mr-1"></i> Profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="user-account-settings.html">
                                        <i class="mdi mdi-settings-outline mr-1"></i> Account
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="user-planing-settings.html">
                                        <i class="mdi mdi-currency-usd mr-1"></i> Planing
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="user-billing.html">
                                        <i class="mdi mdi-set-top-box mr-1"></i> Billing
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="user-notify-settings.html">
                                        <i class="mdi mdi-bell-outline mr-1"></i>
                                        Notifications
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="card card-default">
                        <div class="card-header">
                            <h2 class="mb-5">Profile Settings</h2>

                        </div>

                        <div class="card-body">
                            <div class="media media-sm">
                                <div class="media-sm-wrapper">
                                    <img src="images/user/user-sm-01.jpg" alt="User Image">
                                </div>
                                <div class="media-body">
                                    <span class="title h3">The stars are twinkling.</span>
                                    <p>Click the current avatar to change your photo.</p>
                                </div>
                            </div>
                            <form>
                                <div class="form-group row mb-6">
                                    <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Cover
                                        Image</label>
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="custom-file mb-1">
                                            <input type="file" class="custom-file-input" id="coverImage" required>
                                            <label class="custom-file-label" for="coverImage">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom
                                                file feedback</div>
                                        </div>
                                        <span class="d-block ">Upload a new cover image, JPG
                                            1200x300</span>
                                    </div>
                                </div>

                                <div class="form-group row mb-6">
                                    <label for="occupation" class="col-sm-4 col-lg-2 col-form-label">Occupation</label>
                                    <div class="col-sm-8 col-lg-10">
                                        <input type="text" class="form-control" id="occupation">
                                    </div>
                                </div>

                                <div class="form-group row mb-6">
                                    <label for="com-name" class="col-sm-4 col-lg-2 col-form-label">Company
                                        name</label>
                                    <div class="col-sm-8 col-lg-10">
                                        <input type="text" class="form-control" id="com-name">
                                        <span class="d-block ">Upload a new cover image, JPG
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

        </div>

    </div>
@endsection
