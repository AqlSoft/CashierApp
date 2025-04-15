import Echo from 'laravel-echo';

window.Echo = new Echo({
    broadcaster: 'reverb',
    host: window.location.hostname + ':8080'
});

window.Echo.channel('test-channel')
    .listen('TestBroadcast', (e) => {
        console.log('Received:', e.message);
    });