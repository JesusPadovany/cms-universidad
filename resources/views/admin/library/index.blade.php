@extends('admin.layouts.master')

@section('section-title', 'Biblioteca')

@section('content')
<section class="p-4">
    @if ($alert = session('alert'))
        <alert
            class="mb-2"
            :type='@json($alert['type'])'
            :message='@json($alert['message'])'
        ></alert>
    @endif

    {{-- Seccion con imagen principal --}}
    <div class="flex mb-6">
        <div class="w-1/2">
            <div class="flex items-center justify-between mb-4">
                <p class="text-xl">Imagen principal</p>
                <a href="{{ route('admin.library.changePageImage') }}" class="px-2 py-1 rounded-md bg-primary font-semibold text-white">Cambiar imagen</a>
            </div>
            @if (! is_null($page))
                <img src="{{ asset($page->image) }}">
            @endif
        </div>
        <div class="flex flex-col items-end justify-center w-1/2 text-right">
            <a href="{{ route('admin.library.create') }}" class="btn btn-primary px-4 py-3 mb-6 text-xl">Agregar libro</a>
            <a href="#" class="btn btn-primary px-4 py-3 text-xl">Filtros</a>
        </div>
    </div>

    {{-- Separador --}}
    <div class="h-4 bg-primary"></div>

    {{-- Orden en el slider --}}
    <div class="flex items-center my-4">
        <p class="font-semibold text-primary text-lg">Orden en el slider</p>
        <a href="{{ route('admin.library.slider') }}" class="btn btn-primary px-2 py-1 ml-auto text-sm">Editar</a>
    </div>

    {{-- Slides --}}
    <book-slider
        :items='@json($booksInSlider)'
        :number-of-cols="2"
        :number-of-rows="2"
    ></book-slider>

    {{-- Separador --}}
    <div class="h-4 bg-primary my-4"></div>

    <h3 class="mb-4 font-semibold text-primary text-xl">Libros</h3>

    {{-- Tabla de libros --}}
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>¿Es gratuito?</th>
                <th>Precio</th>
                <th>Autor</th>
                <th>¿Es electrónico?</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->is_free ? 'Si' : 'No' }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isElectronic ? 'Si' : 'No' }}</td>
                    <td width="120" class="text-right">
                        {{-- Link de ver detalles --}}
                        <a href="{{ route('admin.library.show', $book) }}" class="mr-2 text-green-500">
                            <i class="fas fa-eye"></i>
                        </a>

                        {{-- Link de editar --}}
                        <a href="{{ route('admin.library.edit', $book) }}" class="mr-2 text-blue-600" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>

                        {{-- Form de eliminar --}}
                        <form
                            action="{{ route('admin.library.delete', $book) }}"
                            method="POST"
                            class="hidden"
                            ref="form-{{ $loop->index }}"
                        >
                            @csrf
                            @method('DELETE')
                        </form>
                        {{-- Modal trigger --}}
                        <confirm-modal-trigger
                            class="inline-block"
                            v-slot="{ showModal, show, hide }"
                            @accept="$refs['form-{{ $loop->index }}'].submit()"
                        >
                            <a
                                href="{{ route('admin.library.delete', $book) }}"
                                class="text-red-700"
                                title="Eliminar"
                                @click.prevent="show"
                            >
                                <i class="fas fa-trash"></i>
                            </a>
                        </confirm-modal-trigger>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 text-center">
        {{ $books->links() }}
    </div>
</section>
@endsection
