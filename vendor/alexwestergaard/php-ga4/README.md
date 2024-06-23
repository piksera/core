_Package_

[![Version](https://img.shields.io/packagist/v/alexwestergaard/php-ga4?color=blue&label=stable%20release)](https://github.com/aawnu/php-ga4/releases/latest)
[![License](https://img.shields.io/packagist/l/alexwestergaard/php-ga4?color=blue)](https://github.com/aawnu/php-ga4/blob/master/LICENSE)
[![PHPVersion](https://img.shields.io/packagist/php-v/alexwestergaard/php-ga4?color=blue)](https://www.php.net/releases)
[![Size](https://img.shields.io/github/languages/code-size/aawnu/php-ga4?color=blue)](https://github.com/aawnu/php-ga4/releases/latest)
![Code Coverage Badge](https://raw.githubusercontent.com/AlexWestergaard/php-ga4/image-data/coverage.svg)

_Development_

[![Version](https://img.shields.io/packagist/v/alexwestergaard/php-ga4?color=red&include_prereleases&label=latest%20release)](https://github.com/aawnu/php-ga4/releases)
[![Issues](https://img.shields.io/github/issues-raw/alexwestergaard/php-ga4?color=red&label=issues)](https://github.com/aawnu/php-ga4/issues)
[![Pulls](https://img.shields.io/github/issues-pr/aawnu/php-ga4?color=red&label=pulls)](https://github.com/aawnu/php-ga4/pulls)
[![Contributors](https://img.shields.io/github/contributors/aawnu/php-ga4?color=red)](https://github.com/aawnu/php-ga4/graphs/contributors)
[![LastCommit](https://img.shields.io/github/last-commit/aawnu/php-ga4/master?color=red)](https://github.com/aawnu/php-ga4/commits)

```sh
composer require alexwestergaard/php-ga4
```

- [GDPR Notice](#gdpr-notice)
- [Getting started](#getting-started)
  - [Data flow](#data-flow)
  - [Layers](#layers)
- [Events](#events)
  - [Default](#default)
  - [E-commerce](#e-commerce)
  - [Engagement / Gaming](#engagement--gaming)
- [Frontend \& Backend Communication](#frontend--backend-communication)
  - [Logging / Queue](#logging--queue)
  - [Frontend =\> Backend](#frontend--backend)
    - [Frontend](#frontend)
    - [Backend](#backend)
- [Custom Events](#custom-events)
- [Debug](#debug)
- [Additional information](#additional-information)
- [Documentation](#documentation)

## GDPR Notice

European Union have noticed that default setup of Google Analytics does not comply with GDPR as data is sent unrestricted to an american service possibly outside of Europe.
This includes the use of `gtag.js` as JavaScript pushes the request from visitors device including their IP-Address.

Server Side Tracking, however, does only send information specified inside the body and about your server.

Relying solely on Google Analytics 4 Events - that is not pushed through the `gtag.js` script - can be scraped of GDPR-related information.

- Source: Europe, GDPR, Schrems II
- https://support.google.com/analytics/answer/9019185?hl=en

## Getting started

To setup Analytics you need a Measurement ID and API Secret.

Go to `Administrator` (bottom left) and then select your `Account` -> `Data Streams` -> your stream.  
Here you will find `Measurement-ID` at top from and further down `Api Secrets for Measurement Protocol`, in there you can create yourself an `API Secret`.

**PLEASE** note that Google Analytics will look out from traffic gathered by the `gtag.js` library, as Server Side Events are supposed to supplement the frontend through its `_ga`/`_gid` cookie sessions.

```php
use AlexWestergaard\PhpGa4\Analytics;

$analytics = Analytics::new(
    measurement_id: 'G-XXXXXXXX',
    api_secret: 'xYzzX_xYzzXzxyZxX',
    debug: true|false
);

// You can set CONSENT here if not done through the gtat.js
// Read full docs here: https://support.google.com/tagmanager/answer/13802165
$consent = $analytics->consent(); // returns a consent handler

// Sets consent for sending user data from the request's events  
// and user properties to Google for advertising purposes.
$consent->setAdUserDataPermission();
$consent->getAdUserDataPermission();
$consent->clearAdUserDataPermission();

// Sets consent for personalized advertising for the user.
$consent->setAdPersonalizationPermission();
$consent->getAdPersonalizationPermission();
$consent->clearAdPersonalizationPermission();
```

### Data flow

`session_id` > Google Analytics does not specify a required type of **session or user id**. You are free to use any kind of **unique identifier** you want; the catch, however, is that Google Analytics populates some internal data with `gtag.js`, that is then referenced to their `_ga` cookie session id. Just be aware that `gtag.js` is using _client-side Javascript_ and can therefore have some **GDPR complications** as requests back to Google Analytics contains client information; such as their IP Address.

1. Acquire proper GDPR Consent
2. Client/GTAG.js sends session_start and first_visit to GA4
3. GA4 sends `_ga` and `_gid` cookies back to Client/GTAG.js
4. Server uses `_ga` (or `_gid`; or your unique session_id) to populate events

Note: It is entirely possible to push events to backend without acquiring the session cookies from Google Analytics; you will however lose information bundled inside the `GTAG.js` request if you do not figure out how to push that via backend too.

### Layers

The code is following 3 layers that should be considered; 5 layers at max.

```txt
Analytics [
    Events [
        Event {
            Parameters
            ? Items [
                Item Parameters
            ]
        }
    ]
    User Properties [
        Properties {
            Key: Value
        }
    ]
]
```

## Events

This is a list of prebuilt events as shown in the documentation. All events have the following parameters to locate trigger location of each event.

```php
// Manual setting of each event
$event->setLanguage(string $var);
$event->setPageLocation(string $var);
$event->setPageReferrer(string $var);
$event->setPageTitle(string $var);
$event->setScreenResolution(string $var);
// Fillable for multiple events
$eventPage = AlexWestergaard\PhpGa4\Helper\EventParamsHelper();
$event->setEventPage($eventPage);
```

### Default

![badge](https://shields.io/badge/PageView-informational)
![badge](https://shields.io/badge/Share-informational)
![badge](https://shields.io/badge/Signup-informational)
![badge](https://shields.io/badge/Login-informational)
![badge](https://shields.io/badge/Search-informational)
![badge](https://shields.io/badge/SelectContent-informational)
![badge](https://shields.io/badge/SelectItem-informational)
![badge](https://shields.io/badge/SelectPromotion-informational)
![badge](https://shields.io/badge/ViewItem-informational)
![badge](https://shields.io/badge/ViewItemList-informational)
![badge](https://shields.io/badge/ViewPromotion-informational)
![badge](https://shields.io/badge/ViewSearchResults-informational)

### E-commerce

![badge](https://shields.io/badge/GenerateLead-informational)
![badge](https://shields.io/badge/AddToWishlist-informational)
![badge](https://shields.io/badge/AddToCart-informational)
![badge](https://shields.io/badge/ViewCart-informational)
![badge](https://shields.io/badge/RemoveFromCart-informational)
![badge](https://shields.io/badge/BeginCheckout-informational)
![badge](https://shields.io/badge/AddPaymentInfo-informational)
![badge](https://shields.io/badge/AddShippingInfo-informational)
![badge](https://shields.io/badge/Purchase-informational)
![badge](https://shields.io/badge/Refund-informational)

### Engagement / Gaming

![badge](https://shields.io/badge/EarnVirtualCurrency-informational)
![badge](https://shields.io/badge/SpendVirtualCurrency-informational)
![badge](https://shields.io/badge/LevelUp-informational)
![badge](https://shields.io/badge/PostScore-informational)
![badge](https://shields.io/badge/TutorialBegin-informational)
![badge](https://shields.io/badge/TutorialComplete-informational)
![badge](https://shields.io/badge/UnlockAchievement-informational)
![badge](https://shields.io/badge/JoinGroup-informational)

## Frontend & Backend Communication

This library is built for backend server side tracking, but you will probably trigger most events through frontend with Javascript or Websockets. There will be 2 examples, one as pure backend for logged/queued events and one for frontend to backend communication.

### Logging / Queue

```php
use AlexWestergaard\PhpGa4\Exception;
use AlexWestergaard\PhpGa4\Analytics;
use AlexWestergaard\PhpGa4\Event;
use AlexWestergaard\PhpGa4\Item;

// require vendor/autoload.php

$visitors = getVisitorsAndEvents(); // pseudo function, make your own logic here

foreach ($visitors as $collection) {
    // Group of events, perhaps need logic to change from json or array to event objects
    // Maybe its formatted well for the > ConvertHelper::parseEvents([...]) < helper
    $groups = $collection['events'];

    // If gtag.js, this can be the _ga or _gid cookie
    // This can be any kind of session identifier
    // Usually derives from $_COOKIE['_ga'] or $_COOKIE['_gid'] set by GTAG.js
    $visitor = $collection['session_id'];

    // load logged in user/visitor
    // This can be any kind of unique identifier, readable is easier for you
    // Just be wary not to use GDPR sensitive information
    $user = $collection['user_id'];

    // Render events grouped on time (max offset is 3 days from NOW)
    foreach ($groups as $time => $data) {
        try {
                $analytics = Analytics::new($measurementId, $apiSecret)
                    ->setClientId($visitor)
                    ->setTimestampMicros($time);

                if ($user !== null) {
                    $analytics->setUserId($user);
                }

                $analytics->addUserParameter(...$data['userParameters']); // pseudo logic for adding user parameters
                $analytics->addEvent(...$data['events']); // pseudo logic for adding events

                $analytics->post(); // send events to Google Analytics
        } catch (Exception\Ga4Exception $exception) {
            // Handle exception
            // Exceptions might be stacked, check: $exception->getPrevious();
        }
    }
}

```

### Frontend => Backend

#### Frontend

```js
// array< array< eventName, array<eventParams> > >
axios.post("/your-api-endpoint/ga4-event-receiver", [
  // Note each event is its own object inside an array as
  // this allows to pass the same event type multiple times
  {
    addToCart: {
      currency: "EUR",
      value: 13.37,
      items: [
        {
          item_id: 1,
          item_name: "Cup",
          price: 13.37,
          quantity: 1,
        },
      ],
    },
  },
]);
```

#### Backend

```php
use AlexWestergaard\PhpGa4\Helper\ConvertHelper;
use AlexWestergaard\PhpGa4\Exception;
use AlexWestergaard\PhpGa4\Analytics;
use AlexWestergaard\PhpGa4\Event;

// require vendor/autoload.php

try {
    $events = ConvertHelper::parseEvents($_POST);

    Analytics::new($measurementId, $apiSecret)
        ->addEvent(...$events)
        ->post();
} catch (Exception\Ga4Exception $exception) {
    // Handle exception
    // Exceptions might be stacked, check: $exception->getPrevious();
}
```

## Custom Events

You can build your own custom events. All you need is to implement and fullfill the `AlexWestergaard\PhpGa4\Facade\Type\EventType` facade/interface.
If you want ease of life features, then you can extend your event from `AlexWestergaard\PhpGa4\Helper\EventHelper` and overwrite as you see fit.

```php

// EventHelper implements AlexWestergaard\PhpGa4\Facade\Type\EventType
class ExampleEvent extends AlexWestergaard\PhpGa4\Helper\EventHelper
{
    // variables should be nullable as unset() will set variable as null
    protected null|mixed $my_variable;
    protected null|mixed $my_required_variable;

    // Arrays should always be instanciated empty
    protected array $my_array = [];

    public function getName(): string
    {
        return 'example_event';
    }

    public function getParams(): array
    {
        return [
            'my_variable',
            'my_array',
        ];
    }

    public function getRequiredParams(): array
    {
        return [
            'my_required_variable',
        ];
    }

    public function setMyVariable(string $value)
    {
        $this->my_variable = $value;
        return $this; // Allows chained events
    }

    public function setMyRequiredVariable(string $value)
    {
        $this->my_required_variable = $value;
        return $this; // Allows chained events
    }
}
```

## Debug

Measurement protocol for GA4 has debug functionality that can be enabled with the `debug` parameter in the Analytics constructor.

```php
$analytics = Analytics::new(
    measurement_id: 'G-XXXXXXXX',
    api_secret: 'xYzzX_xYzzXzxyZxX',
    debug: true // default: false
);
```

When `Debug` is enabled then events are sent to `https://www.google-analytics.com/debug/mp/collect` where issues will be caught with
[GA4Exception](https://github.com/aawnu/php-ga4/blob/master/src/Exception/Ga4Exception.php) (Be aware of `$exception->getPrevious()` stacks);
such response will look as follows:

```json
{
  "validationMessages": [
    {
      "fieldPath": "events",
      "description": "Event at index: [0] has invalid name [_badEventName]. Names must start with an alphabetic character.",
      "validationCode": "NAME_INVALID"
    }
  ]
}
```

Notice: This library already validates that events are properly formatted when added to analytics (`$analytics->addEvent(...)`).

Two important points:

- Events sent to the Validation Server will not show up in reports.
- There is no way for events sent through measurement protocol (Server Side) to show up in the `debugView` in Google Analytics Admin.

## Additional information

- Geographic information is only available via automatic collection from gtag, Google Tag Manager, or Google Analytics for Firebase.
- The `page_view` event works, however it's not documented in the official documentation, so do not rely on it.

## Documentation

- [Measurement Protocol](https://developers.google.com/analytics/devguides/collection/protocol/ga4)
- [Measurement Protocol: Reference](https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference?client_type=gtag)
- [Measurement Protocol: User Properties](https://developers.google.com/analytics/devguides/collection/protocol/ga4/user-properties?client_type=gtag)
- [Measurement Protocol: Events](https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference/events)
  - [Reserved Event Names](https://developers.google.com/analytics/devguides/collection/protocol/ga4/reference?client_type=gtag#reserved_event_names)
- [Measurement Protocol: Validation](https://developers.google.com/analytics/devguides/collection/protocol/ga4/validating-events?client_type=gtag)
