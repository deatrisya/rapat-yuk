    <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">
                    <div class="avatar flex-shrink-0">
                        <div class="avatar flex-shrink-0">
                            {{-- <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success"
                                class="rounded" /> --}}
                        </div>
                        {{-- <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View
                                    More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <div class="dropdown">
                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                            <a class="dropdown-item" href="javascript:void(0);">View
                                More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                    </div> --}}
                    <span class="fw-semibold d-block mb-1">@isset($title)
                        {{ $title }}
                    @endisset</span>
                    <h3 class="card-title mb-2">@isset($value)
                        {{ $value }}
                    @endisset</h3>
                    <a href="#" class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>Meningkat</a>
                </div>
            </div>
    </div>
