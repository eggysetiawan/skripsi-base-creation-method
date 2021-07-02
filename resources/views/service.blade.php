@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Service</li>
@endsection

@section('content')

    <!-- Horizontal Steppers -->

    <div class="row justify-content-center mb-4">
        <div class="col-md-12">
            <center class="h1">Find the best photographer for your every need</center>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-3" style="border-style: none;">
            <div class="text-center"><i class="fas fa-camera text-warning" style="font-size:100px; "></i></div>
            <div>
                <p class="text-center" style="font-size: 14px;font-weight:bold">Complete Photography Service.</p>
                <p class="text-center">
                    Get your preferrd photographer for every occasion
                </p>
            </div>
        </div>

        <div class="col-md-3" style="border-style: none;">
            <div class="text-center"><i class="fas fa-money-bill-wave-alt text-info" style="font-size:100px; "></i></div>
            <div>
                <p class="text-center h3">Fixed Rate.</p>
                <p class="text-center">
                    Easily booking photographer with fixed hourly rate.
                </p>
            </div>
        </div>

        <div class="col-md-3" style="border-style: none;">
            <div class="text-center"><i class="fas fa-paint-brush text-success" style="font-size:100px; "></i></div>
            <div>
                <p class="text-center h3">Unlimited Editing.</p>
                <p class="text-center">
                    Awesome editing to get the best photo possible.
                </p>
            </div>
        </div>

        <div class="col-md-3" style="border-style: none;">
            <div class="text-center"><i class="fas fa-key text-primary" style="font-size:100px; "></i></div>
            <div>
                <p class="text-center h3">Secure Payment.</p>
                <p class="text-center">
                    Payment to photographer only once photo delivered.
                </p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4" style="position: relative;top:50px">
        <div class="col-md-12">

            <!-- Stepers Wrapper -->
            <ul class="stepper stepper-horizontal">

                <li class="dark">
                    <a href="#!">
                        <div class="row">
                            <span class="circle bg-dark" style="width: 60px;height:60px;font-size:40px"><span
                                    style="position: relative;top:20px">1</span></span>

                        </div>
                        <div class="pt-5">
                            <div class="row">
                                <div class="label text-center h5"><strong>Book</strong></div>
                            </div>
                            <div class="row">
                                <p class="text-muted">Book your preferred photographer.</p>
                            </div>
                        </div>
                    </a>
                </li>

                <li class="dark">
                    <a href="#!">
                        <div class="row">
                            <span class="circle bg-dark" style="width: 60px;height:60px;font-size:40px"><span
                                    style="position: relative;top:20px">2</span></span>
                        </div>

                        <div class="pt-5">
                            <div class="row">
                                <div class="label text-center h5"><strong>Photo Shoot</strong></div>
                            </div>
                            <div class="row">
                                <p class="text-muted">Get the best photoshoot experience.</p>
                            </div>
                        </div>
                    </a>
                </li>

                <li class="dark">
                    <a href="#!">
                        <div class="row">
                            <span class="circle bg-dark" style="width: 60px;height:60px;font-size:40px"><span
                                    style="position: relative;top:20px">3</span></span>

                        </div>
                        <div class="pt-5">
                            <div class="row">
                                <div class="label text-center h5"><strong>Editing</strong></div>
                            </div>
                            <div class="row">
                                <p class="text-muted">Doing something magic to your photo.</p>
                            </div>
                        </div>
                    </a>
                </li>

                <li class="dark">
                    <a href="#!">
                        <div class="row">
                            <span class="circle bg-dark" style="width: 60px;height:60px;font-size:40px"><span
                                    style="position: relative;top:20px">4</span></span>

                        </div>
                        <div class="pt-5">
                            <div class="row">
                                <div class="label text-center h5"><strong>Delivery</strong></div>
                            </div>
                            <div class="row">
                                <p class="text-muted">Delivery your awesome photo.</p>
                            </div>
                        </div>
                    </a>
                </li>





            </ul>
            <!-- /.Stepers Wrapper -->

        </div>
    </div>
    <!-- /.Horizontal Steppers -->


@endsection
