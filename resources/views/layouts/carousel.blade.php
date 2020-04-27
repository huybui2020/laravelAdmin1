<section>

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
        @php $i = 1; @endphp
            @foreach($carousels as $item)
            @if($i == 1)
            <div class="carousel-item active">               
            <img src="{{ asset('uploads/posts/' .$item->image_name) }}" class="d-block w-100"  alt="...">
            </div>
            @else
            <div class="carousel-item">               
            <img src="{{ asset('uploads/posts/' .$item->image_name) }}" class="d-block w-100"  alt="...">
            </div>
            @endif
            @php $i++; @endphp
            @endforeach
            
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <script>
        var carousel = $('.carousel');
        carousel.owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true
        });
    </script>
</section>
