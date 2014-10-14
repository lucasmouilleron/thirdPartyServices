Generalities
============

Third parties services evolve
-----------------------------
- Third party services, wheter it is an API or an iFrame, __evolve__. Sometimes a bit too much.
- Never assume what is implemented _one day will work the next day_
- Therefore, all informations below may not be releveant as of reading

Usages
------
- Third party services have (evolving) __usage policies__. They may forbid some ways of using their service.
- Most of the time, third party services _expose their functionnalities via API_. __Rate limits__ can apply to API calls.

Connect or sign in with a third party service
---------------------------------------------
- Very convenient way to __register and authenticate users__
- User _register or login_ on a platform _via their Facebook or Twitter credentials_ for example
- Generally, it involves creating an app on the third party services and the usage of [OAuth](http://oauth.net)
- The third party services generally does __not store any third party (our) informations__, they have to be stored on the website / web app servers
- __Loging in__ on a web app with Facebook connect for example, means :
    - The user logs in __via Facebook__. Facebook asks him if he want to connect tot the web app app.
    - If so, Facebook sends us back the `user access token`.
    - This token allows the web app to do some stuff on Facebook on the user behalf
    - The web app __validates__ the `user access token` with Facebook
    - The web app then retrieves the user `email` (_permission needed_)
    - If an account already exists in the web app database, __the user is loged in__
    - If not, the user __is being registered__
    - The token may __be kept__ so it is not ask before every connection :
        - Stored in a cookie for example
        - When the user acess the web app, if the cookie is present and its token valid (not expired or revoked), the token is used
        - If not, the user is asked to log in again via Facebook

Facebook
========

Facebook policies
-----------------
- They change, a lot. 
- [Facebook policies](https://developers.facebook.com/policy)

Sharing to Facebook
-------------------
- It is possible to __share only URLs__ 
- The shared content __open graph meta tags__ are used to display image, title and description withing Facebook
- It is therefore needed to have __dedicated pages for dedicated shares__
- [Facebook sharing doc](https://developers.facebook.com/docs/sharing/best-practices)

Like
----
- It is __not__ possible to use Likes as a __game score mechanism__
- It is only possible to __like URLs__.

Facebook connect
----------------
- It possible to Facebook login with `pure client side means` with the JS SDK
- Facebook provides SDKs for Facebook Connect for iOS, Android, JS, PHP and Unity

Facebook application and platforms
----------------------------------
- _Canvas Apps_ provide __integrated experience__ within Facebook plateform. It is an iFrame called within Facebook.
- _Mobile Apps_ are native app running on a mobile device
- _Canvas Apps and Mobile Apps_ can use __all__ the `Graph API`
- _Website Apps_ run within a website and can use __only__ social plugins, publishing and Facebook connect
- Therefore, some `Graph API` elements __can not or should__ not be access from a _Website App_ : friends list, Game API (notifications, requests)
- If one wants to build an __experience within a Website App and uses all the__ `Graph API` :
    - It is possible to declare and build an app as a __Canvas App and a Website App__.
    - The forbidden interactions are then happehning in the _Canvas App_
    - The _Website App_ sends the user to the _Canvas App_ for social features (friends lists, notifications, invites, etc) and the _Canvas App_ sends the user to the _Website App_ to actually play the game or the experience
- _Canvas App_ won't work on the mobile Facebook App

Graph API
---------
- `User access tokens` (+ permissions)_ __are needed for most of operations__ such as read posts, friends or photos.
- `User access tokens` __are not needed for some (serverside) app operations__ such as post on behalf or notifications. `App credentials` are enough.
- `User access tokens` expire if they are not used within 2 hours. They are auto renewed when used.
- `Long lived user access tokens` expire if they are not used within 60 days. They are auto renewed when used.
- `Long lived user access tokens` can be generated server side from a standard `user access token`
- It is possible to __invite friends__ to an app (_Canvas App_ and _Mobile App_ only)
- It is possible to __send notifications__ to app users (_Canvas App_ and _Mobile App_ only)
- It is __not__ possible to __get all images of a post__ if it contains multiple images (just the first one is available)
- It is possible to get __all images uploaded__ by a user (`user-id/photos/uploaded`)

Mobile
-----

Rate limits
-----------

Twitter
=======

Twitter policies
----------------
- [Twitter policies](https://support.twitter.com/groups/56-policies-violations)

Sharing to Twitter
------------------
- Twitter sharing system is called `Twitter Cards`
- It is possible to __share only URLs__ 
- The shared content __twitter meta tags__ are used to display image, title and description within Twiter
- Every type of card needs to be used with a domain __needs to be approved__ (using the Twitter Card validator)
- [Twitter Cards doc](https://dev.twitter.com/cards/getting-started)
- [Twitter Card validator](https://cards-dev.twitter.com/validator)

Hashtags
--------
- todo

Sign in with Twitter
--------------------
- 

Twitter API
-----------
- `User Access tokens` __are not needed for public serverside app REST operations__ (search tweets, pull tags) : [offical doc](https://dev.twitter.com/oauth/application-only)
- It is __not__ possible to __get all images of a tweets__ if it contains multiple images (just the first one is available)
- `User access token` do __not__ expire (they can be revoked though)
- `App credentials` __and__ `user access tokens` are needed for using the `Stream API

Twitter widgets
---------------

Rate limits
-----------

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

Rate limits
-----------

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