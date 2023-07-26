    <div class="card mb-4">
        <div class="row">
                <div class="d-flex mx-auto justify-content-center align-items-center col-3 my-3 rounded-3 card-icon @isset($bg_color) {{ $bg_color }} @endisset">
                    <span class="d-inline-block text-white fs-1 @isset($icon) {{ $icon }} @endisset"></span>
                </div>
                <div class="card-wrap col">
                    <div class="card-body">
                        <div class="card-title">
                            <p class="fw-semibold mb-1">@isset($title) {{ $title }} @endisset</p>
                            <h3 class="card-title mb-2">@isset($nominal) {{ $nominal }} @endisset</h3>
                            {{-- <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @isset($nominal) {{ $nominal }} @endisset
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">Action</a></li>
                                  <li><a class="dropdown-item" href="#">Another action</a></li>
                                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
        </div>
    </div>
