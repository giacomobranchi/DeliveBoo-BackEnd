@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h2 class="text-uppercase text-dark my-4">
            {{ __('Soft Deleted dishes') }} {{-- sintassi x traduzione --}}
        </h2>

        <hr>

        {{ $trashed_dishes->links('pagination::bootstrap-5') }}

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-success table-hover table-bordered border-white">
                <thead>
                    <tr class="fs-6">
                        {{-- <th scope="col">ID</th> --}}
                        <th scope="col">Preview</th>
                        <th scope="col">Name</th>
                        <th scope="col">Deleted at</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trashed_dishes as $dish)
                        <tr>

                            {{-- IMG --}}
                            <td class="text-center align-middle">

                                @if ($dish->img)
                                    <img width="100" src="{{ asset('storage/' . $dish->img) }}"
                                        alt="{{ $dish->name }}">
                                @else
                                    <i class="fa-solid fa-image fa-2xl"></i>
                                @endif
                            </td>

                            {{-- TITLE --}}
                            <td class="align-middle">{{ $dish->name }}</td>

                            {{-- DELETED_AT --}}
                            <td class="align-middle">{{ $dish->deleted_at }}</td>


                            {{-- RESTORE --}}
                            <td class="align-middle text-center">
                                <a class="btn btn-primary" href="{{ route('admin.dishes.restore', $dish->id) }}"><i
                                        class="fa-solid fa-recycle"></i></a>

                                {{-- MODALE PER ELIMINARE ELEMENTO --}}
                                <div class="modal fade" id="modalId-{{ $dish->id }}" data-backdrop="static"
                                    data-keyboard="false" tabindex="-1" aria-labelledby="modalId-{{ $dish->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white justify-content-center">
                                                <h5 class="modal-title text-uppercase"
                                                    id="modalTitleId-{{ $dish->id }}">Attenzione!</h5>
                                            </div>
                                            <div class="modal-body fs-5">
                                                Il progetto <strong>{{ $dish->id }}</strong> -
                                                <strong>{{ $dish->name }}</strong> sta per essere eliminato!
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal">
                                                    <i class="fa-solid fa-angle-left"></i> Back
                                                </button>
                                                {{-- non confondere destroy con delete --}}
                                                <form action="{{ route('admin.dishes.destroy', $dish->slug) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete <i
                                                            class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>


                    @empty
                        <td class="align-middle">Bin is empty</td>
                    @endforelse



                </tbody>
            </table>
        </div>

    </div>
@endsection
