<?php 
$title = "Agenda";
$subtitle = "Detalhes do agendamento";
?>

@extends ('layouts.layout')

@section('content')

<app-show-appoint>
    <h2 slot="customer">{{ $appointment->customer->first_name }} {{ $appointment->customer->last_name }}</h2>
    <span slot="status">{{ $appointment->status }}</span>
    <div slot="date">{{ $appointment->start_at->toDateString() }}</div>
</app-show-appoint>

@endsection