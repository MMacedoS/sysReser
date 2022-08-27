<div class="sidebar" data="blue">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('SIS') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('RESERVAS') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('material.index') }}">
                <i class="tim-icons icon-app"></i>
                    <p>{{ _('Material') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('Cliente.index') }}">
                <i class="tim-icons icon-badge"></i>
                    <p>{{ _('Cliente') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                <i class="tim-icons icon-calendar-60"></i>
                    <p>{{ _('Reserva') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                <i class="tim-icons icon-coins"></i>
                    <p>{{ _('Financeiro') }}</p>
                </a>
            </li>    
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                <i class="tim-icons icon-single-02"></i>
                    <p>{{ _('Usuarios') }}</p>
                </a>
            </li>        

                
        </ul>
    </div>
</div>
