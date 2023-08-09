@extends('layouts.app')

@section('content')
    <div class="container w-full mx-auto">
        <div class="row flex justify-center w-full">
            <div class="card-body flex justify-center flex-wrap">
                <h2 class="headeris text-4xl font-extrabold text-black text-center w-full  mb-10 ">Edit your story, add galery and
                    #hash-tags</h2>

                <div class="flex gap-20 flex-wrap justify-center w-5/6">
                    <div class="w-full max-w-sm ">
                        <form action="{{ route('stories-update', $story) }}" method="post" enctype="multipart/form-data">
                            <div class="flex flex-wrap w-full mb-8">
                                <label for="title" class="w-full text-center text-m font-bold mb-4"> Edit title</label>
                                <input class='w-full rounded-lg ' type="text" name="title" id="title"
                                    value="{{ old('title')??$story->title }}">
                            </div>
                            <div class="flex flex-wrap w-full mb-8">
                                <label for="story" class="w-full text-center text-m font-bold mb-4"> Tell us Your story</label>
                                <textarea class='w-full rounded-lg h-60 overflow-auto' type="text" name="story" id="story">{{ old('story')??$story->story }} </textarea>
                            </div>
                            <div class="flex flex-wrap w-full mb-8">
                                <label class="w-full text-center text-m font-bold mb-4" for="image">You can change main
                                    image</label>
                                <input type="file" accept="image/*" data-select-image name="image" id="image"
                                    class='block w-full text-m  text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-m file:font-semibold
                                file:bg-violet-50 file:text-violet-700
                                hover:file:bg-violet-100'>
                            </div>
                            <img id="imagePreview" src="{{ asset('images/'.$story->main_img)  }}" alt="No iage set yet">
                            <div class="flex flex-wrap w-full mb-8">
                                <label for="amount" class="w-full text-center text-m font-bold mb-4"> How much money You
                                    need?</label>
                                <input class='w-full rounded-lg ' type="number" name="amount" min=0 step='0.01' id="amount"
                                    value="{{ old('amount')??$story->goal_amount }}" required>
                            </div>
                            <div class="flex w-full mb-8 justify-center ">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                                    type="submit">Let's make changes</button>
                            </div>
                            @csrf
                            @method('PUT')
                        </form>
                    </div>
                    <div class="w-full max-w-sm justify-center flex">
                        <section data-tag-load data-url={{ route('tags-addlist', ['story' => $story]) }}></section>
                    </div>
                </div>

            </div>
        </div>
    </div>

        {{-- <h1>How To Use Font Awesome In Laravel? - NiceSnippets.com</h1>
        <i class="fa fa-copy"></i>
        <i class="fa fa-save"></i>
        <i class="fa fa-trash"></i>
        <i class="fa fa-home"></i> --}}
@endsection
