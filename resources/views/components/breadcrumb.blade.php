<nav aria-label="breadcrumb">
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-7">
            <h3 class="h3">{{ $title }}</h3>
            <div class="row">
                <div class="col">
                    <ol class="breadcrumb breadcrumb-style1">
                        @if (isset($li_1))
                            <li class="breadcrumb-item @if (isset($li_1_active)) {{ $li_1_active }} @endif">
                                <a
                                    href="@if (isset($li_1_url)) {{ $li_1_url }} @endif">{{ $li_1 }}</a>
                            </li>
                        @endif
                        @if (isset($li_2))
                            <li class="breadcrumb-item @if (isset($li_2_active)) {{ $li_2_active }} @endif">
                                <a href="#">{{ $li_2 }}</a>
                            </li>
                        @endif
                        @if (isset($li_3))
                            <li class="breadcrumb-item @if (isset($li_3_active)) {{ $li_3_active }} @endif">
                                {{ $li_3 }}</li>
                        @endif
                    </ol>
                </div>
            </div>
        </div>
        @if (isset($action_button))
            <div class="col-lg-3 col-md-4 col-sm-5 mb-4">
                {!! $action_button !!}
            </div>
        @endif
    </div>
</nav>
