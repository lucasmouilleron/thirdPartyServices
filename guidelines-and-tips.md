Facebook
========

Facebook policies
-----------------
- They change, a lot
- [Facebook policies](https://developers.facebook.com/policy)

Sharing to Facebook
-------------------
- It is possible to __share only URLs__
- The shared content __open graph tags__ are used to display image, title and description withing Facebook
- It is therefore needed to have __dedicated pages for dedicated shares__

Like
----
- It is __not__ possible to use Likes as a __game score mechanism__
- It is possible to __like only URLs__

Facebook connect
----------------
- Facebook does __not store any 3rd party (our) informations__, they have to be stored on the website / web app servers
- __Loging in__ on a website with Facebook connect means the user logs in __via Facebook__. The website __validates__ the `user token` with Facebook. Then it retrieves the user `email` (_permission needed_). If an account already exists, the user is loged in. If not, the user is being registered. In both cases, the authentication is persisted (jwt or session).
- The token may _be kept (within session for example)_ so it is not ask to Facebook for every connection.

Facebook application and platforms
----------------------------------
- Canvas App provide __integrated experience__ within Facebook plateform
- Mobile App is a native app running on a mobile device
- Canvas App and Mobile App can use __all__ the Graph API
- Website App runs within a website and can use __only__ social plugins, publishing and Facebook connect
- Therefore, some Graph API elements __can not or should__ not be access from a website App : friends list, Game API (notifications, requests)
- If one wants to build an __experience within a Website App and uses all the Graph API__, it is possible to declare and build an app as a __Canvas App and a Website App__. The forbidden interactions are then happehning in the Canvas App. The Website App sends the user to the Canvas App for social features (friends lists, notifications, invites, etc) and the Canvas App sends the user to the Website App to actually play the game or the experience.
- Canvas App won't work on the mobile Facebook App

Graph API
---------
- `User access token` (+ permissions)_ __are needed for most of operations__ such as read posts, friends or photos.
- `User access token` __are not needed for some (serverside) app operations__ such as post on behalf or notifications. `App token` is enough.
- `User access token` expires if they are not used within 2 hours. They are auto renewed when used.
- `Long lived user access token` expires if they are not used within 60 days. They are auto renewed when used.
- `Long lived user access token` can be generated server side from a standard `user access token`
- It is possible to __invite friends__ to an app (Canvas App and Mobile App only)
- It is possible to __send notifications__ to app users (Canvas App and Mobile App only)
- It is __not__ possible to __get all images of a post__ if it contains multiple images (just the first one is available)
- It is possible to get __all images uploaded__ by a user (`user-id/photos/uploaded`)

Mobile
-----

Twitter
=======

Twitter policies
----------------
- [Twitter policies](https://support.twitter.com/groups/56-policies-violations)

Sharing to Twitter
------------------
- todo

Hashtags
--------
- todo

Twitter connect
---------------

Twitter API
-----------
- OAuth Access tokens __are not needed for serverside app REST operations__ (search tweets, get users timeline, get user infos) : [offical doc](https://dev.twitter.com/oauth/application-only)
- App credentials __and__ OAuth Access tokens are needed for using the Stream API
- It is __not__ possible to __get all images of a tweets__ if it contains multiple images (just the first one is available)
- `User access token` do __not__ expire (they can be revoked though)

Twitter widgets
---------------

Instagram
=========

Hashtags
--------
- It is possible to listen to hashtags
- __Only public pictures__ are visible when listening

Instragram API
--------------
- `User access token` should not expire, but ... they can (cf [Instagram doc](http://instagram.com/developer/authentication))
- We assume they are auto renewed when used

Youtube
=======

Videos customization
--------------------
- It is possible to __force captions__ to be turned on with `cc_load_policy`
- It is possible to add __links__ withing videos pointing to videos, playlist, suscribre page and an __associated website__. Associated websites are declared within Youtube and Webmaster tools ([official documentation](https://support.google.com/youtube/answer/2887282?hl=en))

Channels management
-------------------
- `Edit channel navigation` and switch to `Browse` to allow __homepage content cusomization__ (blocks of content [last upload, playlist, etc.])
- It is possible to edit the channel header and add links displayed over the header
- It is possible to add a __channel trailer__ to welcome unsuscribed users
- It is possible to associate a website to a channel. Youtube says it helps SEO
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

Pinterest API
-------------
- The pinterest API is __limited to the domain__ (my-company.com) of the app owner
- It is __not possible to search tags__, words outside the app domain

Pinterest widgets
-----------------

Google +
========

Linkedin
========