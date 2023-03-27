@extends('base\baseMain')
@section('title')
    dashboard
@endsection
@section('header')
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item nav-item-li">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item nav-item-li">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item nav-item-li">
            <a class="nav-link" href="#">Pricing</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
@endsection
@section('content')
    <div class="container">
        <div class="content d-flex">
            <div class="sidebar">
                <h3>dashboard</h3>
                <div class="sidebar-group">
                    <div class="sidebar-heading">
                      <div class="d-flex align-items-center">
                        <i class="fa-solid fa-chevron-right sidebar-icon"></i>
                        <p class="mx-0 my-0 sidebar-heading-content" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                          Home
                        </p>
                      </div>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body sidebar-sub-item">
                              <ul>
                                <li><a href="#">List Categories</a></li>
                                <li><a href={{route('dashboard.view-add')}}>Add Categories</a></li>
                              </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="content">
                <h2>content </h2>
            </div>
        </div>
    </div>
@endsection