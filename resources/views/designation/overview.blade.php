@extends('layout.app')
@section('title', 'Designation Dashboard')

@section('content')
    <div class="container">
        <div class="row g-6 mb-6">
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Total
                                    RSM</span>
                                <span class="h3 font-bold mb-0">4</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                        viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-width="2"
                                            d="M16 12c2.374 1.183 4 3.65 4 7v4H4v-4c0-3.354 1.631-5.825 4-7m4 1a6 6 0 1 0 0-12a6 6 0 0 0 0 12Zm6-6c-1.5 0-3 .36-5-2c-2 2.36-4.5 3-7 2m1 6l5.025 5.257L17 13m-5 5v5" />
                                    </svg></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Total
                                    ASM</span> <span class="h3 font-bold mb-0">30</span></div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 2048 2048">
                                        <path fill="currentColor"
                                            d="M2048 1792h-227q48 53 73 118t26 138h-128q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100h-128q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100H512q0-52 14-102t39-93t63-80t83-61q-34-35-52-81t-19-95q0-69 34-127t94-93v-292q0-30 13-57t38-45q-55-73-135-113t-172-41q-80 0-149 30t-122 82t-83 123t-30 149H0q0-73 20-141t57-129t91-108t118-81q-75-54-116-135t-42-174q0-79 30-149t82-122t122-83T512 0q79 0 149 30t122 82t83 123t30 149q0 93-41 174T738 694q68 34 123 85t94 117h357q31 0 54-9t43-24t41-31t46-31t58-23t78-10h288q27 0 50 10t40 27t28 41t10 50zM512 640q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100q0 53 20 99t55 82t81 55t100 20m384 1024q27 0 50-10t40-27t28-41t10-50q0-27-10-50t-27-40t-41-28t-50-10q-27 0-50 10t-40 27t-28 41t-10 50q0 27 10 50t27 40t41 28t50 10m640 0q27 0 50-10t40-27t28-41t10-50q0-27-10-50t-27-40t-41-28t-50-10q-27 0-50 10t-40 27t-28 41t-10 50q0 27 10 50t27 40t41 28t50 10m384-512h-288q-45 0-78-9t-58-24t-45-31t-41-31t-44-23t-54-10H896v256q53 0 99 20t82 55t55 81t20 100q0 49-18 95t-53 81q83 46 135 124q52-78 135-124q-34-35-52-81t-19-95q0-53 20-99t55-82t81-55t100-20q53 0 99 20t82 55t55 81t20 100q0 34-9 66t-27 62h164zm0-256h-288q-23 0-41 5t-34 13t-31 20t-32 26q16 14 31 25t32 20t34 14t41 5h288z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Total
                                    ASE</span> <span class="h3 font-bold mb-0">45</span></div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 2048 2048">
                                        <path fill="currentColor"
                                            d="M2048 1280v768H1024v-768h256v-256h512v256zm-640 0h256v-128h-256zm512 384h-128v128h-128v-128h-256v128h-128v-128h-128v256h768zm0-256h-768v128h768zm-355-512q-54-61-128-94t-157-34q-80 0-149 30t-122 82t-83 123t-30 149q0 92-41 173t-116 136q45 23 84 53t73 68v338q0-79-30-149t-82-122t-123-83t-149-30q-80 0-149 30t-122 82t-83 123t-30 149H0q0-73 20-141t57-129t90-108t118-81q-74-54-115-135t-42-174q0-79 30-149t82-122t122-83t150-30q92 0 173 41t136 116q38-75 97-134t135-98q-74-54-115-135t-42-174q0-79 30-149t82-122t122-83t150-30q79 0 149 30t122 82t83 123t30 149q0 92-41 173t-116 136q68 34 123 85t93 118zM512 1408q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100q0 53 20 99t55 82t81 55t100 20m512-1024q0 53 20 99t55 82t81 55t100 20q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Total
                                    SO</span>
                                <span class="h3 font-bold mb-0">150</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white text-lg rounded-circle"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="0.88em" height="1em"
                                        viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                            d="M96 128a128 128 0 1 0 256 0a128 128 0 1 0-256 0m94.5 200.2l18.6 31l-33.3 123.9l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7h386.6c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9l-33.3-123.9l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2h-39.5c-12.4 0-20.1 13.6-13.7 24.2z" />
                                    </svg></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Total
                                    SE</span>
                                <span class="h3 font-bold mb-0">450</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M21 3H3c-1.1 0-2 .9-2 2v8h2V5h18v16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2" />
                                        <circle cx="9" cy="10" r="4" fill="currentColor" />
                                        <path fill="currentColor"
                                            d="M15.39 16.56C13.71 15.7 11.53 15 9 15s-4.71.7-6.39 1.56A2.97 2.97 0 0 0 1 19.22V22h16v-2.78c0-1.12-.61-2.15-1.61-2.66" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Average Beats
                                    per District</span>
                                <span class="h3 font-bold mb-0">5</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white text-lg rounded-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="m10.95 18l5.65-5.65l-1.45-1.45l-4.225 4.225l-2.1-2.1L7.4 14.45zM6 22q-.825 0-1.412-.587T4 20V4q0-.825.588-1.412T6 2h8l6 6v12q0 .825-.587 1.413T18 22zm7-13h5l-5-5z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
