@extends('layouts.app')

@section('content')
  @if(have_posts())
    @while(have_posts()) @php the_post() @endphp
      @include('partials.page-header')
      @include('partials.content-page')
    @endwhile
  @else
    <div class="alert alert--info">
      {{ __('Sorry, nothing to display', 'wp_bladeone_theme') }}
    </div>
  @endif
@endsection
