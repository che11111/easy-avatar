# easy-avatar

<img src="easy-avatar.png"  height="300" alt="image">

A simple alternative to the Gravatar avatar website.

You just need to convert a user's email to MD5 hash and name a `.png` file with this hash value, then place it in the `img` folder which is one level below `avatar.php`.

Your WordPress website can then request the user's avatar through `https://example.com/avatar.php`.

Please note that the URL for requesting the user's avatar: `https://example.com/avatar.php` is equivalent to `https://gravatar.com/api`. 
