@auth
<p style="margin-bottom: 0.5rem;">
	<small>
		Welcome back, <strong>{{ Auth::user()->name }}</strong>!

		The `🌌` symbol next to text, means it has been prefilled with your account data.
	</small>
</p>
@endauth

<small style="padding-right: 1rem; margin-right: 1rem; border-right: 2px solid lightgray;">
	Site built with <a href="https://github.com/caendesilva/lagrafo">Lagrafo</a>
</small>
<small>
	Syntax highlighting provided by <a href="https://torchlight.dev/">Torchlight.dev</a>
</small>
