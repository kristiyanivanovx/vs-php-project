const cacheName = 'clockHandAngle';
const staticAssets = [
    './',
    './index.php',
    './LICENSE',
    './README.md',
    './manifest.webmanifest',
    './static/favicon.ico',
    './static/logo.png',
    './static/style.css',
    './project/project.php',
    './partials/demonstration.php',
    './partials/description.php',
    './partials/footer.php',
    './partials/navigation.php',
    './partials/scripts.php',
    './js/index.js',
    './js/sw.js',
];

self.addEventListener('install', async e => {
    const cache = await caches.open(cacheName);
    await cache.addAll(staticAssets);
    return self.skipWaiting();
});

self.addEventListener('activate',  e => {
    self.clients.claim();
});

self.addEventListener('fetch',  e => {
    const req = e.request;
    const url = new URL(req.url);

    if (url.origin === location.origin) {
        e.respondWith(cacheFirst(req));
    } else {
        e.respondWith(networkAndCache(req));
    }
});

async function cacheFirst(req) {
    const cache = await caches.open(cacheName);
    const cached = await cache.match(req);
    return cached || fetch(req);
}

async function networkAndCache(req) {
    const cache = await caches.open(cacheName);
    try {
        const fresh = await fetch(req);
        await cache.put(req, fresh.clone());
        return fresh;
    } catch (e) {
        const cached = await cache.match(req);
        return cached;
    }
}

