# Bookmarklet Installer

This service helps you to share your bookmarklets easily and quickly. All you need is a link to your minified JS file; the rest is handled automatically.

## Goal

I wanted to create something that is:

- Easy for a bookmarklet author to use in order to share his/her bookmarklet.
- Clear for visitors to use in order to install the bookmarklet.

## Share Your Own Bookmarklet

Visit <http://grafluxe.com/o/bmk>.

**Alternatively, you can follow the below steps:**

To create a share URL for your bookmarklet, define the bookmarklets *title* (optional) and a *path* to where your minified code is hosted. The *path* parameter should be [URL encoded](http://www.url-encode-decode.com/).

```
http://grafluxe.com/o/bmk?title=similar-imgs&path=bit.ly%2F2hx1n73
```

The above example is hosted on my site; feel free to use it, or clone and serve from your own PHP server. Also, the bookmarklet I'm sharing can be found [here](https://github.com/Grafluxe/similar-imgs).

## Sample

Install the [Similar Image Searcher](http://grafluxe.com/o/bmk?title=similar-imgs&path=bit.ly%2F2qnAWsP) bookmarklet. Further instructions are on the install page.

## Notes

- In the bookmarklet creation process, this service wraps your code in an [IIFE](https://en.wikipedia.org/wiki/Immediately-invoked_function_expression) and prepends `javascript:void`.
- As a convention, all bookmarklet names start and end with brackets (e.g. "[My Bookmarklet]");

## Thanks

- Favicon generation provided by [realfavicongenerator](http://realfavicongenerator.net).

## License

Copyright (c) 2016 Leandro Silva (http://grafluxe.com)

Released under the MIT License.

See LICENSE.md for entire terms.
