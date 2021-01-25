importScripts('https://storage.googleapis.com/workbox-cdn/releases/6.0.2/workbox-sw.js');

workbox.routing.registerRouter(
    ({request}) => request.destination === 'image',
    new workbox.strategies.NetworkFirst()
);
