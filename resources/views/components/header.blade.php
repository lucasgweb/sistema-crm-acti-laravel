<header class="page-header page-header-dark bg-primary pb-10">
    <div class="container-fluid px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="{{$icon}}"></i></div>
                        {{$slot}}
                    </h1>
                    <div class="page-header-subtitle">{{$subtitle}}</div>
                </div>
                <div class="col-12 col-xl-auto mt-4">{{--Optional Content--}}</div>
            </div>
        </div>
    </div>
</header>
