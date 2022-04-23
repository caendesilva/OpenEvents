<x-guest-layout>
	<main class="py-32 bg-white">
		<header class="px-2 md:px-0">
			<div class="container items-center max-w-6xl px-5 mx-auto space-y-6 md:text-center">
				<h1 class="text-4xl font-extrabold tracking-tight text-left text-gray-900 sm:text-5xl md:text-6xl md:text-center">
					<span class="block"><span class="block mt-1 text-purple-500 lg:inline lg:mt-0">Events</span> Dashboard</span>
				</h1>
				<h2 class="text-3xl">
					<span class="block mt-1 text-purple-500 lg:inline lg:mt-0" title="Project ID: {{ $project->id }}">{{ $project->name }}</span>
				</h2>
				<p class="w-full mx-auto text-base text-left text-gray-500 sm:text-lg lg:text-2xl md:max-w-3xl md:text-center">
					@if(Auth::check() && Auth::user()->is($project->user))
					This is your project's event dashboard.
					@else
					This is the event dashboard for the project <mark class="mark-styled mark-styled-sm">{{ $project->id }}</mark>
					@endif
				</p>
			</div>
		</header>
		<div class="max-w-3xl mx-auto my-4">
			<div class="py-8 px-8">
				<div class="border-t border-gray-200"></div>
			</div>
		</div>
		<section class="px-2bg-white md:px-0">
			<div class="container items-center max-w-4xl px-5 mx-auto text-center prose">
				<header class="pb-6">
					<h2 class="my-2">Latest Projects:</h2>
				<p>
					Click on a event name to filter similar events.
				</p>
				</header>
				<menu type="toolbar" class="flex w-full justify-between flex-wrap overflow-hidden">
					<form action="" method="GET" class="flex my-2">
						<x-jet-input type="search" name="event"  class="px-4 leading-tight rounded-r-none" placeholder="Free text search..." value="{{ request()->query('event') }}" />
						<div>
							<button type="submit" class="flex items-center bg-blue-400 hover:bg-blue-500 focus:bg-blue-500 justify-center w-10 h-full text-white rounded-r-lg">
								<span class="sr-only">Submit search form</span>
								<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
									xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
								</svg>
							</button>
						</div>
					</form>
					@if(request()->query('event') != '')
					<form action="" method="GET" class="mr-auto my-2">
						<input type="hidden" name="event">
						<button class="mx-2 px-2 py-1" title="Clear search input">Clear &times;</button>
					</form>
					@endif
					<form action="" method="GET" class="flex justify-end my-2">
						<select onchange="this.form.submit()" class="block bg-gray-50 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="limit" id="limit">
							@foreach($limitOptions as $limit)
								<option value="{{ $limit }}" {{ $selectedLimit == $limit ? 'selected' : '' }}>Show{{ $selectedLimit == $limit ? 'ing' : '' }} {{ $limit }} results</option>
							@endforeach
						</select>
						<noscript><x-jet-button>Submit</x-jet-button></noscript>
					</form>
				</menu>
				<table class="border mt-2">
					<thead>
						<tr>
							<th class="px-4 py-3">Event Name</th>
							<th class="px-4 py-3">Context Data</th>
							<th class="px-4 py-3 text-right">Timestamp</th>
						</tr>
					</thead>
					<tbody>
						@foreach($events as $event)
						<tr>
							<th class="px-4 py-3">
								<form action="" method="GET">
									<input type="hidden" name="event" value="{{ $event->event }}">
									<button class="font-bold" title="Show events matching this name">{{ $event->event }}</button>
								</form>
							</th>
							<td class="px-4 py-3">
								{{ $event->data ?? '—' }}
							</td>
							<td class="px-4 py-3 text-right">
								<time datetime="{{ $event->created_at->format('c') }}">
									{{ $event->created_at }} UTC
								</time>
							</td>
						</tr>
						@endforeach
					</tbody>
					@if($events->count() == 0)
						<tfoot>
							<tr>
								<td colspan="3" class="text-center">
									<p class="text-lg text-gray-500 mb-0">No events found.</p>
								</td>
							</tr>
							@if(request()->query('event') != '')
							<tr>
								<td colspan="3" class="text-center">
									<p class="text-gray-500 mt-0">
										<form action="" method="GET">
											<input type="hidden" name="event">
											<button class="mx-2 px-2 py-1">Clear search filters?</button>
										</form>
									</p>
								</td>
							</tr>
							@elseif(Auth::check() && Auth::user()->is($project->user))
							<tr>
								<td colspan="3" class="text-center">
									<p class="text-gray-500">
										<a href="/docs/dispatching-your-first-event/">Learn how to dispatch your first event?</a>
									</p>
								</td>
							</tr>
							@endif
						</tfoot>
					@endif
				</table>
			</div>
		</section>
	</main>
</x-guest-layout>
