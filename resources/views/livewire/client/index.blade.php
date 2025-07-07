<div>
  <nav class="page-nav">
    <a class="page-nav__day page-nav__day_today" href="#">
      <span class="page-nav__day-week">Пн</span><span class="page-nav__day-number">31</span>
    </a>
    <a class="page-nav__day" href="#">
      <span class="page-nav__day-week">Вт</span><span class="page-nav__day-number">1</span>
    </a>
    <a class="page-nav__day page-nav__day_chosen" href="#">
      <span class="page-nav__day-week">Ср</span><span class="page-nav__day-number">2</span>
    </a>
    <a class="page-nav__day" href="#">
      <span class="page-nav__day-week">Чт</span><span class="page-nav__day-number">3</span>
    </a>
    <a class="page-nav__day" href="#">
      <span class="page-nav__day-week">Пт</span><span class="page-nav__day-number">4</span>
    </a>
    <a class="page-nav__day page-nav__day_weekend" href="#">
      <span class="page-nav__day-week">Сб</span><span class="page-nav__day-number">5</span>
    </a>
    <a class="page-nav__day page-nav__day_next" href="#"></a>
  </nav>

  <main>
    @foreach($movies as $movie)
    <section class="movie">
      <div class="movie__info">
        <div class="movie__poster">
          <img class="movie__poster-image" alt="{{ $movie->title }} постер" src="{{ $movie->poster }}">
        </div>
        <div class="movie__description">
          <h2 class="movie__title">{{ $movie->title }}</h2>
          <p class="movie__synopsis">{{ $movie->description }}</p>
          <p class="movie__data">
            <span class="movie__data-duration">{{ $movie->duration }} минут</span>
            <span class="movie__data-origin">{{ $movie->country }}</span>
          </p>
        </div>
      </div>

      @foreach($halls as $hall)
      @if($hall->seances->where('movie_id', $movie->id)->isNotEmpty())
      <div class="movie-seances__hall">
        <h3 class="movie-seances__hall-title">{{ $hall->title }}</h3>
        <ul class="movie-seances__list">
          @foreach($hall->seances->where('movie_id', $movie->id)->sortBy('start') as $seance)
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="seance/{{ $seance->id }}">{{ $seance->start }}</a></li>
          @endforeach
        </ul>
      </div>
      @endif
      @endforeach
    </section>
    @endforeach
  </main>
</div>