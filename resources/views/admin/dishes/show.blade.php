@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h2 class="text-dark text-center py-4">
            <strong>
                {{ $dish->name }}
            </strong>
        </h2>

        <div class="container pt-5 border-top border-4 border-dark">

            <div class="row">

                <div class="col">
                    <img width="100%" class="rounded-4" src="{{ asset('storage/' . $dish->img) }}" alt="{{ $dish->name }}">
                </div>

                <div class="col fs-3">
                    <p>
                        <strong>
                            Description:
                        </strong>
                        {{ $dish->description }}
                    </p>
                    <p>
                        <strong>
                            Ingredients:
                        </strong>

                        {{ $dish->ingredients }}
                    </p>
                    <p>
                        <strong>
                            Price:
                        </strong>
                        € {{ $dish->price }}
                    </p>
                    <div>
                        <strong>Is Available:</strong>
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

                    <div class="mt-5 gap-2">

                        <div class="row">
                            <div class="col">
                                {{-- EDIT --}}
                                <a class="btn btn-secondary p-3 w-100" href="{{ route('admin.dishes.edit', $dish->slug) }}">
                                    <i class="fa-solid fa-pen-to-square fa-xl"></i>
                                </a>
                            </div>

                            <div class="col">
                                {{-- DELETE --}}
                                <button type="button" class="btn btn-danger p-3 w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $dish->id }}">
                                    <i class="fa-solid fa-trash fa-xl"></i>
                                </button>
                            </div>
                        </div>




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
