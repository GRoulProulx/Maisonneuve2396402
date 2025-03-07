@extends('layouts.app')

@section('title', 'Welcome to ' . config('app.name'))

@section('content')
<div class="container py-5">
      <div class="row align-items-center">
            <div class="col-lg-6">
                  <h1 class="display-4 fw-bold mb-4">Welcome to {{ config('app.name') }}</h1>
                  <p class="lead mb-4">A platform designed for students at College Maisonneuve to connect, share resources, and to make friends.</p>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="#" class="btn btn-primary btn-lg px-4 me-md-2">Get Started</a>
                        <a href="#" class="btn btn-outline-light btn-lg px-4">Learn More</a>
                  </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                  <img src="https://logosandtypes.com/wp-content/uploads/2022/03/college-maisonneuve.svg" alt="College Maisonneuve" class="img-fluid" style="max-height: 300px;">
            </div>
      </div>
</div>
<div class="container py-5">
      <h2 class="text-center mb-5">What We Offer</h2>
      <div class="row g-4">
            <div class="col-md-4">
                  <div class="card bg-dark text-white border-primary h-100">
                        <div class="card-body text-center">
                              <i class="fas fa-users fa-3x mb-3 text-primary"></i>
                              <h3 class="card-title">Community</h3>
                              <p class="card-text">Connect with fellow students and build your network.</p>
                        </div>
                  </div>
            </div>
            <div class="col-md-4">
                  <div class="card bg-dark text-white border-primary h-100">
                        <div class="card-body text-center">
                              <i class="fas fa-book fa-3x mb-3 text-primary"></i>
                              <h3 class="card-title">Resources</h3>
                              <p class="card-text">Access study materials and educational resources.</p>
                        </div>
                  </div>
            </div>
            <div class="col-md-4">
                  <div class="card bg-dark text-white border-primary h-100">
                        <div class="card-body text-center">
                              <i class="fas fa-dove fa-3x mb-3 text-primary"></i>
                              <h3 class="card-title">Communication</h3>
                              <p class="card-text">Share updates and stay connected through chirps.</p>
                        </div>
                  </div>
            </div>
      </div>
</div>
<div class="container py-5">
      <div class="p-5 text-center bg-primary rounded-3">
            <h2 class="fw-bold mb-3">Ready to Join?</h2>
            <p class="lead mb-4">Register today and become part of our growing community.</p>
            <a href="#" class="btn btn-light btn-lg px-4">Sign Up Now</a>
      </div>
</div>
@endsection



