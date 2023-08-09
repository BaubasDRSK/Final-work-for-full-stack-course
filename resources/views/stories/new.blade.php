@extends('layouts.app')

@section('content')
    <div class="container w-full mx-auto">
        <div class="row flex justify-center w-full">
            <div class="card-body flex justify-center flex-wrap">
                <h2 class=" text-4xl font-extrabold text-black text-center w-full  mb-10 ">Tell us Your story</h2>

                <form action="{{ route('stories-store') }}" method="post" enctype="multipart/form-data">
                    <div class="flex flex-wrap w-full mb-8">
                        <label for="title" class="w-full text-center text-m font-bold mb-4"> Give Your story short
                            title</label>
                        <input class='w-full rounded-lg ' type="text" name="title" id="title">
                    </div>

                    <div class="flex flex-wrap w-full mb-8">
                        <label for="story" class="w-full text-center text-m font-bold mb-4"> Tell us Your story</label>
                        <textarea class='w-full rounded-lg h-60 overflow-auto' type="text" name="story" id="story"> </textarea>
                    </div>

                    <div class="flex flex-wrap w-full mb-8">
                        <label class="w-full text-center text-m font-bold mb-4" for="image">Upoload main image</label>
                        <input type="file" name="image" id="image"
                            class='block w-full text-m  text-slate-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-m file:font-semibold
                        file:bg-violet-50 file:text-violet-700
                        hover:file:bg-violet-100'>
                    </div>

                    <div class="flex flex-wrap w-full mb-8">
                        <label for="amount" class="w-full text-center text-m font-bold mb-4"> How much money You
                            need?</label>
                        <input class='w-full rounded-lg ' type="number" name="amount" min=0 step='0.01' id="amount"
                            required>
                    </div>

                    <div class="flex w-full mb-8 justify-center ">
                        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                            type="submit">Let people know</button>
                    </div>
                    @csrf
                </form>

            </div>
        </div>
    </div>
@endsection
