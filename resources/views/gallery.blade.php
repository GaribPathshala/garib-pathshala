@extends('layouts.default')

@section('title', 'Gallery')
    
@section('nav-ul-gallery', 'active')

@section('content')
    
<section id="portfolio" class="portfolio">
<div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Gallery</h2>
      <h3><span>NGO </span>Momments</h3>
      <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-food">Food Distribution</li>
          <li data-filter=".filter-covid">COVID-19 Times</li>
          <li data-filter=".filter-amphan">Amphan 2020</li>
          <li data-filter=".filter-youth">Youth</li>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

      <div class="col-lg-4 col-md-6 portfolio-item filter-food">
        <a href="{{ asset('assets/img/gallery/ph1.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1">
            <img src="{{ asset('assets/img/gallery/ph1.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
                <h4>Title</h4>
                <p>Description</p>
              </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-food">
        <a href="{{ asset('assets/img/gallery/ph2.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3">
            <img src="{{ asset('assets/img/gallery/ph2.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Title</h4>
              <p>Description</p>
            </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-youth">
        <a href="{{ asset('assets/img/gallery/ph3.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 2">
            <img src="{{ asset('assets/img/gallery/ph3.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Title</h4>
              <p>Description</p>
            </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-covid">
        <a href="{{ asset('assets/img/gallery/ph4.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 2">
            <img src="{{ asset('assets/img/gallery/ph4.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Title</h4>
              <p>Description</p>
            </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-covid">
        <a href="{{ asset('assets/img/gallery/ph5.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 2">
            <img src="{{ asset('assets/img/gallery/ph5.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Title</h4>
              <p>Description</p>
              </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-covid">
        <a href="{{ asset('assets/img/gallery/ph6.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 3">
        <img src="{{ asset('assets/img/gallery/ph6.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Title</h4>
              <p>Description</p>
            </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-food">
        <a href="{{ asset('assets/img/gallery/ph7.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 1">
        <img src="{{ asset('assets/img/gallery/ph7.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Title</h4>
              <p>Description</p>
            </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-covid">
        <a href="{{ asset('assets/img/gallery/ph8.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 3">
            <img src="{{ asset('assets/img/gallery/ph8.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Title</h4>
              <p>Description</p>
            </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-amphan">
        <a href="{{ asset('assets/img/gallery/ph9.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3">
        <img src="{{ asset('assets/img/gallery/ph9.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Title</h4>
              <p>Description</p>
            </div>
        </a>
      </div>

    </div>

  </div>
</section>
  @endsection