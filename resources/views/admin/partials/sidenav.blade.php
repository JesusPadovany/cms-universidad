@php
    function getMenuLinkBgColor(array $routeNames)
    {
        foreach ($routeNames as $name) {
            if (request()->routeIs($name) || request()->is($name)) {
                return 'bg-primary';
            }
        }

        return '';
    }
@endphp

<nav class="flex-shrink-0 w-64 bg-primary-lighter text-white">
	<h1 class="flex items-center justify-center h-16 bg-primary leading-none font-semibold text-3xl text-white">
		UBA "ROJAS"
	</h1>

	<ul class="list-reset">
		<li>
			<a
				href="/admin"
				class="
					sidenav__link
					{{ request()->is('admin') ? 'bg-primary' : '' }}
				"
			>
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-home fa-lg"></i>
				</span>
				Inicio
			</a>
		</li>
		<li>
			<a
				href="{{ route('admin.slider.index') }}"
				class="
					sidenav__link
                    {{ getMenuLinkBgColor(['admin.slider.index', 'admin.slider.create']) }}
				">

				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-sliders-h fa-lg"></i>
				</span>
				Sliders
			</a>
		</li>
		<li>
			<a
                href="{{ route('admin.events.index') }}"
                class="
                    sidenav__link
                    {{ getMenuLinkBgColor(['admin.events.index', 'admin.events.slider', 'admin.events.create']) }}
                ">
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-calendar-alt fa-lg"></i>
				</span>
				Agenda
			</a>
		</li>
		<li>
			<a
                href="{{ route('admin.library.index') }}"
                class="
                    sidenav__link
                    {{ getMenuLinkBgColor([
                        'admin.library.index',
                        'admin.library.create',
                        'admin.library.slider',
                        'admin.library.changePageImage',
                        'admin.library.edit',
                        'admin.library.show',
                        'admin.library.editCard'
                    ]) }}
                "
            >
				<span class="inline-block mr-2 w-10 text-center">
					<i class="far fa-calendar-alt"></i>
				</span>
				Biblioteca
			</a>
		</li>
		<li>
			<a
                href="{{ route('admin.courses.index') }}"
                class="
                    sidenav__link
                    {{ getMenuLinkBgColor(['admin.courses.index', 'admin.courses.changePageImage']) }}
                "
            >
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-cubes fa-lg"></i>
				</span>
				Cursos
			</a>
		</li>
		<li>
            <a
                href="{{ route('admin.pages.show', ['page' => 'institucional']) }}"
                class="
                    sidenav__link
                    {{ getMenuLinkBgColor(['admin/paginas/institucional', 'admin/paginas/institucional/editar', 'admin/paginas/institucional/imagen/editar']) }}
                "
            >
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-university fa-lg"></i>
				</span>
				Institucional
			</a>
		</li>
		<li>
            <a
                href="{{ route('admin.pages.show', ['page' => 'contacto']) }}"
                class="
                    sidenav__link
                    {{ getMenuLinkBgColor(['admin/paginas/contacto', 'admin/paginas/contacto/editar', 'admin/paginas/contacto/imagen/editar']) }}
                "
            >
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-clipboard-list fa-lg"></i>
				</span>
				Contacto
			</a>
		</li>
		<li>
			<a href="#" class="sidenav__link">
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-home fa-lg"></i>
				</span>
				Pie de página
			</a>
		</li>
		<li>
			<a href="#" class="sidenav__link">
				<span class="inline-block mr-2 w-10 text-center">
					<i class="fas fa-bars fa-lg"></i>
				</span>
				Menú desplegable
			</a>
		</li>
		<li>
			<a href="#" class="sidenav__link">
				<span class="inline-block mr-2 w-10 text-center">
					<i class="far fa-newspaper fa-lg"></i>
				</span>
				Newsletter
			</a>
		</li>
	</ul>
</nav>
