Data is stored in Events. You are required to add an Event name that is under 32 characters.

You may also add a context string up to 128 characters if you want.
The context string can include additional public data.

For example:
- For a `site.view` event you way want to add the referring site.
- For a `product.purchase` event you may want to add a link or identifier for the product.
- For a `blog-post.created` event you can add a database reference, for example
`\App\Models\Post::find(42)`

What's important to note is that all events are public, including the context string.
It is a violation of the
terms of service to collect sensitive or personally identifying data.