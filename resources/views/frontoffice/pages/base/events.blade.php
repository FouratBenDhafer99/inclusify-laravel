@extends('frontoffice.base')
@section('page_title', 'Events')
@section('content')
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left pe-0">
            <div class="row">
                <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                    <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900 d-flex align-items-center">
                        Events
                        <form action="#" class="pt-0 pb-0 ms-auto">
                            <div class="search-form-2 ms-2">
                                <i class="ti-search font-xss"></i>
                                <input type="text" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="Search here.">
                            </div>
                        </form>
                        <a href="/" class="btn-round-md ms-2 bg-greylight theme-dark-bg rounded-3"><i class="feather-filter font-xss text-grey-500"></i></a>

                    </h2>
                </div>



                @foreach($events as $event)
                    <div key="{{ $event->id }}"  id="content" class="col-lg-4 col-md-6 pe-2 ps-2" >
                        <div class="card p-3 bg-white w-100 hover-card border-0 shadow-xss rounded-xxl border-0 mb-3 overflow-hidden">
                        <div class="card-image w-100">
                            <div class="image-container">
                                <img src="{{ asset("/"). $event->image }}" alt="{{ $event->name }}">
                            </div>
                        </div>
                        <div class="card-body d-flex ps-0 pe-0 pb-0">
                            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                                <h4 class="fw-700 font-lg ls-3 text-grey-900 mb-0">
                                    <span class="ls-3 d-block font-xsss text-grey-500 fw-500">
                                        {{ $event->date->format('M') }}
                                    </span>
                                    {{ $event->date->format('d') }}
                                </h4>
                            </div>
                            <h2 class="fw-700 lh-3 font-xss">{{ $event->name }}
                                <span class="d-flex font-xssss fw-500 mt-2 lh-3 text-grey-500">
                                    <i class="ti-location-pin me-1"></i>{{ $event->location }}
                                </span>
                                {{ $event->organizer->name }}
                            </h2>
                        </div>
                        <div class="card-body p-0">
                            <p class="font-xsss fw-400 text-grey-500 lh-30 pe-5 mt-3 me-5 memberlist mt-4 mb-2 ms-0 d-inline-block">
                                {{ $event->description }}
                            </p>
                            <a href="{{ route('event.detail', $event) }}">.</a>
                            @if(auth()->user()->eventsAttended->contains($event->id))
                            <a href="{{ route('event.cancelJoin', $event) }}" disabled class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-danger d-inline-block text-white me-1"
                                >
                                Cancel
                            </a>
                            @else
                                <a href="{{ route('event.join', $event) }}" class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-success d-inline-block text-white me-1"
                                    >
                                    JOIN
                                </a>
                            @endif


                        </div>
                    </div>
                </div>
                @endforeach


                @if ($recommandEvents !== null)
                 @if (!$recommandEvents->isEmpty())
                    <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                        <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900 d-flex align-items-center">
                            Recommanded Events
                        </h2>
                    </div>
                    @foreach($recommandEvents as $event)
                        <div key="{{ $event->id }}" class="col-lg-4 col-md-6 pe-2 ps-2">
                            <div class="card p-3 bg-white w-100 hover-card border-0 shadow-xss rounded-xxl border-0 mb-3 overflow-hidden">
                            <div class="card-image w-100">
                                <div class="image-container">
                                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}">
                                </div>
                            </div>
                            <div class="card-body d-flex ps-0 pe-0 pb-0">
                                <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                                    <h4 class="fw-700 font-lg ls-3 text-grey-900 mb-0">
                                        <span class="ls-3 d-block font-xsss text-grey-500 fw-500">
                                            {{ $event->date->format('M') }}
                                        </span>
                                        {{ $event->date->format('d') }}
                                    </h4>
                                </div>
                                <h2 class="fw-700 lh-3 font-xss">{{ $event->name }}
                                    <span class="d-flex font-xssss fw-500 mt-2 lh-3 text-grey-500">
                                        <i class="ti-location-pin me-1"></i>{{ $event->location }}
                                    </span>
                                    {{ $event->organizer->name }}
                                </h2>
                            </div>
                            <div class="card-body p-0">
                                <p class="font-xsss fw-400 text-grey-500 lh-30 pe-5 mt-3 me-5 memberlist mt-4 mb-2 ms-0 d-inline-block">
                                    {{ $event->description }}
                                </p>
                                @if(auth()->user()->eventsAttended->contains($event->id))
                                <a href="" disabled class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-danger d-inline-block text-white me-1"
                                    >
                                    JOINED
                                </a>
                                @else
                                    <a href="{{ route('event.join', $event) }}" class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-success d-inline-block text-white me-1"
                                        >
                                        JOIN
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @else
                        <!-- $recommandEvents is empty -->
                    @endif
                @else
                    <!-- $recommandEvents is null -->
                @endif



            </div>
        </div>
    </div>
@endsection
