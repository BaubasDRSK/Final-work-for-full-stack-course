@extends('layouts.app')

@section('content')
    <div class="container w-full mx-auto">
        <div class="row flex justify-center w-full">
            <div class="card-body flex justify-center flex-wrap">
                <h2 class="headeris text-4xl font-extrabold text-black text-center mb-14 mt-8 ">Stories that needs Your help
                </h2>
                <ul class="flex justify-center w-full flex-wrap gap-6">
                    @forelse($stories as $story)
                        <li class="list-group-item w-full ">
                            <div class="flex flex-nowrap gap-6">
                                <div>
                                    @if ($story->main_img)
                                        <div class="main-img-container" style="width:200px">
                                            @php
                                                $image = public_path('images/'.$story->main_img);
                                                $imageSize = getimagesize($image);
                                            @endphp
                                            <div class="pswp-gallery" id="gallery--individual">
                                                <div class="image-heart">
                                                    <a href="{{ asset('images/' . $story->main_img) }}"
                                                        data-pswp-width="{{ $imageSize[0] }}"
                                                        data-pswp-height="{{ $imageSize[1] }}" data-cropped="true"
                                                        data-pswp-srcset target="_blank">
                                                        <img src="{{ asset('images/' . $story->main_img) }}" alt="" />
                                                    </a>
                                                        <div data-heart-load data-url={{ route('stories-heartsCount', $story) }}  >

                                                        </div>

                                                </div>
                                            </div>

                                        </div>
                                    @else
                                        {{ 'Nothing to see yet...' }}
                                    @endif
                                </div>
                                <div class="flex flex-wrap gap-4">
                                    <h4 class="w-full font-extrabold text-black">{{ $story->title }}</h4>
                                    <p class="fw-bold w-full">{{ $story->story }}</p>
                                    <p class="fw-bold w-full">Goal ammount:  {{ $story->goal_amount }}</p>
                                    <p class="fw-bold w-full">Total donations:  {{ $story->totalDonations() }} / Left to collect {{ $story->goal_amount - $story->totalDonations() }}</p>
                                    <p>Donators:</p>
                                    @foreach ($story->donations()->get() as $donation )
                                        <p> {{$donation->user->name}} {{$donation->donation_amount}}€</p>
                                    @endforeach
                                    @if ($story->author_id == (auth()->user()->id ?? 0))
                                        <form action="{{ route('stories-edit', [$story, $stories->currentPage()]) }}"
                                            method="get" class="">
                                            <button class="rounded-lg py-3 px-6 bg-indigo-500" type="submit">Edit</button>
                                            @csrf
                                        </form>
                                    @endif
                                </div>
                            </div>
                            {{-- TAG input here --}}
                            <div>
                                @foreach ($story->tags()->get() as $tag)
                                    <span class="text-cyan-500 text-sm">#{{ $tag->name }} </span>
                                @endforeach
                            </div>
                            {{-- TAG end --}}
                        </li>
                    @empty
                        <li class="list-group-item">
                            <p class="text-center">No accounts</p>
                        </li>
                    @endforelse
                </ul>
                {{-- {{dump($stories->currentPage())}} --}}
                {{ $stories->links() }}
            </div>
        </div>
    </div>
@endsection
