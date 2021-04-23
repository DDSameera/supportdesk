<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('ticket.create')}}">Ticket System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{route('ticket.create')}}">Submit Ticket</a>
            <a class="nav-item nav-link" href="{{route('ticket.check')}}">Check Ticket </a>
            <a class="nav-item nav-link" href="{{route('ticket.index')}}">View All Tickets</a>

        </div>

    </div>
</nav>
