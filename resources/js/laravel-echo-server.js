import Echo from 'laravel-echo';
window.Echo = new Echo({
    broadcaster: "socket.io",
    host: `${window.location.protocol}//${window.location.hostname}:${process.env.MIX_FRONTEND_PORT}`,
});
