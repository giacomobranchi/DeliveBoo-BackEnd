@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h2 class="text-secondary my-4">
            {{ __('Dish') }}
            <strong>
                {{ $dish->name }}
            </strong>
        </h2>

        <hr>
        <div class="container">

            <div class="row">

                <div class="col text-center">
                    <img width="100%" src="{{ asset('storage/' . $dish->img) }}" alt="{{ $dish->name }}">
                </div>

                <div class="col">
                    <p>
                        Description:
                        {{ $dish->description }}
                    </p>
                    <p>
                        Ingredients:
                        {{ $dish->ingredients }}
                    </p>
                    <div class="fs-3">
                        Price:
                        {{ $dish->price }}
                    </div>
                    <div class="fs-3">
                        Available:
                        @if ($dish->available)
                            <span>
                                ✅
                            </span>
                        @else
                            <span>
                                ❌
                            </span>
                        @endif
                    </div>

                    <div class="d-flex flex-column gap-2">
                        {{-- EDIT --}}
                        <a class="btn btn-warning" href="{{ route('admin.dishes.edit', $dish->slug) }}">
                            <i class="fa-solid fa-pen-to-square fa-xl"></i>
                        </a>
                        {{-- DELETE --}}
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalId-{{ $dish->id }}">
                            <i class="fa-solid fa-trash fa-xl"></i>
                        </button>


                        {{-- MODALE PER ELIMINARE ELEMENTO --}}
                        <div class="modal fade" id="modalId-{{ $dish->id }}" data-backdrop="static"
                            data-keyboard="false" tabindex="-1" aria-labelledby="modalId-{{ $dish->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white justify-content-center">
                                        <h5 class="modal-title text-uppercase" id="modalTitleId-{{ $dish->id }}">
                                            Attenzione!</h5>
                                    </div>
                                    <div class="modal-body fs-5">
                                        Il progetto <strong>{{ $dish->id }}</strong> -
                                        <strong>{{ $dish->title }}</strong> sta per essere eliminato!
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal">
                                            <i class="fa-solid fa-angle-left"></i> Back
                                        </button>
                                        {{-- non confondere destroy con delete --}}
                                        <form action="{{ route('admin.dishes.destroy', $dish->slug) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete <i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
