Facebook
========

Facebook policies
-----------------
- They move, a lot
- [Facebook policies](https://developers.facebook.com/policy)

Sharing to Facebook
-------------------
- todo

Like
----
- It is __not__ possible to use Likes as a __game score mechanism__

Faceook applications
--------------------
- todo

Facebook connect
----------------
- Facebook does __not store any 3rd party (our) informations__, they have to be stored on the website / webapp servers
- __Loging in__ on a website with Facebook connect means the user logs in on Facebook and the website tries to __find an account with the Facebook user ID__ in its database. If so, the user becomes connected, if not, initiating registering process
- __Registering on__ a website with Facebook connect means the user logs in on Facebook and creating an account on the website servers with user's Facebook infos

Canvas App VS Website app
-------------------------
- Canvas app provide __integrated experience__ within Facebook plateform
- Canvas app can use __all__ the Graph API
- Website app runs within a website and __only__ offers social plugins, publishing and Facebook connect
- Therefore, some Graph API elements __can not or should__ not be access from a website App : friends list, Game API (notifications, requests)
- This can be dodged by declaring app as a Canvas app and Website app and using it on website, though not allowed by Facebook policies

Graph API
---------
- It is possible to __invite friends__ to an app (Canvas app only)
- It is possible to __send notifications__ to users (Canvas app only)
- It is __not__ possible to __get images of a post__ if it contains multiple images (just the first one is available)
- It is possible to get __all images uploaded__ by a user (`user-id/photos/uploaded`)

Mobile
-----

Twitter
=======

Sharing to Twitter
------------------
- todo

Hashtags
--------
- todo

Twitter connect
---------------

Instagram
=========

Hashtags
--------
- todo

Youtube
=======

Channels management
-------------------
- `Edit channel navigation` and switch to `Browse` to allow __homepage content cusomization__ (blocks of content [last upload, playlist, etc.])
- It is possible to edit the channel header and add links displayed over the header
- It is possible to add a __channel trailer__ to welcome unsuscribed users
- It is possible to associate a website to a channel. Youtube says it helps SEO
- It is possible to add __links__ to videos to videos, playlist, suscribre page and an __associated website__. Associated websites are declared within Youtube and Webmaster tools ([official documentation](https://support.google.com/youtube/answer/2887282?hl=en))
- It is __not__ possible to __customize the channel background__

Events
------
- Live event realtime streaming
- Streaming from `Google Hangout` or `Wirecast for Youtube`, or a [custom encoder](https://support.google.com/youtube/answer/2853702?topic=2853713&hl=en)
- The video of a completed event can be kept

Partner
-------
- To become a partner, `enable monetization` of videos on the channel ([officiall documentation](https://support.google.com/youtube/answer/72857?hl=en))
- Access [Youtube analytics](https://www.youtube.com/analytics)

Pinterest
=========

Google +
========

Linkedin
========