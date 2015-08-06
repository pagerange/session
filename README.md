# Auth

## PHP Session Wrapper

This class provides an easy to use wrapper for working with the PHP Session as well as some handy methods for leaving Session (Flash) messages.

Flash messaging is output in a div with the classes flash, alert, and a series of classes that match Bootstrap alert classes, and can be styled accordingly.

```html

  // Sample Flash message output

  <div class="flash alert alert-success">
		You are now logged in
	</div>

```

If you are using jQuery, the following snippet adds a slow rolldown and rollup of Flash messages.  Note: Flash messaging will work without jQuery, but will have no animation.

```javascript

	$(document).ready(function(){
		$(".flash").hide()
			.slideDown()
			.delay(2000)
			.slideUp('slow');
  });

```

