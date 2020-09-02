{{-- <div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
</div> --}}
<link href="../css/main.css" rel="stylesheet">
<div class="bg-gray-700">
    <div class="container mx-auto">
    <div class="pt-10 pb-2 text-3xl font-semibold uppercase tracking-wider text-orange-500 border-b-2 border-gray-500 mb-4"> </div>
      
    <div class="overflow-hidden">
       <div class="grid grid-cols-1 popular sm:grid-cols-2 md:grid-cols-5 gap-4 px-2 h-100 overflow-auto">
           @foreach ($tvshows as $show)
           <div class="show">
            <x-tv-show-card :show="$show"/>   
           </div>
           @endforeach

       </div>

       <div class="page-load-status">
        <div class="loader-ellips infinite-scroll-request">
          <span class="loader-ellips__dot"></span>
          <span class="loader-ellips__dot"></span>
          <span class="loader-ellips__dot"></span>
          <span class="loader-ellips__dot"></span>
        </div>
        <p class="infinite-scroll-last">End of content</p>
        <p class="infinite-scroll-error">No more pages to load</p>
      </div>
      
      <p><button class="view-more-button w-full bg-gray-900 text-white font-bold mb-2 h-16" onclick="execute()">View more</button></p>

       
    </div>

       
   @if($topRatedShows->count() > 0)
    <div class="pt-10 pb-2 text-3xl font-semibold uppercase tracking-wider text-orange-500 border-b-2 border-gray-500 mb-4"> 
        Top rated movies </div>
   
        <div class="overflow-hidden">
        <div class="grid grid-cols-1 toprated sm:grid-cols-2 md:grid-cols-5 gap-4 px-2 h-100 overflow-y-auto">
         @foreach ($topRatedShows as $show)
        <div class="topratedshow">
        <x-tv-show-card :show="$show" />
        </div>   
        @endforeach
        
       </div>

       <div class="page-load-status">
        <div class="loader-ellips infinite-scroll-request">
          <span class="loader-ellips__dot"></span>
          <span class="loader-ellips__dot"></span>
          <span class="loader-ellips__dot"></span>
          <span class="loader-ellips__dot"></span>
        </div>
        <p class="infinite-scroll-last">End of content</p>
        <p class="infinite-scroll-error">No more pages to load</p>
      </div>
      
      <p><button class="view-more-button-top-rated w-full bg-gray-900 text-white font-bold mb-2 h-16" onclick="execute_top_rated()">View more</button></p>

        </div>
    
    @endif
      

    </div>

  </div>


<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>

<script>

function execute(){
var elem = document.querySelector('.popular');

var infScroll = new InfiniteScroll( elem, {
  path: '/tv/page/@{{#}}',
  append: '.show',
  button: '.view-more-button',
  // using button, disable loading on scroll 
  scrollThreshold: false,
  status: '.page-load-status',
});
  
}

function execute_top_rated()
{
var elem = document.querySelector('.toprated');
var infScroll = new InfiniteScroll( elem, {
  path: '/tv/page/@{{#}}',
  append: '.topratedshow',
  button: '.view-more-button-top-rated',
  // using button, disable loading on scroll 
  scrollThreshold: false,
  status: '.page-load-status',
});
  
}    // var infScroll = new InfiniteScroll( elem, {
    //   path: '/tv/page/@{{#}}',
    //   append: '.show',
    //   status: '.page-load-status',
    //   //history: false,
    // });
</script>


    
      