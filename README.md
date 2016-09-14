# Session

## PHP Session Wrapper

Simple session wrapper.

### Dependencies

None.

### Installation

You can download and install in your path manually, or you can install  using composer by adding a repositories section to composer.json:

```json

{

 "repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/pagerange/session.git"
  }
 ],
 "require": {
  "pagerange/session": "@alpha"
 }

}

```

Then install with composer:

```bash

  composer install

```

### Features

Class provides an easy to use wrapper for basic PHP session management.

* Set session vars
* Get session vars
* Remove session vars
* Check if session var is set

### Usage

```

use Pagerange\Session\Session;
session_start();
$session = new Session($_SESSION);

// Use as required

$session->set('logged_in', true); // set value of logged_in to true
$session->set('username', 'Steve'); // set value of username to Steve
$session->get('logged_in'); // returns value of logged_in, NULL if not set
$session->check('username'); // true if username exists in session, false otherwise

```

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

