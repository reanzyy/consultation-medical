@extends('layouts.error')
@section('content')
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h1 class="mb-2 mx-2">404</h1>
            <p>{{ $exception->getMessage() }}</p>
            <a href="{{ route('frontend.index') }}" class="btn btn-primary">Back to home</a>
            <div class="mt-3">
                <img src="{{ url('/assets/img/illustrations/404.jpg') }}" alt="page-misc-error-light"
                    width="500" class="img-fluid" data-app-dark-img="illustrations/page-misc-error-dark.png"
                    data-app-light-img="illustrations/page-misc-error-light.png" />
            </div>
        </div>
    </div>
@endsection
