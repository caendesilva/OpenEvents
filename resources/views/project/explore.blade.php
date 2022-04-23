<x-guest-layout>
	<main class="py-32 bg-white">
		<header class="px-2 md:px-0">
			<div class="container items-center max-w-6xl px-5 mx-auto space-y-6 text-center">
				<h1 class="text-4xl font-extrabold tracking-tight text-left text-gray-900 sm:text-5xl md:text-6xl md:text-center">
					<span class="block"><span class="block mt-1 text-purple-500 lg:inline lg:mt-0">Explore</span> Projects</span>
				</h1>
				<p class="w-full mx-auto text-base text-left text-gray-500 sm:text-lg lg:text-2xl md:max-w-3xl md:text-center">
					All data on OpenEvents is public and available for anyone to to see.
				</p>
			</div>
		</header>
		<div class="max-w-3xl mx-auto my-4">
			<x-jet-section-border />
		</div>
		<section class="px-2bg-white md:px-0">
			<div class="container items-center max-w-4xl px-5 mx-auto text-center prose">
				<h2 class="mb-2">Latest Projects:</h2>
				<p>
					Click on a project name to see the metrics dashboard.
				</p>
				<table class="border">
					<thead>
						<tr>
							<th class="px-4 py-3">Project Name</th>
							<th class="px-4 py-3 text-right">Tracked Events</th>
						</tr>
					</thead>
					<tbody>
						@foreach($projects as $project)
						<tr>
							<td class="px-4 py-3"><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></td>
							<td class="px-4 py-3 text-right">{{ number_format($project->events()->count()) }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</section>
	</main>
</x-guest-layout>
