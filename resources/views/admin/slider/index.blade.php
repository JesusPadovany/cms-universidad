@extends('admin.layouts.master')

@section('section-title', 'Slider principal')

@section('content')
<div class="p-4">
	<div class="flex flex-wrap">
		@foreach (range(1, 8) as $i)
			<div class="w-1/4 p-2">
				<img src="https://via.placeholder.com/340x150" class="block w-full h-40">
			</div>
		@endforeach
	</div>

	<div class="px-2 my-2">
		<div class="h-6 bg-primary"></div>

		<h2 class="font-semibold text-4xl text-primary">Nota:</h2>

		<div class="font-semibold">
			<p class="mb-2">
				Esta página se encarga del orden de los sliders  en la pantalla principal, tienes la opción de:
			</p>
			<ul class="pl-2">
				<li>
					- Asignar la posición
				</li>
				<li>
					- Agregar
				</li>
				<li>
					- Eliminar
				</li>
				<li>
					- Modificar posición
				</li>
			</ul>

			<div class="text-right">
				<a href="{{ route('admin.slider.create') }}" class="inline-block px-4 py-2 rounded-lg bg-primary font-semibold text-white">
					Agregar +
				</a>
			</div>
		</div>
	</div>
</div>
@endsection
