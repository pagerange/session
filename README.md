# Session

## PHP Session Wrapper

This class provides an easy to use wrapper for working with the PHP Session as well as some handy
methods for setting Session (Flash) messages.

Why another PHP Session wrapper?  I needed something simple for my own one-off projects, including
the pagerange/auth package.

### Dependencies

None.

### Installation

```bash
	composer require pagerange/session
```

### Features

Class provides an easy to use, intiutive object wrapper to basic PHP session management.

* Starts session if not already started
* Set session vars
* Get session vars
* Remove session vars
* Check if session var is set
* Get session id
* Regenerate session id
* Destroy session
* Set Flash message
* Set array of CSS classes for Flash message
* Get Flash message

### Usage

```

use Pagerange\Session\Session;
use Pagerange\Session\Flash;

$session = new Session();
$flash = new Flash();

// Use as required

$session->set('logged_in', true); // set value of logged_in to true
$session->set('username', 'Steve'); // set value of username to Steve
$session->get('logged_in'); // returns value of logged_in, NULL if not set
$session->check('username'); // true if username exists in session, false otherwise
$session->remove('username'); // deletes username from session
$session->destroy(); // destroys the current session
$session->regenerate(); // regenerate session_id 

// set flash message with class alert-success
$flash->message('You are now logged in!', ['alert-success']); 

// output flash message, if any.  Message is removed from session after display.
// Returns empty string if flash message is not set.
$flash->flash() 

```

Flash messaging is output in a div with the classes flash, alert, and a series of classes that match
Bootstrap alert classes, and can be styled accordingly.

```html

  // Flash message in sample above would be output like so:

  <div class="flash alert alert-success">
		You are now logged in
	</div>

```

If you are using jQuery, the following snippet adds a slow rolldown and rollup of Flash messages.  

Note: Flash messaging will work without jQuery, but will have no animation.

```javascript

	$(document).ready(function(){
		$(".flash").hide()
			.slideDown()
			.delay(2000)
			.slideUp('slow');
  });

```

### Demo

A simple demo of the session class in action, as used by the Auth class, can be seen here:

[Live demo of Session and Flash](http://www.pagerange.com/projects/auth/demo/)

### Support

[Session/Flash Github issues page](https://github.com/pagerange/session/issues/)

I can provide basic support, and will accept feature requests.  

Also, please feel free to contribute.

### License

The MIT License (MIT)

Copyright (c) 2015  by Steve George <steve@pagerange.com>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation
the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions
of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT
LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

# Updated 2015-08-12
